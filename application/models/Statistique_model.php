<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Statistique_model extends CI_Model
{
    

     
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function statsParSalleListing()
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('statsSalleParAns as BaseTbl');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }


   


   

   


}

