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

    foreach ($reservations as $res) {
        // Skip données incomplètes
        if (!$res->clientId || !$res->prix || !$res->dateFin) continue;

        $resDate = new DateTime($res->dateFin);
        $dateLimite = $res->demandeEcheance
            ? new DateTime($res->demandeEcheance)
            : (clone $resDate)->modify('-30 days');

        $interval = (int)$now->diff($dateLimite)->format('%r%a'); // jours entre now et dateLimite
        $isFuture = $now < $dateLimite;

        // Paiement
        $paiements = $this->paiement_model->paiementListingbyReservation($res->reservationId);
        $totalPaye = array_sum(array_map(fn($p) => $p->valeur, $paiements));
        $reste = $res->prix - $totalPaye;

        if ($reste <= 0) continue; // Déjà payé

        // Client
        $client = $this->user_model->getUserInfo($res->clientId);
        if (!$client || !$client->mobile) continue;

        $prenom = $client->prenom ?? 'Client';
        $mobile = "216" . $client->mobile;

        // Vérifie la dernière relance
        $lastRelance = $this->relance_model->getLastRelance($res->reservationId);
        $canRelance = true;

        if ($lastRelance && isset($lastRelance->createdDTM)) {
            $lastRelanceDTM = new DateTime($lastRelance->createdDTM);
            $diffSinceLastRelance = $now->diff($lastRelanceDTM)->days;

            if ($diffSinceLastRelance < 2) {
                $canRelance = false;
                echo "[SKIP] Relance trop récente pour la résa #{$res->reservationId}\n";
            }
        }

        // Message selon le stade
        $relanceType = null;
        $message = "";

        if ($isFuture && $interval === 45) {
            $relanceType = 'gentil';
            $message = "📅 J-45 - Bonjour $prenom ! Pensez à régler les $reste DT restants.";
        } elseif ($isFuture && $interval <= 30 && $interval > 15 && $interval % 3 === 0) {
            $relanceType = 'normal';
            $message = "🔄 Relance J-$interval - $prenom, il reste $reste DT à payer. Merci d'anticiper.";
        } elseif ($isFuture && $interval === 15) {
            $relanceType = 'agressif';
            $message = "⚠️ Urgence J-15 - $prenom, il vous reste $reste DT. Sans règlement, la réservation est compromise.";
        } elseif (!$isFuture && $interval === -1 && $res->demandeEcheance) {
            $relanceType = 'derniere';
            $message = "⏰ Ultime rappel - $prenom, votre échéance spéciale est dans moins de 24h. Reste dû : $reste DT.";
        }

        // Affichage test
        if ($relanceType && $canRelance) {
            echo "[TEST][$relanceType] Vers $mobile ➜ $message\n";

            // --- En prod tu décommentes cette ligne :
            // $this->relance_model->addRelance($res->reservationId, $this->session->user_id ?? 1);
        }
    }
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


   
 
}

?>