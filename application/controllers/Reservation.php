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
$data['salleRecords'] = $this->salle_model->SalleListing();
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


            $data['ElilaErsi'] = $this->reservation_model->ReservationCalender1(1);
             $data['FarhetAmor'] = $this->reservation_model->ReservationCalender1(2);
              $data['Laylina'] = $this->reservation_model->ReservationCalender1(3);
               $data['Soltana'] = $this->reservation_model->ReservationCalender1(4);

               $data['salleRecords'] = $this->salle_model->SalleListing();
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
                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                    redirect('Reservation/view/'.$result);


                            

                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/edit/'.$result);
                }
                
                
            
        
    }




        /**
     * This function is used to add new user to the system
     */
    function editReservation($resId)
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
                        'cuisine'=>$cuisine,
                        'tableCM'=>$tableCM,
                        'locataireId'=>$this->vendorId 

                                 
                                );

                
               
           
                $result = $this->reservation_model->editReservation($reservationInfo,$resId);
                
                
                if($result)
                {
                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                    redirect('Reservation/view/'.$resId);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/edit/'.$resId);
                }
                
              
        
    }



     function deleteReservation($resId)
    {
              
       



                     $reservationInfo = array('dateDebut'=>$dateDebut,
                        'statut'=>3,
       

                                 
                                );

                
               
           
                $result = $this->reservation_model->editReservation($reservationInfo,$resId);
                
                if($result)
                {
                    $this->session->set_flashdata('success', 'Reservation mise à jour avec succées ');
                    redirect('Reservation/view/'.$resId);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problème de mise à jours');
                    redirect('Reservation/view/'.$resId);
                }
                
      
            
        
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
            

            $data['userID'] = $this->vendorId ; 


            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/details", $this->global, $data, NULL);
    }



         /**
     * This function is used to load the user list
     */
    function recuP($resId)
    {  

            

           
            $data['projectInfo'] = $this->reservation_model->ReservationInfo($resId);
            $data['contratInfo'] = $this->contrat_model->contratInfo($resId);
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservation($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getTotal($resId) ;
            




            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("paiement/recu", $this->global, $data, NULL);
    }





     /**
     * This function is used to load the user list
     */
    function edit($resId)
    {  

            
            $data['salleRecords'] = $this->salle_model->SalleListing();
            $data['projectInfo'] = $this->reservation_model->ReservationInfo($resId);
            $data['contratInfo'] = $this->contrat_model->contratInfo($resId);
            $data['paiementInfo'] = $this->paiement_model->paiementListingbyReservation($resId) ;
            $data['totalPaiement'] = $this->paiement_model->getTotal($resId) ;
            




            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            $this->loadViews("reservation/edit", $this->global, $data, NULL);
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

        $nextyear  = date('Y-m-d', strtotime($projectInfo->dateDebut. '  - 30  days'));


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

        $ReservationInfo =  $this->reservation_model->ReservationInfo($resId) ;
        $clientInfo = $this->client_model->getClientInfo($ReservationInfo->clientId);

        $myMobile = $clientInfo->mobile ;
        $mySms = "Salut ".$clientInfo->name.", On vous souhaite la bienvenue chez nous. Votre réservation de l'espace (".$ReservationInfo->salle.") pour la date (".$ReservationInfo->dateDebut.") a été enregistrer.";


        
        echo $this->sendSMS("216".$myMobile, $mySms) ;
                        

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
            $ReservationInfo =  $this->reservation_model->ReservationInfo($resId) ;
            $clientInfo = $this->client_model->getClientInfo($ReservationInfo->clientId); 
            $myMobile = $clientInfo->mobile ;
            $mySms = "Salut ".$clientInfo->name.", une paiement de (".$avance." DT)  pour la reservation N°".$resId." a été effectuer avec succées" ;
      
            $this->sendSMS("216".$myMobile, $mySms) ;
   
        $this->paiement_model->addNewPaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getTotal($resId) ; 
        $projectInfo = $this->reservation_model->ReservationInfo($resId);


        $reservationInfo = array(
                        'noteAdmin'=>$noteAdmin,
                        'statut'=>1,
                                );

        if (  $projectInfo->prix - $totalPaiement->valeur == 0   )
        {
            
            $myMobile = $clientInfo->mobile ;
            $mySms = "Bonjour ".$clientInfo->name.", votre reservation de la salle (".$ReservationInfo->salle.") pour le (".$ReservationInfo->dateDebut.") a été validé on vous souhaite une belle cérimonie." ;


   
        $this->sendSMS("216".$myMobile, $mySms) ;
   
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

        $mySender = 'Queen park';
        $key = "ns1PwxEKAljejzi3RSBAHPsoQl/P9s0jtrXDkRb4j6sjNpzNER8aprZNyzyAuLlteKM222LwbgBRrlBCvFDV4YlQbSvBZMYA/Ye3r0ggsYQ=";

        $Url_str ="www.tunisiesms.tn/client/Api/Api.aspx?fct=sms&key=%KEY%&mobile=%MSISDN%&sms=%SMS%&sender=%SENDER%";

        $Url_str = str_replace("%MSISDN%",$myMobile,$Url_str);
        $Url_str = str_replace("%SMS%",urlencode($mySms),$Url_str);
        $Url_str = str_replace("%SENDER%",urlencode($mySender),$Url_str);
        $Url_str = str_replace("%KEY%",urlencode($key),$Url_str);

        
        echo $this->http_response($Url_str);

        }


        





   
 
}

?>