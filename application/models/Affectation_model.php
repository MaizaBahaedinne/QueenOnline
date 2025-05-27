<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016 **/

class Affectation_model extends CI_Model
{
    public function getAffectationsByReservation($reservationId)
    {
        $this->db->where('reservationId', $reservationId);
        return $this->db->get('tbl_service_affectation')->result();
    }

    public function deleteAffectationsByReservation($reservationId)
    {
        $this->db->where('reservationId', $reservationId);
        $this->db->delete('tbl_service_affectation');
    }

    public function addAffectation($reservationId, $userId)
    {
        $data = [
            'reservationId' => $reservationId,
            'userId' => $userId,
            'createdDTM' => time(),
            'createdBy' => $this->session->userdata('userId'),
            'isChef' => 0 // Par défaut, non chef
        ];
        $this->db->insert('tbl_service_affectation', $data);
    }
}

