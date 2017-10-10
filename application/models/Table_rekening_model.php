<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_rekening_model extends CI_Model {

    public function get_with_profil($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        $this->db->join('tbl_user', 'tbl_rekening.id_user = tbl_user.id_user');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.no_rekening_asal = tbl_rekening.no_rekening');
        $this->db->where($where);
        $this->db->order_by('tbl_transaksi.tanggal_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_rekening_user($iduser)
    {
        $this->db->where($iduser);
        $data = $this->db->get('tbl_rekening');
        return $data->result();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_rekening', $data);
    }

    public function update($noRek, $data)
    {
        $this->db->where('no_rekening', $noRek) ;
        $this->db->update('tbl_rekening', $data);
    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_rekening_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_rekening_model/:application/models/${1/(.+)/lTable_rekening_model.php/}} */
