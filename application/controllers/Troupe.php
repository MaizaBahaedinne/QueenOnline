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
        $this->load->model("Sms_model");

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
        $data["Packs"] = $this->troupe_model->Packs();
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
        $Chanteurs = json_encode($this->input->post("Chanteurs"));
        
        $date = $this->input->post("date");
        

        $prix = $this->input->post("prix");
        $avance = $this->input->post("avance");

        $noteAdmin = $this->input->post("noteAdmin");

        $reservationInfo = [
            "packId" => $packId,
            "chanteurs" => $Chanteurs , 
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
        $data["projectInfo"] = $this->troupe_model->ReservationInfo( $result );

        if ($result > 0) {
            $reservationInfo1 = array("Troupe" => $result, 'noteAdmin' => 'Ajout de Troupe'); ;

            $this->reservation_model->editReservation(
                $reservationInfo1,
                $reservationId ,
                $this->vendorId
            );




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

                $mySms = $data["projectInfo"]->packname. " + ".$Chanteurs." pour le ".$date ; 

                $koussayMobile = "55465244";
                $HaythemMobile = "54419959";
                $HatemMobile = "92888625";


               $this->sendSMS("216" . $HatemMobile, $mySms , "Notif Troupe");
                
                $mySms = "[NEW]"."[TROUPE] ".$this->name." a recu pour ".$avance."DT pour le ".$date ;
               $this->sendSMS("216" . $HaythemMobile, $mySms , "Notif admin Troupe");    
               $this->sendSMS("216" . $koussayMobile, $mySms , "Notif admin Troupe" );
     

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
        $HaythemMobile = "54419959";
        $this->sendSMS("216" . $HaythemMobile, "(TROUPE) paiement de ".$avance." par ".$this->name." pour ".$resId , "Notif admin Troupe"); 

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


      

        function sendSMS($myMobile, $mySms , $type )
        {
            $smsInfo = array('destination'=>$myMobile,
                              'text' => $mySms,
                              'type' => $type,
                              'createdBy'=>$this->vendorId,
                              'createdDtm'=>date('Y-m-d H:i:s') ,
                              'statut'=>1 ,

                            );
            $this->Sms_model->addNewSms($smsInfo) ; 

        }



}



?>
