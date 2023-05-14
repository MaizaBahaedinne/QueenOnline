 <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class Finance extends BaseController
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
        
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentListing();
            

            $this->global['pageTitle'] = 'User Listing';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }



    /**
     * This function used to load the first screen of the user
     */
    public function relance()
    {
            $data['financeRecords'] = $this->finance_model->paiemenentListing();
            

            $this->global['pageTitle'] = 'User Listing';
            $this->loadViews("finance/view", $this->global, $data, NULL);
    }






   
 
}

?>