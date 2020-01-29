<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Salle_model extends CI_Model
{
    
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function SalleListing()
    {
        $this->db->select('BaseTbl.salleID , BaseTbl.nom , BaseTbl.type, BaseTbl.capacité  , BaseTbl.etat , BaseTbl.Prix ');
        $this->db->from('tbl_salle as BaseTbl');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewReservation($reservationInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_reservation', $reservationInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
   
    
    



   

    


}

  