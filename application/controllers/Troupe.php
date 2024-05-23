<?php if (!defined("BASEPATH")) {
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

class Troupe extends BaseController
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
        $this->load->model("troupe_model");
        $this->load->model("contrat_model");
        $this->load->model("paiement_model");

        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $data["userRecords"] = $this->troupe_model->ReservationListing();
        foreach ($data["userRecords"] as $record) {
            $record->projectInfo = $this->reservation_model->ReservationInfo(
                $record->reservationId
            );
        }
        $this->global["pageTitle"] = "Troupe Lahmedi";
        $this->loadViews("troupe/list", $this->global, $data, null);
    }

    public function addNew($reservationId)
    {
        $data["Artistes"] = $this->troupe_model->Artists();
        $data["Packs"] = $this->troupe_model->Ar();
        $data["projectInfo"] = $this->reservation_model->ReservationInfo(
            $reservationId
        );
        $this->global["pageTitle"] = "Clients";
        $this->loadViews("troupe/new", $this->global, $data, null);
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewReservationL()
    {
        $clientId = $this->input->post("clientId");
        $reservationId = $this->input->post("reservationId");

        $packId = $this->input->post("packId");
        $date = $this->input->post("date");
        

        $prix = $this->input->post("prix");
        $avance = $this->input->post("avance");

        $noteAdmin = $this->input->post("noteAdmin");

        $reservationInfo = [
            "packId" => $packId,
            "date" => $date,
            

            "prix" => $prix,
            "avance" => $avance,
            "noteAdmin" => $noteAdmin,

            "reservationId" => $reservationId,
            "createdBy" => $this->vendorId,
            "createdDTM" => date("Y-m-d H:i:s"),

            "statut" => 1,
        ];

        $result = $this->troupe_model->addNewReservation($reservationInfo);

        if ($result > 0) {
            $reservationInfo1 = array("Troupe" => $result, 'noteAdmin' => 'Ajout de Troupe'); ;

            $this->reservation_model->editReservation(
                $reservationInfo1,
                $reservationId ,
                $this->vendorId
            );


            $koussayMobile = "55465244";
                $mySms = $this->name . " a reservé le troupe pour le ".$date ;
                $this->sendSMS("216" . $koussayMobile, $mySms);
                

                $HaythemMobile = "54419959";
                $mySms = $this->name . " a reservé le troupe pour le ".$date ;
                $this->sendSMS("216" . $HaythemMobile, $mySms);


                $HatemMobile = "92888625";
                $mySms =  "Une nouvelle reservation pour le ".$date ;
                $this->sendSMS("216" . $HatemMobile, $mySms);

            $paiementInfo = [
                "createdDate" => date("Y-m-d H:i:s"),
                "valeur" => $avance,
                "recepteurId" => $this->vendorId,
                "libele" => "Avance ",
                "reservationTroupeId" => $result,
            ];
            $resId = $this->paiement_model->addNewTroupePaiement(
                $paiementInfo
            );

            if ($prix - $avance == 0) {
                $reservationInfoe = [
                    "statut" => 0,
                ];
                $this->troupe_model->editReservation(
                    $reservationInfoe,
                    $result
                );
            }

            $this->session->set_flashdata(
                "success",
                "Reservation mise à jour avec succées "
            );

            redirect("Reservation/view/" . $reservationId);
        } else {
            $this->session->set_flashdata("error", "Problème de mise à jours");
            redirect("troupe/view/" . $reservationId);
        }
    }

    /**
     * This function is used to load the user list
     */
    function view($resId)
    {
        $data["projectInfo"] = $this->troupe_model->ReservationInfo( $resId );
        $data["clientInfo"] = $this->user_model->getUserInfo( $data["projectInfo"]->clientId);
        $data["paiementInfo"] = $this->paiement_model->paiementListingbyReservationTroupe($resId);
        $data["totalPaiement"] = $this->paiement_model->getTTotal($resId);
        $data["userID"] = $this->vendorId;
        $this->global["pageTitle"] = "CodeInsect : User Listing";
        $this->loadViews("troupe/view", $this->global, $data, null);
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
            "reservationTroupeId" => $resId,
        ];
        $ReservationInfo = $this->troupe_model->ReservationInfo($resId);
        $clientInfo = $this->client_model->getClientInfo($ReservationInfo->clientId);

        $this->paiement_model->addNewTroupePaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getTTotal($resId);
        $projectInfo = $this->troupe_model->ReservationInfo($resId);

        $reservationInfo = [
            "noteAdmin" => $noteAdmin,
            "statut" => 1,
        ];

        if ($projectInfo->prix - $totalPaiement->valeur == 0) {
            $reservationInfo = [
                "noteAdmin" => $noteAdmin,
                "statut" => 0,
            ];
        }

        $this->troupe_model->editReservation($reservationInfo, $resId);
        redirect("troupe/view/" . $resId);
    }

    /**
     * This function is used to load the user list
     */
    function recuP($resId)
    {
        $data["projectInfo"] = $this->troupe_model->ReservationInfo(
            $resId
        );
        $data["clientInfo"] = $this->user_model->getUserInfo(
            $data["projectInfo"]->clientId
        );
        $data[
            "paiementInfo"
        ] = $this->paiement_model->paiementListingbyReservationTroupe(
            $resId
        );
        $data["totalPaiement"] = $this->paiement_model->getTTotal($resId);

        $this->global["pageTitle"] = "Recu de reservation du troupe lahmedi";
        $this->loadViews("troupe/recu", $this->global, $data, null);
    }

         function deleteReservation($resId)
        {
                $reservationInfo = [ "statut" => 3];
                $result = $this->troupe_model->editReservation($reservationInfo, $resId);
                if ($result) {
                        $this->session->set_flashdata("success", "Reservation a été annulée ");
                        redirect("Troupe/view/" . $resId);
                } else {
                        $this->session->set_flashdata("error", "Problème de mise à jours");
                        redirect("Troupe/view/" . $resId);
                }
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
                $key = "ns1PwxEKAljejzi3RSBAHPsoQl/P9s0jtrXDkRb4j6sjNpzNER8aprZNyzyAuLlteKM222LwbgBRrlBCvFDV4YlQbSvBZMYA/Ye3r0ggsYQ=";
                $Url_str = "www.tunisiesms.tn/client/Api/Api.aspx?fct=sms&key=%KEY%&mobile=%MSISDN%&sms=%SMS%&sender=%SENDER%";
                $Url_str = str_replace("%MSISDN%", $myMobile, $Url_str);
                $Url_str = str_replace("%SMS%", urlencode($mySms), $Url_str);
                $Url_str = str_replace("%SENDER%", urlencode($mySender), $Url_str);
                $Url_str = str_replace("%KEY%", urlencode($key), $Url_str);
                echo $this->http_response($Url_str);
        }



}



?>
