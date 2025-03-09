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
        $this->load->model("voiture_model");
        $this->load->model("photographe_model");
        $this->load->model("troupe_model");
        $this->isLoggedIn();   
    }
    
    



    public function addNew($reservationId)

    {
            $data["voiture"] = $this->voiture_model->ReservationInfo($data["projectInfo"]->voiture);
            $data["photographe"] = $this->photographe_model->ReservationInfo($data["projectInfo"]->photographe);
            $data["troupe"] = $this->troupe_model->ReservationInfo($data["projectInfo"]->troupe);
            $data['projectInfo'] = $this->photographe_model->ReservationInfo($reservationId);
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

           
                $result = $this->satisfaction_model->addNewSatisfaction($satisfactionInfo);
                $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                redirect('Reservation/view/'.$this->input->post('reservationId'));
    }


    
}

?>