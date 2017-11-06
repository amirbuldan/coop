<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_view_transaksi_model extends CI_Model {

    private $table = 'view_transaksi';

    public function v_get($where)
    {
        $data = $this->db->select('*')
            ->from($this->table)
            ->where($where);
        $query = $this->db->get_compiled_select('', FALSE);
        $this->db->order_by('tgl_transaksi','DESC');
        $result = $this->db->get()
            ->result();

        $rek['saldo_awal'] = $this->_getSaldoAwal($query);
        $rek['total_debit'] = $this->_getTotalDebit($query);
        $rek['total_kredit'] = $this->_getTotalKredit($query);
        $rek['saldo_akhir'] = $this->_getSaldoAkhir($query);

        return array($result, $rek);
    }

    public function v_insert($object)
    {
        $r_tbl1 = $this->db->insert( $this->table , $object['table1']);
        $r_tbl2 = $this->db->insert( $this->table , $object['table2']);

        if ($r_tbl1 && $r_tbl2) {
            return true;
        }
        else{
            return false;
        }
    }


    public function _getSaldoAwal($query)
    {
        $this->db->select('saldo_awal', 'saldo_awal')
            ->from("($query ORDER BY tgl_transaksi ASC limit 1) AS T");

        return $this->db->get()
            ->result();
    }

    public function _getTotalDebit($query)
    {
        $this->db->select_sum('jumlah_transaksi', 'total_debit')
            ->from("($query AND jenis='debit') AS T");

        return $this->db->get()
            ->result();
    }

    public function _getTotalKredit($query)
    {
        $this->db->select_sum('jumlah_transaksi', 'total_kredit')
            ->from("($query AND jenis='kredit') AS T");

        return $this->db->get()
            ->result();
    }

    public function _getSaldoAkhir($query)
    {
        $this->db->select('saldo_akhir', 'saldo_akhir')
            ->from("($query ORDER BY tgl_transaksi DESC limit 1) AS T");

        return $this->db->get()
            ->result();
    }


}
