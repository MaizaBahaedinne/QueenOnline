<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Reservation_model extends CI_Model
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
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId','left');
        $this->db->where('BaseTbl.dateFin > NOW() ');

    

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
    function ReservationCalenderStat()
    {
        $this->db->select('count(BaseTbl.reservationId) number , sum(BaseTbl.prix) prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut  ');
        $this->db->from('tbl_reservation as BaseTbl');

        $this->db->group_by(' MONTH(BaseTbl.dateDebut) DESC');
        $this->db->where('YEAR(BaseTbl.dateDebut) = YEAR(NOW()) ');
        $this->db->where('BaseTbl.statut IN (0,1) ');

         
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
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function ReservationCalenderElilaErsi()
    {
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId ','left');
        $this->db->where('BaseTbl.salleId =','1');
        $this->db->where('BaseTbl.statut IN (0,1) ');
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
    function ReservationCalenderFarhetElAMOR()
    {
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId ','left');
        $this->db->where('BaseTbl.salleId =','2');
        $this->db->where('BaseTbl.statut IN (0,1) ');
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
    function ReservationCalenderLayalina()
    {
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId ','left');
        $this->db->where('BaseTbl.salleId =','3');
        $this->db->where('BaseTbl.statut IN (0,1) ');
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
    function ReservationCalenderSoltanaR()
    {
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId ','left');
        $this->db->where('BaseTbl.salleId =','4');
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

        
    function checkreservation($dateDebut,$datefin,$heureDebut,$heureFin,$salleID){
        $this->db->select("dateDebut , dateFin");
        $this->db->from("tbl_reservation");
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId','left');
        $this->db->where("dateDebut BETWEEN ".$dateDebut." AND ".$dateFin);
        $this->db->where("dateFin BETWEEN ".$dateDebut." AND ".$dateFin);
        $this->db->where("heureDebut BETWEEN ".$heureDebut." AND ".$heureFin);
        $this->db->where("heureFin BETWEEN ".$heureDebut." AND ".$heureFin);   
        $this->db->where("tbl_reservation.statut = 0 or tbl_reservation.statut = 1 ",'');
        $this->db->where("tbl_reservation.statut = 0 or tbl_reservation.statut = 1 ",'');
        $this->db->where("Salles.salleID = ",$salleID );


        
        $query = $this->db->get();

        return $query->result();

    }


   
    
     /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function ReservationInfo($resId)
    {
        $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.salleID , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId','left');
        $this->db->where('BaseTbl.reservationId =',$resId );

        $query = $this->db->get();
        
        return $query->row();
    }




        /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editReservation($reservationInfo, $reservationId)
    {
        $this->db->where('reservationId', $reservationId);
        $this->db->update('tbl_reservation', $reservationInfo);
        
        return TRUE;
    }

   

    


}

  