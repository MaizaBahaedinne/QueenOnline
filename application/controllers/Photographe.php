<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Photographe extends BaseController
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
    

        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {

           
            $data['userRecords'] = $this->photographe_model->ReservationListing();
            foreach ( $data['userRecords'] as $record ) {
              $record->projectInfo = $this->reservation_model->ReservationInfo($record->reservationId);
            }
            $this->global['pageTitle'] = 'Photographe';
            $this->loadViews("photographe/list", $this->global, $data, NULL);
    }




        public function addNew($reservationId)

    {
            $data['Packs'] = $this->photographe_model->Packs();
            $data['projectInfo'] = $this->reservation_model->ReservationInfo($reservationId);
            $this->global['pageTitle'] = 'Clients';
            $this->loadViews("photographe/new", $this->global, $data, NULL);
    }

      /**
     * This function is used to add new user to the system
     */
    function addNewReservationL()
    {

                $clientId = $this->input->post('clientId');
                $reservationId = $this->input->post('reservationId');

              
                
               
                $packId = $this->input->post('packId');
                $date = $this->input->post('date');
             

   

                $prix = $this->input->post('prix');
                $avance = $this->input->post('avance');

                $noteAdmin = $this->input->post('noteAdmin');  
                 
       
                $reservationInfo = array(
                    'packId'=>$packId,
                    'date'=>$date,


                    'prix'=>$prix,
                    'avance'=>$avance,
                    'noteAdmin'=>$noteAdmin,
                    
                    'reservationId'=>$reservationId,
                    'createdBy'=>$this->vendorId ,
                    'createdDTM'=>date('Y-m-d H:i:s'),
                       
                    'statut' => 1 
                            );

           
                $result = $this->photographe_model->addNewReservation($reservationInfo);

                $koussayMobile = "55465244";
                $mySms = $this->name . "a reservé le photographe pour le ".$date ;
                $this->sendSMS("216" . $koussayMobile, $mySms);
                

                $HaythemMobile = "54419959";
                $mySms = $this->name . "a reservé le photographe pour le ".$date ;
                $this->sendSMS("216" . $HaythemMobile, $mySms);


                $MakremMobile = "98541815";
                $mySms =  "Une nouvelle reservation pour le ".$date ;
                $this->sendSMS("216" . $MakremMobile, $mySms);


                if($result > 0)
                {

                     $reservationInfo1 = array('photographe'=>$result, 'noteAdmin' => 'Ajout de photographe');

                    $this->reservation_model->editReservation($reservationInfo1, $reservationId, $this->vendorId); 

                    $paiementInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'valeur'=>$avance,
                        'recepteurId'=>$this->vendorId,
                        'libele'=>'Avance ',
                        'reservationPId'=>$result, 
                                            
                                );
                        $resId = $this->paiement_model->addNewPhotographePaiement($paiementInfo);



                            if (  $prix - $avance == 0   )
                            {
                              
                                $reservationInfoe = array(
                                            'statut'=>0 ,
                                                    );
                                 $this->photographe_model->editReservation($reservationInfoe, $result); 
                            }

                           


                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');


                    redirect('Reservation/view/'.$reservationId);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/view/'.$reservationId);
                }
           
        
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



}

?>