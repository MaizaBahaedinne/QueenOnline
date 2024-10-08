<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */

class SMS extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
                $this->load->model('sms_model');
       
        
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
             $data['smsRecords'] = $this->sms_model->SmsListing();

               $koussayMobile = "55465244";

                $mySms = "CECI EST UN TEST DE JOB";
                
               
                // $this->sendSMS("216" . $koussayMobile, $mySms); 

            
            $this->global['pageTitle'] = 'SMS';
         //   $this->loadViews("sms/list", $this->global, $data, NULL);
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