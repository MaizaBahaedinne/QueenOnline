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

           
            $data['voituresRecords'] = $this->voiture_model->voitureLocationListing();
            $this->global['pageTitle'] = 'Voiture';
            $this->loadViews("voiture/list", $this->global, $data, NULL);
    }




        public function addNew()
    {
            $this->global['pageTitle'] = 'Clients';
            $this->loadViews("voiture/new", $this->global, NULL, NULL);
    }

      /**
     * This function is used to add new user to the system
     */
    function addNewReservation()
    {

                $clientId = $this->input->post('clientId');

                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $CIN = $this->input->post('CIN');
                $dateCin = $this->input->post('dateCin');
                $n = $this->input->post('N');
                $rue = $this->input->post('rue');
                $ville = $this->input->post('ville');
                $codePostal = $this->input->post('codePostal');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $mobile2 = $this->input->post('mobile2');
                $birthday = $this->input->post('birth');
                $sexe = $this->input->post('sexe');

               
             
                $userInfo = array('email'=>$email,
                                 'password'=>getHashedPassword($CIN), 
                                 'roleId'=>4, 
                                 'name'=> $prenom.' '.$nom,
                                 'cin'=> $CIN,
                                 'dateCin'=> $dateCin,
                                 'mobile'=>$mobile,
                                 'mobile2'=>$mobile2,
                                 'createdBy'=>$this->vendorId,
                                 'createdDtm'=>date('Y-m-d H:i:s'),
                                 'n '=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> 'personne' ,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday 
                                    );
                
                if($clientId == null )
                { 
                    $clientId = $this->client_model->addNewClient($userInfo);
                    var_dump($clientId) ; 
                }else
                {
                     $this->client_model->editClient($userInfo, $clientId) ;
                }
                
                $reservationId = $this->input->post('reservationId');

                $dateDebut = $this->input->post('dateDebut');
                $heureDebut = $this->input->post('heureDebut');
                $dateFin = $this->input->post('dateDebut');
                $heureFin = $this->input->post('heureFin');
                $depart = $this->input->post('depart');
                $arrivee = $this->input->post('arrivee');
                $maps = $this->input->post('maps');
                $prix = $this->input->post('prix');
                $avance = $this->input->post('avance');
                $noteAdmin = $this->input->post('noteAdmin');  
                 
       
                $reservationInfo = array('dateDebut'=>$dateDebut,
                    'heureDebut'=>$heureDebut,
                    'dateFin'=>$dateFin,
                    'heureFin'=>$heureFin,
                    'depart'=>$depart,
                    'arrivee'=>$arrivee,
                    'maps' => $maps, 
                    'prix'=>$prix,
                    'avance'=>$avance,
                    'noteAdmin'=>$noteAdmin,
                    'statut'=>2,
                    'reservationId'=>$reservationId,
                    'locataireId'=>$this->vendorId ,
                    'createdDTM'=>date('Y-m-d H:i:s'),
                    'clientId' => $clientId       
                            );

           
                $result = $this->voiture_model->addNewReservation($reservationInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                    redirect('Reservation/view/'.$result);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/edit/'.$result);
                }
           
        
    }







}

?>