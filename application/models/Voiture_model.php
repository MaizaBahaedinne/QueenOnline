<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Voiture_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationListing()
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_voiture_location as BaseTbl');
        $this->db->where('BaseTbl.statut in (0,1) ');
        $this->db->where('Year(BaseTbl.dateFin) >= Year(NOW()) ');

    

        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }





    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalenderStatMounth()
    {
        $this->db->select('');
        $this->db->from('statMounth as BaseTbl');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }



        /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalenderStatYear()
    {
        $this->db->select('sum(COUNT) as COUNT , BaseTbl.YEAR');
        $this->db->from('statMounth as BaseTbl');
        $this->db->group_by('YEAR');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


            /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalenderStatSalle()
    {
        $this->db->select('count(*) as COUNT , BaseTbl.salleId , Salles.nom ');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId','left');
        $this->db->group_by('BaseTbl.salleId');
        $this->db->where('BaseTbl.statut IN (1) ');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


                /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalenderStatEmploye()
    {
        $this->db->select('count(userId) as COUNT , BaseTbl.salleId , Locataire.name ');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.locataireId','left');
        
        $this->db->where('BaseTbl.statut IN (1) ');
        $this->db->group_by('BaseTbl.locataireId');
        $this->db->order_by('count(userId) DESC');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalender()
    {
        $this->db->select('   BaseTbl.dateDebut , BaseTbl.heureDebut  ');
        $this->db->from('tbl_reservation as BaseTbl');

    

        $this->db->where('BaseTbl.statut IN (0,1) ');

         
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

  

   
    
     /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function ReservationInfo($resId)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_reservation as BaseTbl');
        
        $this->db->where('BaseTbl.locationId =',$locationId );

        $query = $this->db->get();
        
        return $query->row();
    }




        /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editReservation($reservationInfo, $locationId)
    {
        $this->db->where('locationId', $locationId);
        $this->db->update('tbl_reservation', $reservationInfo);
        
        return TRUE;
    }

   

   


}

  