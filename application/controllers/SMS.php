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
    

    public function index()
    {
             $data['smsRecords'] = $this->sms_model->SmsListing();
                    foreach ($data["smsRecords"]  as $record) {
        
                          
                         $this->sendSMS($record->destination , $record->text ) ;
                         $smsInfo = array(
                              'sendDate'=>date('Y-m-d H:i:s') ,
                              'statut'=>0 ,
                            );
                             $this->sms_model->editSms($smsInfo,$record->smsId) ;
                         } 
                         

                  
             $this->global['pageTitle'] = 'SMS';
            $this->load->view("sms/list", $data );            
    }




          
 

        public function http_response($url)
        { 
                echo "Testing URL: " . $url . "<br>";

                $ch = curl_init(); 
                $options = array( 
                    CURLOPT_URL            => $url, 
                    CURLOPT_RETURNTRANSFER => true, 
                    CURLOPT_HEADER         => false, 
                    CURLOPT_FOLLOWLOCATION => false, 
                    CURLOPT_ENCODING       => '', 
                    CURLOPT_AUTOREFERER    => true, 
                    CURLOPT_CONNECTTIMEOUT => 120, 
                    CURLOPT_TIMEOUT        => 120,  
                    CURLOPT_MAXREDIRS      => 10,  
                    CURLOPT_SSL_VERIFYPEER => false, 
                    CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                    CURLOPT_REFERER        => 'https://www.google.com',
                    CURLOPT_HTTPHEADER     => array(
                        'Content-Type: application/json',
                        'Accept: application/json'
                    ),
                    CURLOPT_VERBOSE        => true 
                ); 
                curl_setopt_array($ch, $options);  
                $response = curl_exec($ch); 
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

                if ($httpCode != 200) {
                    echo "Erreur cURL: " . curl_error($ch);
                }

                curl_close($ch);
                echo "HTTP Code: " . $httpCode . "<br>";
                return $httpCode;
        }
            
        
                    
          public function sendSMS($myMobile, $mySms)
            { 
                $mySender = 'Queen park';

                $params = [
                    'fct'    => 'sms',
                    'key'    => 'GuDqqXQAY97z7PP2v9XD4VynAcnYUu/zoxnBn/Y4VNLvuwzVZI/j7eCpkB4DZtoFceCyE/5F5huzCAlvDUb6kNXub5Detypa',
                    'mobile' => $myMobile,
                    'sms'    => $mySms,  // Ne pas ajouter "+", `http_build_query` s'occupe de l'encodage
                    'sender' => $mySender
                ];

                $Url_str = "https://app.tunisiesms.tn/Api/Api.aspx?" . http_build_query($params, '', '&', PHP_QUERY_RFC3986);

                echo $this->http_response($Url_str);
            }


             
 

   
 
}

?>