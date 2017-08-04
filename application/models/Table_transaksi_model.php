<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_transaksi_model extends CI_Model {
    public $table = "tbl_transaksi";
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get_last_transaksi($where)
    {
        $this->db->where($where);
        $this->db->order_by('tanggal_transaksi', 'DESC');
        $data = $this->db->get($this->table, 10);
        return $data->result_array();

    }

    public function get_transaksi($where)
    {
        $this->db->where($where);
        $data = $this->db->get($this->table);
        return $data->result();
    }

    public function history_transaksi()
    {
        $this->db->select('tbl_rekening r');
        $this->db->join('tbl_transaksi t', 't.no_rekening_asal = r.no_rekening', 'left');
        $this->db->join('tbl_user u', 'u.id_user = r.id_user', 'left');
        $this->db->where('r.no_rekening', $id);
        $query = $this->db->get();

        return $query->result();

    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_transaksi_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_transaksi_model/:application/models/${1/(.+)/lTable_transaksi_model.php/}} */
