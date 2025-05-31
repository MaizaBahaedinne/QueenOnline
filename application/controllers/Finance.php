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




                    public function autoRelanceCron()
                {
                    $reservations = $this->finance_model->ReservationCalender();

                    foreach ($reservations as $res) {
                        $now = new DateTime();
                        $resDate = new DateTime($res->dateFin);

                        // Date limite = demande client OU 30 jours avant date réservation
                        $dateLimite = $res->demandeEcheance
                            ? new DateTime($res->demandeEcheance)
                            : (clone $resDate)->modify('-30 days');

                        $interval = (int)$now->diff($dateLimite)->format('%r%a'); // négatif si en retard
                        $isFuture = $now < $dateLimite;

                        // Paiement
                        $paiements = $this->paiement_model->paiementListingbyReservation($res->reservationId);
                        $totalPaye = array_sum(array_map(fn($p) => $p->valeur, $paiements));
                        $reste = $res->prix - $totalPaye;

                        if ($reste <= 0) continue;

                        $lastPayment = $this->paiement_model->getLastPaymentDate($res->reservationId);
                        $lastPayDate = $lastPayment ? new DateTime($lastPayment->datePaiement) : null;

                        $client = $this->user_model->getUserInfo($res->clientId);
                        $mobile = "216" . $client->mobile;
                        $prenom = $client->prenom;

                        // --- TEST MODE: afficher ce qu'on ferait ---
                        $relanceType = null;
                        $message = "";

                        if ($isFuture && $interval == 45 && $lastPayDate) {
                            $relanceType = 'gentil';
                            $message = "📅 Rappel J-45 à $prenom - Dernier paiement : " . $lastPayDate->format('d/m/Y') . " | Reste : $reste DT";
                        } elseif ($isFuture && $interval <= 30 && $interval > 15 && $interval % 3 == 0) {
                            $relanceType = 'normal';
                            $message = "🔄 Relance $prenom (chaque 3 jours) | J-$interval | Reste : $reste DT";
                        } elseif ($isFuture && $interval == 15) {
                            $relanceType = 'agressif';
                            $message = "⚠️ Rappel agressif J-15 $prenom | Reste : $reste DT";
                        } elseif (!$isFuture && $interval == -1) {
                            $relanceType = 'derniere';
                            $message = "⏰ Dernière relance < 24h $prenom | Reste : $reste DT";
                        }

                        if ($relanceType) {
                            echo "[TEST][$relanceType] $message\n";
                            $this->logRelance($res->reservationId, $relanceType); // Tu peux commenter cette ligne si tu veux un test 100% dry
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