<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Client extends BaseController
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
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
            

            $data['userRecords'] = $this->client_model->clientListing();

            foreach ($data['userRecords'] as $client ) 
            {
                $client->reservations = $this->reservation_model->ReservationListingByClient($client->userId );

            }
            $this->global['pageTitle'] = 'Clients';
            $this->loadViews("client/list", $this->global, $data, NULL);
    }



    /**
     * This function is used to load the add new form
     */
    function addNewC()
    {

            $this->load->model('user_model');
            $data['roles'] = '';
            
            $this->global['pageTitle'] = 'CodeInsect : Add New User';

            $this->loadViews("Client/new", $this->global, $data, NULL);
        
    }


    /**
     * This function is used to add new user to the system
     */
    function addNewClient()
    {

                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $type = $this->input->post('type');
                
                if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');
                }

                $CIN = $this->input->post('CIN');
                $dateCin = $this->input->post('dateCin');
                $n = $this->input->post('n');
                $rue = $this->input->post('rue');
                $ville = $this->input->post('ville');
                $codePostal = $this->input->post('codePostal');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $mobile2 = $this->input->post('mobile2');
                $birthday = $this->input->post('birthday');
                $sexe = $this->input->post('sexe');

               
                 if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');

                     $userInfo = array('email'=>$email,
                                 'password'=>getHashedPassword($Matricule), 
                                 'roleId'=>4, 
                                 'name'=> $raisonSocial ,
                                 'cin'=> $CIN,
                                 'dateCin'=> $dateCin,
                                 'matricule'=> $Matricule,
                                 'mobile'=>$mobile,
                                 'mobile2'=>$mobile2,
                                 'createdBy'=>$this->vendorId,
                                 'createdDtm'=>date('Y-m-d H:i:s'), 
                                 'n '=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> $type,
                                 'userId'=>$userId,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'raisonSocial'=>$raisonSocial , 
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday , 
                                );

                }
                else

                {
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
                                 'type'=> $type,
                                 'userId'=>$userId,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday 
                                    );
                }
           
                $result = $this->client_model->addNewClient($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Client ajouté avec succées ');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème d\'ajout');
                }
                
                redirect('Client/addNew');
            
        
    }

    /**
     * This function is used to load the add new form
     */
    function edit($clientID)
    {
            $data['clientInfo'] = $this->client_model->getClientInfo($clientID);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit New User';

            $this->loadViews("Client/edit", $this->global, $data, NULL);
    }


    /**
     * This function is used to add new user to the system
     */
    function editClient ($clientId)
    {

                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $type = $this->input->post('type');
                if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');
                }

                
                $CIN = $this->input->post('CIN');
                $dateCin = $this->input->post('dateCin');
               
                $n = $this->input->post('n');
                $rue = $this->input->post('rue');
                $ville = $this->input->post('ville');
                $codePostal = $this->input->post('codePostal');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $mobile2 = $this->input->post('mobile2');
                $birthday = $this->input->post('birthday');
                $sexe = $this->input->post('sexe');

               
                 if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');
                     $userInfo = array('email'=>$email,
                                 'roleId'=>4, 
                                 'cin'=> $CIN,
                                 'dateCin'=> $dateCin,
                                 'matricule'=> $Matricule,
                                 'mobile'=>$mobile,
                                 'mobile2'=>$mobile2,
                                 
                                );

                      $this->user_model->editUser($userInfo, $clientId); 

                      $clientInfo = array(
                                 'n'=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> $type,
                                 'userId'=>$clientId,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'raisonSocial'=>$raisonSocial , 
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday , 

                                    );

                }else{
                $userInfo = array('email'=>$email,
                                 'roleId'=>4, 
                                 'cin'=> $CIN,
                                 'dateCin'=> $dateCin,
                                 'mobile'=>$mobile,
                                 'mobile2'=>$mobile2,
                                
                                    );

              $this->user_model->editUser($userInfo, $clientId); 

                $clientInfo = array(
                                 'n'=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> $type,
                                 'userId'=>$clientId,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday , 

                                    );

                }

           
                $result = $this->client_model->editClient($clientInfo, $clientId); 
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Client ajouté avec succées ');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème d\'ajout');
                }
                
                redirect('/');
            
        
    }



    


 /**
     * This function is used to add new user to the system
     */
    function addClientandReservation($resId)
    {

                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $type = $this->input->post('type');
                
                if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');
                }

                $CIN = $this->input->post('CIN');
                $dateCin = $this->input->post('dateCin');
                $n = $this->input->post('n');
                $rue = $this->input->post('rue');
                $ville = $this->input->post('ville');
                $codePostal = $this->input->post('codePostal');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $mobile2 = $this->input->post('mobile2');
                $birthday = $this->input->post('birthday');
                $sexe = $this->input->post('sexe');

               
                 if($type=='ste' ) 
                {
                     $raisonSocial = $this->input->post('raisonSocial');
                     $Matricule = $this->input->post('Matricule');

                     $userInfo = array('email'=>$email,
                                 'password'=>getHashedPassword($Matricule), 
                                 'roleId'=>4, 
                                 'name'=> $raisonSocial ,
                                 'cin'=> $CIN,
                                 'dateCin'=> $dateCin,
                                 'matricule'=> $Matricule,
                                 'mobile'=>$mobile,
                                 'mobile2'=>$mobile2,
                                 'createdBy'=>$this->vendorId,
                                 'createdDtm'=>date('Y-m-d H:i:s'), 
                                 'n'=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> $type,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'raisonSocial'=>$raisonSocial , 
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday , 
                                );

                }
                else

                {
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
                                 'n'=>$n   , 
                                 'rue'=>$rue, 
                                 'codePostal'=> $codePostal,
                                 'ville'=> $ville,
                                 'type'=> $type,
                                 'nom'=>$nom,
                                 'prenom'=>$prenom,
                                 'Sexe'=>$sexe , 
                                 'birthday'=>$birthday 
                                    );
                }
           
                $clientId = $this->client_model->addNewClient($userInfo);
                
                 $resInfo = array('clientId'=>$clientId) ; 


                $this->reservation_model->editReservation($resInfo,$resId); 
                
                redirect('Reservation/view/'.$resId);
            
        
    }

    function clientInfo() {
        $cin = $this->input->post('cin');
        $data = $this->client_model->checkClientExists($cin) ;
        echo $this->response($data); 
    }




      

    function http_response($url)
        {
            $ch = curl_init();

            $options = array(
                CURLOPT_URL            => $url ,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_AUTOREFERER    => true,
                CURLOPT_CONNECTTIMEOUT => 120,
                CURLOPT_TIMEOUT        => 120,
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_SSL_VERIFYPEER => false,
            );
            curl_setopt_array( $ch, $options );
            $response = curl_exec($ch);
           
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ( $httpCode != 200 ){
                return "Return code is {$httpCode} \n"
                    .curl_error($ch);
            } else {
                //echo "<pre>".htmlspecialchars($response)."</pre>";
                return $response;
            }

            curl_close($ch);
        }



        function sendSMS($myMobile, $mySms)
        {
            $smsInfo = array('destination'=>"216".$myMobile,
                              'text' => $mySms,
                              'createdBy'=>$this->vendorId,
                              'createdDtm'=>date('Y-m-d H:i:s') ,
                              'statut'=>1 ,

                            );
            $this->Sms_model->addNewSms($smsInfo) ; 

        }


   
 
}

?>