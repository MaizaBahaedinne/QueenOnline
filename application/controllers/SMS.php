<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class SMS extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
                $this->load->model('sms_model');
                        $this->load->model('user_model');
        $this->load->model('client_model');
        $this->load->model('reservation_model');
        $this->load->model('salle_model');
        $this->load->model('paiement_model');
        $this->load->model('finance_model');
        $this->load->model("Sms_model");
        $this->load->model("relance_model");
       
        
    }
    

     

    public function index()
    {
             $data['smsRecords'] = $this->sms_model->SmsListing();
                    foreach ($data["smsRecords"]  as $record) {
        
                          
                       /*  $code = $this->sendSMS1($record->destination , $record->text ) ;
                         
                         if ($code == 200)
                         {
                            $smsInfo = array(
                              'sendDate'=>date('Y-m-d H:i:s') ,
                              'statut'=>0 ,
                            );
                          } 
                             $this->sms_model->editSms($smsInfo,$record->smsId) ;
                        */ } 
                         
   
                  
             $this->global['pageTitle'] = 'SMS';
            $this->load->view("sms/list", $data );            
    }


    public function autoRelanceCronTest()
{
    $reservations = $this->finance_model->ReservationCalender();
    $now = new DateTime();

    echo "<br>========== LANCEMENT DU TEST DE RELANCES AUTO ==========<br><br>";

    foreach ($reservations as $res) {
        // Vérification des données
        if (!$res->clientId || !$res->prix || !$res->dateFin) continue;

        $resDate = new DateTime($res->dateFin);
        $dateLimite = $res->demandeEcheance
            ? new DateTime($res->demandeEcheance)
            : (clone $resDate)->modify('-30 days');

        $interval = (int)$now->diff($resDate)->format('%r%a'); // Jours entre aujourd'hui et date limite
        $isFuture = $now < $dateLimite;

        // Paiements
        $paiements = $this->paiement_model->paiementListingbyReservation($res->reservationId);
        $totalPaye = array_sum(array_map(fn($p) => $p->valeur, $paiements));
        $reste = $res->prix - $totalPaye;

        if ($reste <= 0) {
            echo "<p style-'color:green'>💸 [PAYÉ] Résa #{$res->reservationId} | Montant total déjà payé</p><br>";
            continue;
        }

        // Infos client
        $client = $this->user_model->getUserInfo($res->clientId);
        if (!$client || !$client->mobile) {
            echo "📵 [SKIP] Résa #{$res->reservationId} | Client invalide ou pas de mobile<br>";
            continue;
        }

        $prenom = $client->prenom ?? 'Client';
        $mobile = "216" . $client->mobile;
        $mobile2 = "216" . $client->mobile2;
        $salle = $res->salle;

        // Vérifie si une relance a été envoyée récemment
        $lastRelance = $this->relance_model->getLastRelance($res->reservationId);
        $canRelance = true;

  

        // Debug infos
        echo "🔍 Résa #{$res->reservationId} | Client : $prenom | Reste : $reste DT | Échéance : " . $dateLimite->format('Y-m-d') . " | Interval : $interval jour(s)<br>";

        // Choix du type de relance
        $relanceType = null;
        $message = "";

        if ($interval === 40 || $interval === 31) {
            $relanceType = 'gentille';
            $message = "📅 Bonjour $prenom ! Votre réservation approche. Merci de régler les $reste DT restants.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;

        } elseif (($interval === 29 || $interval === 25  || $interval === 20 ) ) {
            $relanceType = 'standard';
            $message = "🔄 Rappel : $prenom, il vous reste $reste DT à régler avant échéance.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
            
        } elseif (($interval === 15 || $interval === 12  ||  $interval === 7  ||  $interval === 5  ) ) {
            $relanceType = 'sévère';
            $message = "⚠️ Urgence $prenom ! Plus que $interval jours. Solde dû : $reste DT. Merci d'agir rapidement.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
             $this->sendSMS($mobile2, $message , "relance") ;
        } elseif ( ($interval === 3 ) ) {
            $relanceType = 'ultime';
            $message = "⚠️ Alerte $prenom ! Il ne vous reste que 1 jour pour régler les $reste DT restants. Merci de faire le nécessaire.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
             $this->sendSMS($mobile2, $message , "relance") ;
        } elseif ($interval === 0) {
            $relanceType = 'dernier_jour';
            $message = "⏰ Aujourd'hui c'est le dernier délai, $prenom n'a pas réglé les $reste DT pour la salle $salle.";
             $this->sendSMS("21655465244", $message , "alert des relances") ;
             $this->sendSMS("21654419959", $message , "alert des relances") ;
        } 

        if ($relanceType && $canRelance) {
            echo "<br>✅ [RELANCE $relanceType] ----------------------------------<br>";
            echo "🆔 Réservation  : #{$res->reservationId}<br>";
            echo "👤 Client       : $prenom<br>";
            echo "📱 Téléphone    : $mobile<br>";
            echo "💰 Reste à payer: $reste DT<br>";
            echo "📆 Échéance     : " . $dateLimite->format('Y-m-d') . " (J" . ($interval > 0 ? "-" : "+") . abs($interval) . ")<br>";
            echo "✉️  Message     : $message<br>";
            echo "--------------------------------------------------------<br><br>";

            // En prod, décommente pour enregistrer :
            // $this->relance_model->addRelance($res->reservationId, 1 );
            // $this->sendSMS($mobile, $message , "relance") ;
            // $this->sendSMS($mobile2, $message , "relance") ;
        } else {
            echo "🚫 [NO RELANCE] Résa #{$res->reservationId} | Conditions non remplies<br><br>";
        }
    }

    echo "<br>=========== FIN DU TEST DE RELANCES AUTO ===========<br>";
}

   public function sendSMS($myMobile, $mySms , $type)
        {
            $smsInfo = array('destination'=>$myMobile,
                              'text' => $mySms,
                              'type' => $type ,
                              'createdBy'=>$this->vendorId,
                              'createdDtm'=>date('Y-m-d H:i:s') ,
                              'statut'=>1 ,

                            );
            $this->Sms_model->addNewSms($smsInfo) ; 

        }




          
 

        public function http_response($url)
            { 
                echo "Testing URL: " . $url . "<br>";

                $ch = curl_init(); 
                curl_setopt_array($ch, [
                    CURLOPT_URL            => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => false,
                    CURLOPT_FOLLOWLOCATION => false,
                    CURLOPT_ENCODING       => '',
                    CURLOPT_AUTOREFERER    => true,
                    CURLOPT_CONNECTTIMEOUT => 120,
                    CURLOPT_TIMEOUT        => 120,  
                    CURLOPT_MAXREDIRS      => 10,  
                    CURLOPT_SSL_VERIFYHOST => 0, // 🔥 Désactiver la vérification du certificat SSL
                    CURLOPT_SSL_VERIFYPEER => 0, // 🔥 Ignorer les erreurs SSL
                ]); 

                $response = curl_exec($ch); 
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
                $error = curl_error($ch); // Récupérer les erreurs cURL
                curl_close($ch);

                echo "<br>HTTP Code: " . $httpCode . "<br>";
                echo "API Response: " . $response . "<br>"; 
                echo "cURL Error: " . $error . "<br>"; // 🔥 Affiche les erreurs cURL

                return $httpCode;
            }


            
        
                    
          public function sendSMS1($myMobile, $mySms)
            { 
                $mySender = 'Queen park';

                $params = [
                    'fct'    => 'sms',
                    'key'    => 'GuDqqXQAY97z7PP2v9XD4VynAcnYUu/zoxnBn/Y4VNLvuwzVZI/j7eCpkB4DZtoFceCyE/5F5huzCAlvDUb6kNXub5Detypa',
                    'mobile' => $myMobile,
                    'sms'    => $mySms,  // Ne pas ajouter "+", `http_build_query` s'occupe de l'encodage
                    'sender' => $mySender
                ];

          //      $Url_str = "https://app.tunisiesms.tn/Api/Api.aspx?" . http_build_query($params, '', '&', PHP_QUERY_RFC3986);

               

            //    return $this->http_response($Url_str) ;
            }


             
 

   
 
}

?>