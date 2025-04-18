<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Sms_model extends CI_Model
{
    
     function SmsListing()
    {
        $this->db->select('   BaseTbl.* ');
        $this->db->from('tbl_sms as BaseTbl');

        $this->db->where('BaseTbl.statut = ',1);
        $this->db->limit(30);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


            /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editSms($smsInfo, $smsId)
    {
        $this->db->where('smsId', $smsId);
        $this->db->update('tbl_sms', $smsInfo);
        
        return TRUE;
    }
  
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewSms($smsInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_sms', $smsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    


}

  