<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Table_trans_model', 'tbl_trans');
        $this->load->model('Table_view_transaksi_model', 'tbl_vtransaksi');

        $this->template->title('History');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/history/header');

    }

    public function index()
    {

        $data_user = $this->_get_user_rekening_data();
        $where = array(
            'rek_asal' =>$data_user[0]->no_rekening
            );

        $history = $this->tbl_vtransaksi->v_get($where);
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
            'rek_asal' =>$data_user[0]->no_rekening
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
            $history = $this->tbl_vtransaksi->v_get($where);

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


}
