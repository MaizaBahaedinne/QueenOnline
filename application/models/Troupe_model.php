<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Troupe_model extends CI_Model
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
        $this->db->select('BaseTbl.* , Pack.nom packname');
        $this->db->from('tbl_reservation_troupe as BaseTbl');
        $this->db->join('tbl_pack_troupe as Pack', 'Pack.packId = BaseTbl.packId ','left');
      
        $this->db->where('BaseTbl.date >=  SUBDATE(NOW(),1) ');
        $this->db->order_by('BaseTbl.date ASC');

 

    

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
        $this->db->insert('tbl_reservation_troupe', $reservationInfo);
        
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
       $this->db->select('BaseTbl.* , Pack.*  , Pack.nom packname , Reservation.* , Salles.nom salle , BaseTbl.prix , BaseTbl.avance');
        $this->db->from('tbl_reservation_troupe as BaseTbl');
        $this->db->join('tbl_pack_troupe as Pack', 'Pack.packId = BaseTbl.packId','left');
         $this->db->join('tbl_reservation as Reservation', 'Reservation.reservationId = BaseTbl.reservationId','left');
          $this->db->join('tbl_salle as Salles', 'Salles.salleID = Reservation.salleId','left');
        
        $this->db->where('BaseTbl.reservationId =',$resId );

        $query = $this->db->get();
        
        return $query->row();
    }


     /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function Packs()
    {
       $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_pack_troupe as BaseTbl');
        $query = $this->db->get();
        
        return $query->result();
    }



        /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editReservation($reservationInfo, $locationId)
    {
        $this->db->where('reservationPId', $locationId);
        $this->db->update('tbl_reservation_troupe', $reservationInfo);
        
        return TRUE;
    }

   

   


}

  