<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Satisfaction_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function SatisfactionListing()
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_satisfaction as BaseTbl');


        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }





    

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewSatisfaction($satisfactionInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_satisfaction', $satisfactionInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

  

   
    
     /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function ReservationInfo($resId)
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_satisfaction as BaseTbl');      
        $this->db->where('BaseTbl.reservationId =',$resId );
        $query = $this->db->get();    
        return $query->row();
    }


     /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function SatisfactionStatYear($annee = null)
    {
        // Start the query
    $this->db->select('
        AVG(BaseTbl.salle) as avg_salle,
        AVG(BaseTbl.service) as avg_service,
        AVG(BaseTbl.proprete) as avg_proprete,
        AVG(BaseTbl.lumiere) as avg_lumiere,
        AVG(BaseTbl.decoration) as avg_decoration,
        AVG(BaseTbl.photographe) as avg_photographe,
        AVG(BaseTbl.voiture) as avg_voiture,
        AVG(BaseTbl.musicale) as avg_musicale,
        YEAR(Res.dateFin) as YEAR,  
        Salles.nom as salle
    ');
    
    // Join the necessary tables
    $this->db->from('tbl_satisfaction as BaseTbl');
    $this->db->join('tbl_reservation as Res', 'Res.reservationId = BaseTbl.reservationId', 'left');
    $this->db->join('tbl_salle as Salles', 'Salles.salleID = Res.salleId', 'left');
    
    
    // Apply grouping correctly
    $this->db->group_by('Salles.nom, YEAR(Res.dateFin)');  
    
    // Apply the year filter if $annee is not null
    
        $this->db->where('YEAR(Res.dateFin)', 2025);  
    
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


   

   


}

  