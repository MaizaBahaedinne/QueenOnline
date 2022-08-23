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
        $this->load->model('contrat_model');
        $this->load->model('paiement_model');
    

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

        public function addNewO()
    {
           
            $this->global['pageTitle'] = 'Clients';
            $this->loadViews("voiture/newout", $this->global, null , NULL);
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
                    'clientId' => $clientId   ,     
                    'statut' => 1 
                            );

           
                $result = $this->voiture_model->addNewReservation($reservationInfo);
                
                if($result > 0)
                {

                     $reservationInfo1 = array('voiture'=>$result);

                    $this->reservation_model->editReservation($reservationInfo1, $reservationId); 

                    $paiementInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'valeur'=>$avance,
                        'recepteurId'=>$this->vendorId,
                        'libele'=>'Avance ',
                        'reservationVId'=>$result, 
                                            
                                );
                        $resId = $this->paiement_model->addNewVoiturePaiement($paiementInfo);



                            if (  $prix - $avance == 0   )
                            {
                              
                                $reservationInfoe = array(
                                            'statut'=>0 ,
                                                    );
                                 $this->voiture_model->editReservation($reservationInfoe, $resId); 
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

                    'mobile1'=>$mobile,
                    'mobile2'=>$mobile2,
                    
                    'prix'=>$prix,
                    'avance'=>$avance,
                    'noteAdmin'=>$noteAdmin,
                    
                    
                    'createdBy'=>$this->vendorId ,
                    'createdDTM'=>date('Y-m-d H:i:s'),
                    'clientId' => $clientId ,
                    'statut' => 1 
                            );

           
                $result = $this->voiture_model->addNewReservation($reservationInfo);
                
                if($result > 0)
                {

                    


                    $paiementInfo = array(
                        'createdDate'=>date('Y-m-d H:i:s'),
                        'valeur'=>$avance,
                        'recepteurId'=>$this->vendorId,
                        'libele'=>'Avance ',
                        'reservationVId'=>$result, 
                                            
                                );
                        $resId = $this->paiement_model->addNewVoiturePaiement($paiementInfo);



                            if (  $prix - $avance == 0   )
                            {
                              
                                $reservationInfoe = array(
                                            'statut'=>0 ,
                                                    );
                                 $this->voiture_model->editReservation($reservationInfoe, $resId); 
                            }

                           


                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');


                    redirect('Voiture/view/'.$result);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Voiture/view/'.$result);
                }

                
           
        
    }



     /**
     * This function is used to load the user list
     */
    function view($resId)
    {  

            $data['projectInfo'] = $this->voiture_model->ReservationInfo($resId);

            $data['clientInfo'] = $this->user_model->getUserInfo($data['projectInfo']->clientId);
          
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservationVoiture($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getVTotal($resId) ;             
                 
            $data['userID'] = $this->vendorId ; 



            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("voiture/view", $this->global, $data, NULL);
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
                        'reservationVId'=>$resId,                           
                                );
            $ReservationInfo =  $this->voiture_model->ReservationInfo($resId) ;
            $clientInfo = $this->client_model->getClientInfo($ReservationInfo->clientId); 
            
   
        $this->paiement_model->addNewVoiturePaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getVTotal($resId) ; 
        $projectInfo = $this->voiture_model->ReservationInfo($resId);


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

        $this->voiture_model->editReservation($reservationInfo, $resId);    
        redirect('Voiture/view/'.$resId) ; 
            
    }




             /**
     * This function is used to load the user list
     */
    function recuP($resId)
    {  
       
            $data['projectInfo'] = $this->voiture_model->ReservationInfo($resId);
            
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservationVoiture($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getVTotal($resId) ;

            $this->global['pageTitle'] = 'Recu de reservation';
            $this->loadViews("voiture/recu", $this->global, $data, NULL);
    }





}

?>