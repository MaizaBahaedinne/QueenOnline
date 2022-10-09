<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Finance_model extends CI_Model
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
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , BaseTbl.reservationId , Recepteur.name recuPar , Reservation.dateFin dateRes , Salles.nom espace , Recepteur.avatar , Client.name clientName ');
        $this->db->from('tbl_paiement as BaseTbl');
        $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationId = Reservation.reservationId','left');
        $this->db->join('tbl_users Recepteur', 'BaseTbl.recepteurId = Recepteur.userId','left');
        $this->db->join('tbl_users Client', 'Reservation.clientId = Client.userId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = Reservation.salleId','left');

        
        $this->db->order_by("BaseTbl.createdDate DESC") ; 


        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    

    
   

   


}

  