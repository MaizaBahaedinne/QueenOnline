<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Relance_model extends CI_Model
{


   public function getLastRelance($reservationId)
    {
        return $this->db->select('createdDTM')
            ->from('tbl_relance')
            ->where('reservationId', $reservationId)
            ->order_by('createdDTM', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }

    public function addRelance($reservationId, $userId)
    {
        $this->db->insert('tbl_relance', [
            'reservationId' => $reservationId,
            'createdDTM' => date('Y-m-d H:i:s'),
            'createdBy' => $userId,
        ]);
    }


}

  