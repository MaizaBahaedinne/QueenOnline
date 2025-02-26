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




          
function sendSMS($myMobile, $mySms)
{ 
    $mySender = 'Queen park';
    $myDate = '26/02/2025';
    $myTime = '19:28';

    $Url_str ="https://app.tunisiesms.tn/Api/Api.aspx?fct=sms&key=MYKEY&mobile=XXXXXXXX&sms=Hello+World&sender=YYYYYYY&date=jj/mm/aaaa&heure=hh:mm:ss";
                                    
    $Url_str = str_replace("XXXXXXXX",$myMobile,$Url_str);
    $Url_str = str_replace("Hello+World",$mySms,$Url_str);
    $Url_str = str_replace("YYYYYYY",$mySender,$Url_str);
    $Url_str = str_replace("jj/mm/aaaa",myDate,$Url_str);
    $Url_str = str_replace("hh:mm:ss",myTime,$Url_str);
                                    
    echo http_response($Url_str);
}

function http_response($url)
{ 
   $ch = curl_init(); 
   $options = array( 
   CURLOPT_URL            =--> $url , 
   CURLOPT_RETURNTRANSFER => true, 
   CURLOPT_HEADER         => false, 
   CURLOPT_FOLLOWLOCATION => true, 
   CURLOPT_ENCODING       => '', 
   CURLOPT_AUTOREFERER    => true, 
   CURLOPT_CONNECTTIMEOUT => 120, 
   CURLOPT_TIMEOUT        => 120,  
   CURLOPT_MAXREDIRS      => 10,  
   CURLOPT_SSL_VERIFYPEER => false, 
   ); 
   curl_setopt_array( $ch, $options );  
   $response = curl_exec($ch); 
   $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
   if ( $httpCode != 200 ) 
   { 
   return 'Return code is {$httpCode}' 
   .curl_error($ch); 
   } 
    else  
   { 
   return $response; 
    } 
   curl_close($ch);
}
            ?>
        
                    


             
 

   
 
}

?>