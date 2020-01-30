<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Reservation extends BaseController
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
        $this->load->model('contrat_model');
        
        
        
        
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->reservation_model->ReservationListing();
            $returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data['userRecords'] = $this->reservation_model->ReservationListing();
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/list", $this->global, $data, NULL);
    
    }

    /**
     * This function is used to load the user list
     */
    function ResevationListing()
    {  
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->reservation_model->ReservationListing();
            $returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data['userRecords'] = $this->reservation_model->ReservationListing();
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/list", $this->global, $data, NULL);
    }


     /**
     * This function is used to load the user list
     */
    function ResevationCalender()
    {  
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->reservation_model->ReservationCalenderElilaErsi();
            $returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data['userRecords'] = $this->reservation_model->ReservationCalenderElilaErsi();
             $data['FarhetAmor'] = $this->reservation_model->ReservationCalenderFarhetElAMOR();
              $data['Laylina'] = $this->reservation_model->ReservationCalenderLayalina();
               $data['Soltana'] = $this->reservation_model->ReservationCalenderSoltanaR();
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/calender", $this->global, $data, NULL);
    }



        /**
     * This function is used to add new user to the system
     */
    function addNewReservation()
    {

                $dateDebut = $this->input->post('dateDebut');
                $heureDebut = $this->input->post('heureDebut');
                $dateFin = $this->input->post('dateDebut');
                $heureFin = $this->input->post('heureFin');
                $type = $this->input->post('type');
                $salle = $this->input->post('salle');
                $nbPlace = $this->input->post('nbPlace');
                $prix = $this->input->post('prix');
                $titre = $this->input->post('titre');
                $noteAdmin = $this->input->post('noteAdmin');  
                $cuisine = $this->input->post('cuisine');       
                $tableCM = $this->input->post('tableCM');                    
       



                     $reservationInfo = array('dateDebut'=>$dateDebut,
                        'heureDebut'=>$heureDebut,
                        'dateFin'=>$dateFin,
                        'heureFin'=>$heureFin,
                        'type'=>$type,
                        'salleId'=>$salle,
                        'nbPlace'=>$nbPlace,
                        'prix'=>$prix,
                        'titre'=>$titre,
                        'noteAdmin'=>$noteAdmin,
                        'statut'=>2,
                        'cuisine'=>$cuisine,
                        'tableCM'=>$tableCM,
                        'locataireId'=>$this->vendorId 

                                 
                                );

                
               
           
                $result = $this->reservation_model->addNewReservation($reservationInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Reservation ajouté avec succées ');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème d\'ajout');
                }
                
                redirect('Reservation/view/'.$result);
            
        
    }


     /**
     * This function is used to load the user list
     */
    function view($resId)
    {  

            

            $data['projectInfo'] = $this->reservation_model->ReservationInfo($resId);
            $data['contratInfo'] = $this->contrat_model->contratInfo($resId);
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservation($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getTotal($resId) ;
            




            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/details", $this->global, $data, NULL);
    }



     /**
     * This function is used to load the user list
     */
    function generateContrat($resId)
    {  

        $avance = $this->input->post('avance');
        $noteAdmin = $this->input->post('noteAdmin');

         $paiementInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'valeur'=>$avance,
                        'recepteurId'=>$this->vendorId,
                        'libele'=>'Avance',
                        'reservationId'=>$resId,                           
                                );

        $avanceId = $this->paiement_model->addNewPaiement($paiementInfo);

       $projectInfo = $this->reservation_model->ReservationInfo($resId);

        $nextyear  = date('Y-m-d', strtotime($projectInfo->dateDebut. ' + 335 days'));


        $contratInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'reservationID'=>$resId,
                        'avanceId'=>$avanceId,
                        'createdBy'=>$this->vendorId,
                        'deadline'=>$nextyear ,
                        'statut'=>0,
                                );

        $this->contrat_model-> addNewContrat($contratInfo) ; 


        $reservationInfo = array(
                        'noteAdmin'=>$noteAdmin,
                        'statut'=>1,
                                );



        $this->reservation_model->editReservation($reservationInfo, $resId);    

        redirect('Reservation/view/'.$resId) ;               
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
                        'reservationId'=>$resId,                           
                                );

        $this->paiement_model->addNewPaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getTotal($resId) ; 
        $projectInfo = $this->reservation_model->ReservationInfo($resId);


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

        $this->reservation_model->editReservation($reservationInfo, $resId);    
        redirect('Reservation/view/'.$resId) ; 
            
    }




    function  checkreservation($dateDebut,$datefin,$heureDebut,$heureFin){
        
            if($this->reservation_model->checkreservation($dateDebut,$datefin,$heureDebut,$heureFin)){
                return true ; 
            }

            return false ; 
        
    }










   
 
}

?>