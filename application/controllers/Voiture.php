<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Voiture extends BaseController
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
        $this->load->model('voiture_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {

           
            $data['userRecords'] = $this->voiture_model->ReservationListing();
            $this->global['pageTitle'] = 'Voiture';
            $this->loadViews("voiture/list", $this->global, $data, NULL);
    }




        public function addNew($reservationId)
    {
            $data['projectInfo'] = $this->reservation_model->ReservationInfo($reservationId);
            $this->global['pageTitle'] = 'Clients';
            $this->loadViews("voiture/new", $this->global, $data, NULL);
    }

      /**
     * This function is used to add new user to the system
     */
    function addNewReservationL()
    {

                $clientId = $this->input->post('clientId');
                $reservationId = $this->input->post('reservationId');

              
                
               
                $voitureName = $this->input->post('voitureName');
                $date = $this->input->post('date');
                $depart = $this->input->post('depart');

                $l1 = $this->input->post('l1');
                $l2 = $this->input->post('l2');
                $l3 = $this->input->post('l3');
                $l4 = $this->input->post('l4');

                $mobile1 = $this->input->post('mobile1');
                $mobile2 = $this->input->post('mobile2');

                $prix = $this->input->post('prix');
                $avance = $this->input->post('avance');

                $noteAdmin = $this->input->post('noteAdmin');  
                 
       
                $reservationInfo = array(
                    'voitureName'=>$voitureName,
                    'date'=>$date,
                    'depart'=>$depart,

                    'l1'=>$l1,
                    'l2'=>$l2,
                    'l3'=>$l3,
                    'l4'=>$l4,

                    'mobile1'=>$mobile1,
                    'mobile2'=>$mobile2,
                    
                    'prix'=>$prix,
                    'avance'=>$avance,
                    'noteAdmin'=>$noteAdmin,
                    
                    'reservationId'=>$reservationId,
                    'createdBy'=>$this->vendorId ,
                    'createdDTM'=>date('Y-m-d H:i:s'),
                    'clientId' => $clientId       
                            );

           
                $result = $this->voiture_model->addNewReservation($reservationInfo);
                
                if($result > 0)
                {

                     $reservationInfo1 = array('voiture'=>$result);

                    $this->reservation_model->editReservation($reservationInfo1, $reservationId); 

                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                    redirect('Reservation/view/'.$reservationId);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/view/'.$reservationId);
                }
           
        
    }







}

?>