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
    function paiemenentListing($annee = "" )
    {
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , BaseTbl.reservationId , Recepteur.name recuPar , Reservation.dateFin dateRes , Salles.nom espace , Recepteur.avatar , Client.name clientName ');
        $this->db->from('tbl_paiement as BaseTbl');
        $this->db->join('tbl_reservation as Reservation', 'BaseTbl.reservationId = Reservation.reservationId','left');
        $this->db->join('tbl_users Recepteur', 'BaseTbl.recepteurId = Recepteur.userId','left');
        $this->db->join('tbl_users Client', 'Reservation.clientId = Client.userId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = Reservation.salleId','left');

        $this->db->where("YEAR(aseTbl.createdDate) >= ", $annee)  ; 
        $this->db->order_by("BaseTbl.createdDate DESC") ; 


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
    function paiemenentVoitureListing()
    {
        $this->db->select('BaseTbl.paiementId , BaseTbl.createdDate ,  BaseTbl.valeur  , BaseTbl.recepteurId , BaseTbl.libele , BaseTbl.reservationVId reservationId , Recepteur.name recuPar , Reservation.date dateRes , Reservation.voitureName espace , Recepteur.avatar , Client.name clientName ');
        $this->db->from('tbl_paiement_voiture as BaseTbl');
        $this->db->join('tbl_reservation_voiture as Reservation', 'BaseTbl.reservationVId = Reservation.reservationVId','left');
        $this->db->join('tbl_users Recepteur', 'BaseTbl.recepteurId = Recepteur.userId','left');
        $this->db->join('tbl_users Client', 'Reservation.clientId = Client.userId','left');
    

        $this->db->order_by("BaseTbl.createdDate DESC") ; 
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
       $this->db->select('BaseTbl.reservationId , BaseTbl.titre , BaseTbl.type , BaseTbl.prix ,  BaseTbl.dateDebut , DATE_ADD(BaseTbl.dateDebut , INTERVAL -30 DAY) delai  , BaseTbl.heureDebut , BaseTbl.dateFin , BaseTbl.heureFin , BaseTbl.cuisine , BaseTbl.tableCM , BaseTbl.nbPlace , BaseTbl.noteAdmin , BaseTbl.statut , Client.name clientName , Client.mobile , Salles.nom salle');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_users as Client', 'Client.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_users as Locataire', 'Locataire.userId = BaseTbl.clientId','left');
        $this->db->join('tbl_salle as Salles', 'Salles.salleID = BaseTbl.salleId ','left');
       
        $this->db->where('BaseTbl.statut = 1 ');
        
        $this->db->where('BaseTbl.dateDebut >= NOW() ');
        $this->db->where('BaseTbl.dateDebut <= NOW()+INTERVAL 30 DAY ');
        


        $this->db->order_by('BaseTbl.dateDebut ASC');
         
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
    function relanceListing($resId)
    {
       $this->db->select('');
        $this->db->from('tbl_relance as BaseTbl');
        $this->db->where('BaseTbl.reservationId   ' , $resId );

        $this->db->order_by("BaseTbl.createdDTM ASC") ; 

        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }



    function lastrelanceListing($resId)
    {
       $this->db->select('max(createdDTM) createdDTM');
        $this->db->from('tbl_relance as BaseTbl');
        $this->db->where('BaseTbl.reservationId   ' , $resId );

        $query = $this->db->get();
        
        $result = $query->row();        
        return $result;
    }
    
    

     /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewRelance($relanceInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_relance', $relanceInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }




   

   


}

  