<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Prestation_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationListing($resId = null )
    {
        $this->db->select('BaseTbl.* , Pack.nom packname , BaseTbl.statut PresStatut ');
        $this->db->from('tbl_reservation_prestation as BaseTbl');
        $this->db->join('tbl_pack_prestation as Pack', 'Pack.packId = BaseTbl.packId','left');
        
        if($resId != null ){ $this->db->where('BaseTbl.reservationId ', $resId ); }

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
        $this->db->insert('tbl_reservation_prestation', $reservationInfo);
        
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
       $this->db->select('BaseTbl.* , Pack.*  , Pack.nom packname , BaseTbl.statut PresStatut , Reservation.* , Salles.nom salle , BaseTbl.prix , BaseTbl.avance');
        $this->db->from('tbl_reservation_prestation as BaseTbl');
        $this->db->join('tbl_pack_prestation as Pack', 'Pack.packId = BaseTbl.packId','left');
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
    function ReservationInfoS($resId)
    {
       $this->db->select('BaseTbl.* , Pack.*  , Pack.nom packname , BaseTbl.statut PresStatut , Reservation.* , Salles.nom salle , BaseTbl.prix , BaseTbl.avance');
        $this->db->from('tbl_reservation_prestation as BaseTbl');
        $this->db->join('tbl_pack_prestation as Pack', 'Pack.packId = BaseTbl.packId','left');
         $this->db->join('tbl_reservation as Reservation', 'Reservation.reservationId = BaseTbl.reservationId','left');
          $this->db->join('tbl_salle as Salles', 'Salles.salleID = Reservation.salleId','left');
        
        $this->db->where('BaseTbl.prestationId =',$resId );

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
        $this->db->from('tbl_pack_prestation as BaseTbl');
        $this->db->order_by('BaseTbl.nom ASC');
        $query = $this->db->get();
        
        return $query->result();
    }

     /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function Pack($packId)
    {
       $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_pack_prestation as BaseTbl');
        $this->db->order_by('BaseTbl.nom ASC');

        $this->db->where('BaseTbl.packId =',$packId );
        
        $query = $this->db->get();
        
         return $query->row();
    }

        /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewPrestatiare($PrestatiareInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_pack_prestation', $PrestatiareInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }


       /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editPrestatiare($PrestatiareInfo, $prestationId)
    {
        $this->db->where('packId', $prestationId);
        $this->db->update('tbl_pack_prestation', $PrestatiareInfo);
        
        return TRUE;
    }


         /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function PacksReservation($packId)
    {
       $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_reservation_prestation as BaseTbl');
       
        $this->db->where('BaseTbl.packId =',$packId );
        $query = $this->db->get();
        
        return $query->result();
    }





        /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editReservation($reservationInfo, $prestationId)
    {
        $this->db->where('prestationId', $prestationId);
        $this->db->update('tbl_reservation_prestation', $reservationInfo);
        
        return TRUE;
    }



         /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function ClassementPacksReservation($year , $type)
    {
       $this->db->select('BaseTbl.prestationId , Pack.* , Pack.nom packname  , count(BaseTbl.prestationId) countRes ');
        $this->db->from('tbl_reservation_prestation as BaseTbl');
        $this->db->join('tbl_pack_prestation as Pack', 'Pack.packId = BaseTbl.packId','left');
       

        $this->db->where('YEAR(BaseTbl.date) = ',$year );
        $this->db->where('Pack.type = ',$type );

        $this->db->limit('3');
        $this->db->group_by('BaseTbl.packId ' );
        $this->db->order_by('countRes DESC');
        $query = $this->db->get();
        
        return $query->result();
    }
   

   


}

  