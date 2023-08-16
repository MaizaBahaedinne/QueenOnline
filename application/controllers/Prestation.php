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

class Prestation extends BaseController
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
        $this->load->model("prestation_model");
        $this->load->model("contrat_model");
        $this->load->model("paiement_model");

        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $data["userRecords"] = $this->prestation_model->ReservationListing();
        foreach ($data["userRecords"] as $record) {
            $record->projectInfo = $this->reservation_model->ReservationInfo(
                $record->reservationId
            );
        }
        $this->global["pageTitle"] = "Photographe";
        $this->loadViews("prestation/list", $this->global, $data, null);
    }

    public function addNew($reservationId)
    {
        $data["Packs"] = $this->prestation_model->Packs();
        $data["projectInfo"] = $this->reservation_model->ReservationInfo(
            $reservationId
        );
        $this->global["pageTitle"] = "Clients";
        $this->loadViews("prestation/new", $this->global, $data, null);
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
        $heure = $this->input->post("heure");

        $prix = $this->input->post("prix");
        $avance = $this->input->post("avance");

        $noteAdmin = $this->input->post("noteAdmin");

        $reservationInfo = [
            "packId" => $packId,
            "date" => $date,
            "heure" => $date,

            "prix" => $prix,
            "avance" => $avance,
            "noteAdmin" => $noteAdmin,

            "reservationId" => $reservationId,
            "createdBy" => $this->vendorId,
            "createdDTM" => date("Y-m-d H:i:s"),

            "statut" => 1,
        ];

        $result = $this->prestation_model->addNewReservation($reservationInfo);

        if ($result > 0) {
            $reservationInfo1 = ["photographe" => $result];

            $this->reservation_model->editReservation(
                $reservationInfo1,
                $reservationId
            );

            $paiementInfo = [
                "createdDate" => date("Y-m-d H:i:s"),
                "valeur" => $avance,
                "recepteurId" => $this->vendorId,
                "libele" => "Avance ",
                "reservationPresId" => $result,
            ];
            $resId = $this->paiement_model->addNewPrestationPaiement(
                $paiementInfo
            );

            if ($prix - $avance == 0) {
                $reservationInfoe = [
                    "statut" => 0,
                ];
                $this->prestation_model->editReservation(
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
            redirect("prestation/view/" . $reservationId);
        }
    }

    /**
     * This function is used to load the user list
     */
    function view($resId)
    {
        $data["projectInfo"] = $this->prestation_model->ReservationInfo(
            $resId
        );
        $data["clientInfo"] = $this->user_model->getUserInfo(
            $data["projectInfo"]->clientId
        );
        $data[
            "paiementInfo"
        ] = $this->paiement_model->paiementListingbyReservationPrestation(
            $resId
        );
        $data["totalPaiement"] = $this->paiement_model->getPresTotal($resId);
        $data["userID"] = $this->vendorId;
        $this->global["pageTitle"] = "CodeInsect : User Listing";
        $this->loadViews("prestation/view", $this->global, $data, null);
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
            "reservationPresId" => $resId,
        ];
        $ReservationInfo = $this->prestation_model->ReservationInfo($resId);
        $clientInfo = $this->client_model->getClientInfo(
            $ReservationInfo->clientId
        );

        $this->paiement_model->addNewPrestationPaiement($paiementInfo);

        $totalPaiement = $this->paiement_model->getPTotal($resId);
        $projectInfo = $this->prestation_model->ReservationInfo($resId);

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

        $this->prestation_model->editReservation($reservationInfo, $resId);
        redirect("prestation/view/" . $resId);
    }

    /**
     * This function is used to load the user list
     */
    function recuP($resId)
    {
        $data["projectInfo"] = $this->prestation_model->ReservationInfo(
            $resId
        );
        $data["clientInfo"] = $this->user_model->getUserInfo(
            $data["projectInfo"]->clientId
        );
        $data[
            "paiementInfo"
        ] = $this->paiement_model->paiementListingbyReservationPrestation(
            $resId
        );
        $data["totalPaiement"] = $this->paiement_model->getPTotal($resId);

        $this->global["pageTitle"] = "Recu de reservation";
        $this->loadViews("prestation/recu", $this->global, $data, null);
    }
}

?>
