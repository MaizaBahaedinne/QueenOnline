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
 ;
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
                
                $data["salles"] = $this->salle_model->SalleListing();
                
                $this->global["pageTitle"] = "Reservation des salles";
                $this->loadViews("simulation/new", $this->global, $data, null);
        }


        /**
         * This function used to load the first screen of the user
         */
        public function simuler()
        {
                

                $this->global["pageTitle"] = "Reservation des salles";
                $this->loadViews("reservation/list", $this->global, $data, null);
        }





   
}
?>
