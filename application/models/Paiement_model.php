<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Paiement_model extends CI_Model
{
    
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function paiemenentListing()
    {
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , BaseTbl.reservationId');
        $this->db->from('tbl_paiement as BaseTbl');
        $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationId = Reservation.reservationId','left');

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
    function paiementListingbyReservation($resId)
    {
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , Recepteur.name');
        $this->db->from('tbl_paiement as BaseTbl');
        $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationId = Reservation.reservationId','left');
        $this->db->join('tbl_users Recepteur', 'BaseTbl.recepteurId = Recepteur.userId','left');
        
        $this->db->where('BaseTbl.reservationId = ',$resId);
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
    function paiementListingbyReservationVoiture($resId)
    {
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , Recepteur.name');
        $this->db->from('tbl_paiement_voiture as BaseTbl');
        $this->db->join('tbl_reservation_voiture as Reservation', 'BaseTbl.reservationVId = Reservation.reservationVId','left');
        $this->db->join('tbl_users Recepteur', 'BaseTbl.recepteurId = Recepteur.userId','left');
        
        $this->db->where('BaseTbl.reservationVId = ',$resId);
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
    function addNewPaiement($paiementInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_paiement', $paiementInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }




        /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewVoiturePaiement($paiementInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_paiement_voiture', $paiementInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    



        /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewPhotographePaiement($paiementInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_paiement_photographe', $paiementInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }


    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getTotal($resId = '')
    {
         $this->db->select('sum(valeur) valeur');
        $this->db->from('tbl_paiement as BaseTbl');
        if($resId != null) {
        $this->db->where('BaseTbl.reservationId =',$resId );
        }
        $this->db->where('Year(BaseTbl.createdDate) >= 2022  ');
        $query = $this->db->get();
        
        return $query->row();
    }
    

        /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getVTotal($resId = '')
    {
         $this->db->select('sum(valeur) valeur');
        $this->db->from('tbl_paiement_voiture as BaseTbl');
        if($resId != null) {
        $this->db->where('BaseTbl.reservationVId =',$resId );
        }
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    
    


   

    


}

  