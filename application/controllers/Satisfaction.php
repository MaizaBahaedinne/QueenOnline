<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Satisfaction extends BaseController
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
        $this->load->model('photographe_model');
        $this->load->model('contrat_model');
        $this->load->model('paiement_model');
        $this->load->model("Sms_model");
        $this->load->model("satisfaction_model");

        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {

           
       
    }




        public function addNew($reservationId)

    {
            $data['Packs'] = $this->photographe_model->Packs();
            $data['projectInfo'] = $this->reservation_model->ReservationInfo($reservationId);
            $this->global['pageTitle'] = 'Satisfaction';
            $this->loadViews("satisfaction/new", $this->global, $data, NULL);
    }

      /**
     * This function is used to add new user to the system
     */
    function addNewSatisfaction()
    {

            
              $satisfactionInfo = array(
                        'reclamation'   => $this->input->post('reclamation'),                    
                        'reservationId' => $this->input->post('reservationId'),
                        'createdBy'     => $this->vendorId,
                        'createdDTM'    => date('Y-m-d H:i:s'),
                        
                        'salle'         => $this->input->post('salle'),
                        'service'       => $this->input->post('service'),
                        'proprete'      => $this->input->post('proprete'),
                        'lumiere'       => $this->input->post('lumiere'),
                        'decoration'    => $this->input->post('decoration'),
                        'photographe'   => $this->input->post('photographe'),
                        'musicale'      => $this->input->post('musicale'),
                        'voiture'       => $this->input->post('voiture'),

                        'entre'         => $this->input->post('entre'),
                        'sortie'        => $this->input->post('sortie'),

 
                    );

           
                $result = $this->satisfaction_model->addNewSatisfaction($reservationInfo);

                $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');


                redirect('Reservation/view/'.$reservationId);
                
            
        
    }



 
                
           
        
 


     /**
     * This function is used to load the user list
     */
    function view($resId)
    {  

            $data['projectInfo'] = $this->photographe_model->ReservationInfo($resId);
            $data['clientInfo'] = $this->user_model->getUserInfo($data['projectInfo']->clientId);
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservationPhotographe($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getPTotal($resId) ;                 
            $data['userID'] = $this->vendorId ; 
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
           $this->loadViews("photographe/view", $this->global, $data, NULL);
    }



     /**
     * This function is used to load the user list
     */
    function addPaiement($resId)
    {  

        $avance = $this->input->post('avance');
        $noteAdmin = $this->input->post('noteAdmin');

         $paiementInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'valeur'=>$avance,
                        'recepteurId'=>$this->vendorId,
                        'libele'=>'Partie ',
                        'reservationPId'=>$resId,                           
                                );
            $ReservationInfo =  $this->photographe_model->ReservationInfo($resId) ;
            $clientInfo = $this->client_model->getClientInfo($ReservationInfo->clientId); 
            
   
        $this->paiement_model->addNewPhotographePaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getPTotal($resId) ; 
        $projectInfo = $this->photographe_model->ReservationInfo($resId);

        

        $reservationInfo = array(
                        'noteAdmin'=>$noteAdmin,
                        'statut'=>1,
                                );

        if (  $projectInfo->prix - $totalPaiement->valeur == 0   )
        {
          
            $reservationInfo = array(
                        'noteAdmin'=>$noteAdmin,
                        'statut'=>0 ,
                                );
        }
        $HaythemMobile = "54419959";
        $this->sendSMS("216" . $HaythemMobile, "(Photographe) paiement de ".$avance." par ".$this->name." pour ".$resId , "Notif admin Troupe"); 

        $this->photographe_model->editReservation($reservationInfo, $resId);    
        redirect('Photographe/view/'.$resId) ; 
            
    }


             /**
     * This function is used to load the user list
     */
    function recuP($resId)
    {  
       
            $data['projectInfo'] = $this->photographe_model->ReservationInfo($resId);
             $data['clientInfo'] = $this->user_model->getUserInfo($data['projectInfo']->clientId);
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservationPhotographe($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getPTotal($resId) ;

            $this->global['pageTitle'] = 'Recu de reservation';
            $this->loadViews("photographe/recu", $this->global, $data, NULL);
    }


     function deleteReservation($resId)
        {
                $reservationInfo = [ "statut" => 3];
                $result = $this->photographe_model->editReservation($reservationInfo, $resId);
                if ($result) {
                        $this->session->set_flashdata("success", "Reservation mise à jour avec succées ");
                        redirect("Photographe/view/" . $resId);
                } else {
                        $this->session->set_flashdata("error", "Problème de mise à jours");
                        redirect("Photographe/view/" . $resId);
                }
        }




        function sendSMS($myMobile, $mySms, $type)
        {
            $smsInfo = array('destination'=>$myMobile,
                              'text' => $mySms,
                              'type' => $type,
                              'createdBy'=>$this->vendorId,
                              'createdDtm'=>date('Y-m-d H:i:s') ,
                              'statut'=>1 ,

                            );
            $this->Sms_model->addNewSms($smsInfo) ; 

        }


}

?>