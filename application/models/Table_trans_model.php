<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_trans_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('join_using');
    }

    public function insert_header($data)
    {
        return $this->db->insert('Tbl_headertransaksi', $data);
    }

    public function insert_detail($data)
    {
        return $this->db->insert('Tbl_detailtransaksi', $data);
    }

    public function get_last_ten($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_headertransaksi h');
        $this->db->join('tbl_detailtransaksi d', 'h.id_transaksi = d.id_trans', 'left');
        $this->db->where(array('d.rek_asal' => $where ));
        $this->db->order_by('h.tgl_transaksi', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();

    }

    public function get_all($where)
    {
        $data = $this->db->select('*')
            ->from('tbl_headertransaksi t')
            ->join('tbl_detailtransaksi d', 't.id_transaksi = d.id_trans')
            ->where($where);
        $query = $this->db->get_compiled_select('','FALSE');
        $this->db->order_by('t.tgl_transaksi', 'DESC');
        $result = $this->db->get()
            ->result();
        
        $saldo_awal = $this->get_saldo_awal($query);
        $sum_kredit = $this->get_sum_kredit($query);
        $sum_debit = $this->get_sum_debit($query);
        $saldo_akhir = $this->get_saldo_akhir($query);
        
        return $h = array($result,  $saldo_awal, $sum_debit, $sum_kredit, $saldo_akhir, $query);
    }

    public function get_all_with_sum($no_rekening)
    {
        $query = $this->db->select('*')
            ->from('tbl_headertransaksi h')
            ->join('tbl_detailtransaksi d', 'h.id_transaksi = d.id_trans')
            ->where('d.rek_asal', $no_rekening)
            ->where('h.jenis', 'kredit');
        $sub_query = $this->db->get_compiled_select();
        $this->db->select_sum('t.jumlah_transaksi', 'total_debit')
            ->from("($sub_query) AS T");
            
        return $this->db->get()
            ->result();

        // return $this->db->join('tbl_detailtransaksi', 'tbl_headertransaksi.id_transaksi = tbl_detailtransaksi.id_transaksi');
    }
    public function get_sum_kredit($query)
    {
        
        $this->db->select_sum('t.jumlah_transaksi', 'total_kredit')
            ->from("($query AND t.jenis='kredit') AS T");
            
        return $this->db->get()
            ->result();
    }
    public function get_sum_debit($query)
    {
        $this->db->select_sum('t.jumlah_transaksi', 'total_debit')
            ->from("($query AND t.jenis='debit') AS T");
            
        return $this->db->get()
            ->result();
    }

    public function get_saldo_awal($query)
    {
        $this->db->select('saldo_awal')
            ->from("($query ORDER BY t.tgl_transaksi ASC limit 1) AS T");
            
        return $this->db->get()
            ->result();
    }

    public function get_saldo_akhir($query)
    {
        $this->db->select('saldo_akhir')
            ->from("($query ORDER BY t.tgl_transaksi DESC limit 1) AS T");
            
        return $this->db->get()
            ->result();
    }

    public function sorting_history_transaksi($date)
    {
        if ($date['date_awal'] == null) {
            $this->db->where('tanggal_transaksi <=', DATE($date['date_akhir']) );
        }
        elseif ($date['date_akhir'] == null) {
            $this->db->where('tanggal_transaksi >=', DATE($date['date_awal']) );
        }
        else {
            $this->db->where('tanggal_transaksi >=', DATE($date['date_awal']) );
            $this->db->where('tanggal_transaksi <=', DATE($date['date_akhir']) );
            
            // $this->db->where("tanggal_transaksi BETWEEN $date[date_awal] AND $date[date_akhir]");
        }
        $this->db->order_by('tanggal_transaksi', 'desc');

        return $this->db->get($this->table)->result();
    }

    public function _get_query_select($where)
    {
        $data = $this->db->select('*')
            ->from('tbl_headertransaksi t')
            ->join('tbl_detailtransaksi d', 't.id_transaksi = d.id_trans')
            ->where($where);

        return $query = $this->db->get_compiled_select('','FALSE');
    }

}
