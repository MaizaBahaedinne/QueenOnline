<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Contrat_model extends CI_Model
{
    
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function contratListing()
    {
        $this->db->select('BaseTbl.contratID , BaseTbl.reservationID ,  BaseTbl.avanceId  , BaseTbl.createdDate , BaseTbl.createdBy ,  BaseTbl.deadline , Client.name clientName , Locataire.name locataireName , Reservation.titre ');
        $this->db->from('tbl_contrat as BaseTbl');
         $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationID = Reservation.reservationid','left');
         $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.createdBy','left');
         $this->db->join('tbl_users as Client', 'Client.userId = Reservation.clientId','left');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

 
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewContrat($contratInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_contrat', $contratInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    
  /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function contratInfo($resId)
    {
       $this->db->select('BaseTbl.contratID , BaseTbl.reservationID  , BaseTbl.createdDate , BaseTbl.createdBy ,  BaseTbl.deadline , Client.name clientName , Locataire.name locataireName , 
           Reservation.titre , Reservation.dateDebut , Reservation.heureDebut , Reservation.dateFin , Reservation.heureFin , Reservation.type, Reservation.prix, Salles.nom salle , Avance.valeur avance , Reservation.nbPlace , Reservation.reservationId , Reservation.voiture , Reservation.troupe , Reservation.cuisine , Reservation.photographe

            Client.nom , Client.prenom , Client.cin , Client.dateCin , Client.n , Client.rue  , Client.ville  , Client.codePostal ,

             ');
        $this->db->from('tbl_contrat as BaseTbl');
        $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationID = Reservation.reservationid','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.createdBy','left');
        $this->db->join('tbl_users as Client', 'Client.userId = Reservation.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = Reservation.salleId','left');
        $this->db->join('tbl_paiement as Avance', 'Avance.paiementId = BaseTbl.avanceId','left');
        $this->db->where('BaseTbl.reservationID =',$resId );

        $query = $this->db->get();
        
        return $query->row();
    }

   



}

  