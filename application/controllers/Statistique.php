 <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Statistique extends BaseController
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
        $this->load->model('finance_model');
        $this->load->model('statistique_model');
        $this->load->model('satisfaction_model');
        
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
            $data['stats'] = $this->statistique_model->statsParSalleListing();
            

            $this->global['pageTitle'] = 'Statistique par salles';
            $this->loadViews("stats/salles", $this->global, $data, NULL);
    }


    /**
     * This function used to load the first screen of the user
     */
    public function satisfacton()
    {
            $data['satisfactionSalle'] = $this->satisfaction_model->SatisfactionStatYear();
            

            $this->global['pageTitle'] = 'Satisfaction';
            $this->loadViews("satisfaction/dashboard", $this->global, $data, NULL);
    }





        






   
 
}

?>