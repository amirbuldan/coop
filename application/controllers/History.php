<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Table_trans_model', 'tbl_trans');

        $this->template->title('History');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/history/header');
        
    }

    public function index()
    {      
        
        $data_user = $this->_get_user_rekening_data();
        $where = array(
            'd.rek_asal' =>$data_user[0]->no_rekening
            );
        $history = $this->h_get_all_trans($where);
        // echo "<pre>";
        // print_r($history);
        // echo "</pre>";
        $this->template->set_layout('default')
            ->build('/partials/history/main', 
                array(
                    'data' =>  $data_user,
                    'history' => $history
                    )
                );
    
    }

    /***
    * function untuk mengambil semua data transaksi
    * @params $where berisi no_rekening
    * @return mengembalikan data history transaksi dalam bentuk object 
    */
    public function h_get_all_trans($where)
    {
        $data = $this->tbl_trans->get_all($where);
        return $data;
    }

    public function sort()
    {
        $data_user = $this->_get_user_rekening_data();
        $where = array(
            'd.rek_asal' =>$data_user[0]->no_rekening
            );
            
        if($_GET['ts'] == null && $_GET['te'] == null) {
            redirect(base_url('history'));
        }
        else {
            echo $_GET['ts'];
            echo $_GET['te'];   

            $date = array(
                'date_awal' => $_GET['ts'], 
                'date_akhir' => $_GET['te']
                );

            if ($date['date_awal'] == null) {
                // $where = array(
                //     'tanggal_transaksi <=' => DATE($date['date_akhir'])
                //     );
                $where['DATE(tgl_transaksi) <='] = $date['date_akhir'];
            }
            elseif ($date['date_akhir'] == null) {
                // $where = array(
                //     'tanggal_transaksi >=' => DATE($date['date_awal'])
                //     );
                $where['DATE(tgl_transaksi) >='] = $date['date_awal'];
            }
            else {
                // $where = array(
                //     'tanggal_transaksi >=', DATE($date['date_awal']),
                //     'tanggal_transaksi <=', DATE($date['date_akhir'])
                //     );
                $where['DATE(tgl_transaksi) >='] = $date['date_awal'];
                $where['DATE(tgl_transaksi) <='] = $date['date_akhir'];
            }
            // $val = $this->tbl_trans->_get_query_select($where);
            $history = $this->tbl_trans->get_all($where);
            
            echo "<pre>";
            print_r($history);
            echo "</pre>";

            $this->template->set_layout('default')
            ->build('/partials/history/main', 
                array(
                    'data' =>  $data_user,
                    'history' => $history
                    )
                );
        }
        
    }

    public function _get_data_hitory($startDate, $endDate)
    {
        // algoritma
        /***
        
        1. check apakah parameter ts dan te kosong.
            1.1. jika kosong tampilkan data history default.
        2. check apakah parameter dalam format data. untuk mencegah user memasukkan parameter manual
           2.1. jika ya. maka tampilakan data berdasarkan range date.
           2.2. jika tidak. tampilkan default data.

        */

        
        // check apakah parameter kosong
        if($startDate == null && $endDate == null) {
            // tampilkan semua data history
            // memanggil function get_all_hostory
        }
        elseif ($startDate !== null && $endDate == null) {
                
        }
            
        elseif ($startDate == null && $endDate !== null) {
            
        }
    }


    public function test_get_query()
    {
        $data_user = $this->_get_user_rekening_data();
        $where = array(
            'd.rek_asal' =>$data_user[0]->no_rekening
            );
        echo $this->tbl_trans->_get_query_select($where);
    }
}
