 <?php
 if (!defined("BASEPATH")) {
     exit("No direct script access allowed");
 }

 require APPPATH . "/libraries/BaseController.php";

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
         $this->load->model("user_model");
         $this->load->model("client_model");
         $this->load->model("reservation_model");
         $this->load->model("salle_model");
         $this->load->model("paiement_model");
         $this->load->model("contrat_model");
         $this->load->model("voiture_model");
         $this->load->model("photographe_model");
         $this->load->model("prestation_model");
         $this->load->model("troupe_model");

         $this->isLoggedIn();
     }

     /**
      * This function used to load the first screen of the user
      */
     public function index()
     {
         $data["salleRecords"] = $this->salle_model->SalleListing();

         $data["userRecords"] = $this->reservation_model->ReservationListing();
         $this->global["pageTitle"] = "CodeInsect : User Listing";
         $this->loadViews("reservation/list", $this->global, $data, null);
     }

     public function addNew()
     {
         $data["salleRecords"] = $this->salle_model->SalleListing();
         $this->global["pageTitle"] = "CodeInsect : User Listing";
         $this->loadViews("reservation/new", $this->global, $data, null);
     }

     /**
      * This function is used to add new user to the system
      */
     function addNewReservation()
     {
         $clientId = $this->input->post("clientId");

         $nom = $this->input->post("nom");
         $prenom = $this->input->post("prenom");
         $CIN = $this->input->post("CIN");
         $dateCin = $this->input->post("dateCin");
         $n = $this->input->post("N");
         $rue = $this->input->post("rue");
         $ville = $this->input->post("ville");
         $codePostal = $this->input->post("codePostal");
         $email = $this->input->post("email");
         $mobile = $this->input->post("mobile");
         $mobile2 = $this->input->post("mobile2");
         $birthday = $this->input->post("birth");
         $sexe = $this->input->post("sexe");

         $userInfo = [
             "email" => $email,
             "password" => getHashedPassword($CIN),
             "roleId" => 4,
             "name" => $prenom . " " . $nom,
             "cin" => $CIN,
             "dateCin" => $dateCin,
             "mobile" => $mobile,
             "mobile2" => $mobile2,
             "createdBy" => $this->vendorId,
             "createdDtm" => date("Y-m-d H:i:s"),
             "n " => $n,
             "rue" => $rue,
             "codePostal" => $codePostal,
             "ville" => $ville,
             "type" => "personne",
             "nom" => $nom,
             "prenom" => $prenom,
             "Sexe" => $sexe,
             "birthday" => $birthday,
         ];

         if ($clientId == null) {
             $clientId = $this->client_model->addNewClient($userInfo);
             var_dump($clientId);
         } else {
             $this->client_model->editClient($userInfo, $clientId);
         }

         $dateDebut = $this->input->post("dateDebut");
         $heureDebut = $this->input->post("heureDebut");
         $dateFin = $this->input->post("dateDebut");
         $heureFin = $this->input->post("heureFin");
         $type = $this->input->post("type");
         $salle = $this->input->post("salle");
         $nbPlace = $this->input->post("nbPlace");
         $prix = $this->input->post("prix");
         $titre = $this->input->post("titre");
         $noteAdmin = $this->input->post("noteAdmin");
         $cuisine = $this->input->post("cuisine");
         $tableCM = $this->input->post("tableCM");

         $reservationInfo = [
             "dateDebut" => $dateDebut,
             "heureDebut" => $heureDebut,
             "dateFin" => $dateFin,
             "heureFin" => $heureFin,
             "type" => $type,
             "salleId" => $salle,
             "nbPlace" => $nbPlace,
             "prix" => $prix,
             "titre" => $titre,
             "noteAdmin" => $noteAdmin,
             "statut" => 2,
             "cuisine" => $cuisine,
             "tableCM" => $tableCM,
             "locataireId" => $this->vendorId,
             "createdDTM" => date("Y-m-d H:i:s"),
             "clientId" => $clientId,
         ];

         $result = $this->reservation_model->addNewReservation(
             $reservationInfo
         );

         if ($result > 0) {
             $this->session->set_flashdata(
                 "success",
                 "Reservation mise à jour avec succées "
             );
             redirect("Reservation/view/" . $result);
         } else {
             $this->session->set_flashdata("error", "Problème de mise à jours");
             redirect("Reservation/edit/" . $result);
         }
     }

     /**
      * This function is used to add new user to the system
      */
     function editReservation($resId)
     {
         $dateDebut = $this->input->post("dateDebut");
         $heureDebut = $this->input->post("heureDebut");
         $dateFin = $this->input->post("dateDebut");
         $heureFin = $this->input->post("heureFin");
         $type = $this->input->post("type");
         $salle = $this->input->post("salle");
         $nbPlace = $this->input->post("nbPlace");
         $prix = $this->input->post("prix");
         $titre = $this->input->post("titre");
         $noteAdmin = $this->input->post("noteAdmin");
         $cuisine = $this->input->post("cuisine");
         $tableCM = $this->input->post("tableCM");
         $troupe = $this->input->post("troupe");
         $photographe = $this->input->post("photographe");

         $reservationInfo = [
             "dateDebut" => $dateDebut,
             "heureDebut" => $heureDebut,
             "dateFin" => $dateFin,
             "heureFin" => $heureFin,
             "type" => $type,
             "salleId" => $salle,
             "nbPlace" => $nbPlace,
             "prix" => $prix,
             "titre" => $titre,
             "noteAdmin" => $noteAdmin,
             "cuisine" => $cuisine,
             "tableCM" => $tableCM,
             "locataireId" => $this->vendorId,
         ];

         $result = $this->reservation_model->editReservation(
             $reservationInfo,
             $resId
         );

         if ($result) {
             $this->session->set_flashdata(
                 "success",
                 "Reservation mise à jour avec succées "
             );
             redirect("Reservation/view/" . $resId);
         } else {
             $this->session->set_flashdata("error", "Problème de mise à jours");
             redirect("Reservation/edit/" . $resId);
         }
     }

     function deleteReservation($resId)
     {
         $reservationInfo = ["dateDebut" => $dateDebut, "statut" => 3];

         $result = $this->reservation_model->editReservation(
             $reservationInfo,
             $resId
         );

         if ($result) {
             $this->session->set_flashdata(
                 "success",
                 "Reservation mise à jour avec succées "
             );
             redirect("Reservation/view/" . $resId);
         } else {
             $this->session->set_flashdata("error", "Problème de mise à jours");
             redirect("Reservation/view/" . $resId);
         }
     }

     /**
      * This function is used to load the user list
      */
     function view($resId)
     {
         $data["projectInfo"] = $this->reservation_model->ReservationInfo(
             $resId
         );
         $data["clientInfo"] = $this->user_model->getUserInfo(
             $data["projectInfo"]->clientId
         );
         $data["contratInfo"] = $this->contrat_model->contratInfo($resId);
         $data[
             "paiementInfo"
         ] = $this->paiement_model->paiementListingbyReservation($resId);
         $data["totalPaiement"] = $this->paiement_model->getTotal($resId);
         $data["Backups"] = $this->reservation_model->ReservationBackupListing(
             $resId
         );
         $data["userID"] = $this->vendorId;

         $data["voiture"] = $this->voiture_model->ReservationInfo(
             $data["projectInfo"]->voiture
         );
         $data["photographe"] = $this->photographe_model->ReservationInfo(
             $data["projectInfo"]->photographe
         );
         $data["troupe"] = $this->troupe_model->ReservationInfo($resId);
         $data["prestation"] = $this->prestation_model->ReservationInfo($resId);

         $this->global["pageTitle"] = "CodeInsect : User Listing";
         $this->loadViews("reservation/details", $this->global, $data, null);
     }

     /**
      * This function is used to load the user list
      */
     function recuP($resId)
     {
         $data["projectInfo"] = $this->reservation_model->ReservationInfo(
             $resId
         );
         $data["contratInfo"] = $this->contrat_model->contratInfo($resId);
         $data[
             "paiementInfo"
         ] = $this->paiement_model->paiementListingbyReservation($resId);
         $data["totalPaiement"] = $this->paiement_model->getTotal($resId);

         $this->global["pageTitle"] = "Recu de reservation";
         $this->loadViews("paiement/recu", $this->global, $data, null);
     }

     /**
      * This function is used to load the user list
      */
     function edit($resId)
     {
         $data["salleRecords"] = $this->salle_model->SalleListing();
         $data["projectInfo"] = $this->reservation_model->ReservationInfo(
             $resId
         );
         $data["contratInfo"] = $this->contrat_model->contratInfo($resId);
         $data[
             "paiementInfo"
         ] = $this->paiement_model->paiementListingbyReservation($resId);
         $data["totalPaiement"] = $this->paiement_model->getTotal($resId);

         $this->global["pageTitle"] = "";
         $this->loadViews("reservation/edit", $this->global, $data, $data);
     }

     /**
      * This function is used to load the user list
      */
     function generateContrat($resId)
     {
         $avance = $this->input->post("avance");
         $noteAdmin = $this->input->post("noteAdmin");

         $paiementInfo = [
             "createdDate" => date("Y-m-d H:i:s"),
             "valeur" => $avance,
             "recepteurId" => $this->vendorId,
             "libele" => "Avance",
             "reservationId" => $resId,
         ];

         $avanceId = $this->paiement_model->addNewPaiement($paiementInfo);

         $projectInfo = $this->reservation_model->ReservationInfo($resId);

         $nextyear = date(
             "Y-m-d",
             strtotime($projectInfo->dateDebut . "  - 30  days")
         );

         $contratInfo = [
             "createdDate" => date("Y-m-d H:i:s"),
             "reservationID" => $resId,
             "avanceId" => $avanceId,
             "createdBy" => $this->vendorId,
             "deadline" => $nextyear,
             "statut" => 0,
         ];

         $this->contrat_model->addNewContrat($contratInfo);

         $reservationInfo = [
             "noteAdmin" => $noteAdmin,
             "statut" => 1,
         ];

         $this->reservation_model->editReservation($reservationInfo, $resId);

         $ReservationInfo = $this->reservation_model->ReservationInfo($resId);
         $clientInfo = $this->client_model->getClientInfo(
             $ReservationInfo->clientId
         );

         $myMobile = $clientInfo->mobile;
         $mySms =
             "Salut " .
             $clientInfo->name .
             ", Votre réservation de l'espace (" .
             $ReservationInfo->salle .
             ") pour la date (" .
             $ReservationInfo->dateDebut .
             ") a été enregistrée.";

         echo $this->sendSMS("216" . $myMobile, $mySms);

         redirect("Reservation/view/" . $resId);
     }

     /**
      * This function is used to load the user list
      */
     function addPaiement($resId)
     {
         $avance = $this->input->post("avance");
         $noteAdmin = $this->input->post("noteAdmin");

         $paiementInfo = [
             "createdDate" => date("Y-m-d H:i:s"),
             "valeur" => $avance,
             "recepteurId" => $this->vendorId,
             "libele" => "Partie ",
             "reservationId" => $resId,
         ];
         $ReservationInfo = $this->reservation_model->ReservationInfo($resId);
         $clientInfo = $this->client_model->getClientInfo(
             $ReservationInfo->clientId
         );
         $myMobile = $clientInfo->mobile;
         $mySms =
             "Salut " .
             $clientInfo->name .
             ", une paiement de (" .
             $avance .
             " DT)  pour la reservation N°" .
             $resId .
             " a été effectuée avec succées";

         $this->sendSMS("216" . $myMobile, $mySms);

         $this->paiement_model->addNewPaiement($paiementInfo);

         $totalPaiement = $this->paiement_model->getTotal($resId);
         $projectInfo = $this->reservation_model->ReservationInfo($resId);

         $reservationInfo = [
             "noteAdmin" => $noteAdmin,
             "statut" => 1,
         ];

         $HediMobile = "98552446";
         $mySms =
             $this->name .
             " a réçu (" .
             $avance .
             " DT) pour la reservation de " .
             $ReservationInfo->salle .
             " pour le " .
             $ReservationInfo->dateDebut;
         $this->sendSMS("216" . $HediMobile, $mySms);

         $koussayMobile = "55465244";
         $mySms =
             $this->name .
             " a réçu (" .
             $avance .
             " DT) pour la reservation de " .
             $ReservationInfo->salle .
             " pour le " .
             $ReservationInfo->dateDebut;
         $this->sendSMS("216" . $koussayMobile, $mySms);

         if ($projectInfo->prix - $totalPaiement->valeur == 0) {
             $myMobile = $clientInfo->mobile;
             $mySms =
                 "Bonjour " .
                 $clientInfo->name .
                 ", votre reservation de la salle (" .
                 $ReservationInfo->salle .
                 ") pour le (" .
                 $ReservationInfo->dateDebut .
                 ") a été validée on vous souhaite une belle cérémonie.";

             $this->sendSMS("216" . $myMobile, $mySms);

             $reservationInfo = [
                 "noteAdmin" => $noteAdmin,
                 "statut" => 0,
             ];
         }

         $this->reservation_model->editReservation($reservationInfo, $resId);
         redirect("Reservation/view/" . $resId);
     }

     function checkreservation($dateDebut, $datefin, $heureDebut, $heureFin)
     {
         if (
             $this->reservation_model->checkreservation(
                 $dateDebut,
                 $datefin,
                 $heureDebut,
                 $heureFin
             )
         ) {
             return true;
         }

         return false;
     }

     function http_response($url)
     {
         $ch = curl_init();

         $options = [
             CURLOPT_URL => $url,
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_HEADER => false,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_ENCODING => "",
             CURLOPT_AUTOREFERER => true,
             CURLOPT_CONNECTTIMEOUT => 120,
             CURLOPT_TIMEOUT => 120,
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_SSL_VERIFYPEER => false,
         ];
         curl_setopt_array($ch, $options);
         $response = curl_exec($ch);

         $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

         if ($httpCode != 200) {
             return "Return code is {$httpCode} \n" . curl_error($ch);
         } else {
             //echo "<pre>".htmlspecialchars($response)."</pre>";
             return $response;
         }

         curl_close($ch);
     }

     function sendSMS($myMobile, $mySms)
     {
         $mySender = "Queen park";
         $key =
             "ns1PwxEKAljejzi3RSBAHPsoQl/P9s0jtrXDkRb4j6sjNpzNER8aprZNyzyAuLlteKM222LwbgBRrlBCvFDV4YlQbSvBZMYA/Ye3r0ggsYQ=";

         $Url_str =
             "www.tunisiesms.tn/client/Api/Api.aspx?fct=sms&key=%KEY%&mobile=%MSISDN%&sms=%SMS%&sender=%SENDER%";

         $Url_str = str_replace("%MSISDN%", $myMobile, $Url_str);
         $Url_str = str_replace("%SMS%", urlencode($mySms), $Url_str);
         $Url_str = str_replace("%SENDER%", urlencode($mySender), $Url_str);
         $Url_str = str_replace("%KEY%", urlencode($key), $Url_str);

         echo $this->http_response($Url_str);
     }
 }


?>
