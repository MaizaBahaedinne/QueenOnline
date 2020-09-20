<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Client_model extends CI_Model
{
    
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function clientListing()
    {
        $this->db->select('BaseTbl.userId , BaseTbl.email ,  BaseTbl.nom  , BaseTbl.raisonSocial , BaseTbl.prenom , BaseTbl.cin , BaseTbl.ville  , BaseTbl.mobile,BaseTbl.mobile2, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->where('BaseTbl.roleId =',4 );
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }


    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkClientExists($cin)
    {
        $this->db->select("cin");
        $this->db->from("tbl_users");
        $this->db->where("cin =", $cin);   
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewClient($clientInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $clientInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getClientInfo($clientID)
    {
         $this->db->select('*');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        //$this->db->where('BaseTbl.roleId =',4 );
        $this->db->where('BaseTbl.userId =',$clientID );
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editClient($clientInfo, $clientId)
    {
        $this->db->where('userId', $clientId);
        $this->db->update('tbl_users', $clientInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($clientId, $clientInfo)
    {
        $this->db->where('userId', $clientId);
        $this->db->update('tbl_users', $clientInfo);
        
        return $this->db->affected_rows();
    }


   

    


}

  