 <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Finance extends BaseController
{






    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('client_model');
        $this->load->model('reservation_model');
        $this->load->model('salle_model');
        $this->load->model('paiement_model');
        $this->load->model('finance_model');
        $this->load->model("Sms_model");
        $this->load->model("relance_model");
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentListing();
            

            $this->global['pageTitle'] = 'Finance Salle';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }


        /**
     * This function used to load the first screen of the user
     */
    public function voiture()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentVoitureListing();
            

            $this->global['pageTitle'] = 'Finance voiture';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }



            /**
     * This function used to load the first screen of the user
     */
    public function prestation()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentPrestationListing();
            

            $this->global['pageTitle'] = 'Finance prestation';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }


                /**
     * This function used to load the first screen of the user
     */
    public function troupe()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentTroupeListing();
            

            $this->global['pageTitle'] = 'Finance troupe';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }


                    /**
     * This function used to load the first screen of the user
     */
    public function photographe()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentPhotographeListing();
            

            $this->global['pageTitle'] = 'Finance troupe';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }



    /**
     * This function used to load the first screen of the user
     */
    public function relance()
    {
            $data['financeRecords'] = $this->finance_model->ReservationCalender();
            foreach ($data['financeRecords'] as $f ) {
                $f->relance =   sizeof( $this->finance_model->relanceListing($f->reservationId));
                $f->last = $this->finance_model->lastrelanceListing($f->reservationId) ;

            }

            $this->global['pageTitle'] = 'User Listing';
            $this->loadViews("finance/relance", $this->global, $data, NULL);
    }



  /**
     * This function used to load the first screen of the user
     */
    public function addRelance()
    {
            

            $check = $this->input->post('check'); 

            foreach ($check as $c ) {
               
                    $data['projectInfo'] = $this->reservation_model->ReservationInfo($c);
                    $data['clientInfo'] = $this->user_model->getUserInfo($data['projectInfo']->clientId);
                    $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservation($c) ;
                    
                        $val =  0 ;
                        foreach ($data['paiementInfo'] as $p ) {
                                $val = $val + $p->valeur ;                            
                        }

                     $mySms = "Bonjour ".$data['clientInfo']->prenom.", Nous venons de vous rappeler que le reste de votre réservation ".($data['projectInfo']->prix - $val) ." DT a expiré. Pour éviter l'annulation du contrat, veuillez payer ces dus."  ;
                    
                         $myMobile = $data['clientInfo']->mobile ;
                           $this->sendSMS("216".$myMobile, $mySms , "relance") ;


                     $relanceInfo = array(
                        'createdDTM'=>date('Y-m-d H:i:s'),
                        'createdBy'=>$this->vendorId,
                        'reservationId'=>$c,                           
                       );

                      $this->finance_model->addNewRelance($relanceInfo) ;

            }


            redirect("Finance/relance") ;
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
            $message = "Bonjour $prenom ! Votre réservation approche. Merci de régler les $reste DT restants.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;

        } elseif (($interval === 29 || $interval === 25  || $interval === 20 ) ) {
            $relanceType = 'standard';
            $message = "Rappel : $prenom, il vous reste $reste DT à régler avant échéance.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
            
        } elseif (($interval === 15 || $interval === 12  ||  $interval === 7  ||  $interval === 5  ) ) {
            $relanceType = 'sévère';
            $message = "Urgence $prenom ! Plus que $interval jours. Solde dû : $reste DT. Merci d'agir rapidement.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
             $this->sendSMS($mobile2, $message , "relance") ;
        } elseif ( ($interval === 3 ) ) {
            $relanceType = 'ultime';
            $message = "Alerte $prenom ! Il ne vous reste que 1 jour pour régler les $reste DT restants. Merci de faire le nécessaire.";
             $this->relance_model->addRelance($res->reservationId, 1 );
             $this->sendSMS($mobile, $message , "relance") ;
             $this->sendSMS($mobile2, $message , "relance") ;
        } elseif ($interval === 0) {
            $relanceType = 'dernier_jour';
            $message = "Aujourd'hui c'est le dernier délai, $prenom n'a pas réglé les $reste DT pour la salle $salle.";
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
          //  $this->Sms_model->addNewSms($smsInfo) ; 

        }


   
 
}

?>