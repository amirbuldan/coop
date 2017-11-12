<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Table_view_transaksi_model', 'tbl_vtransaksi');

        $this->template->title('History');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/history/header');

    }

    public function index()
    {
        $data_user = $this->_get_udata();
        $where = array(
            'rek_asal' =>$data_user[0]->no_rekening
            );
        $history = $this->tbl_vtransaksi->v_get($where);
        $this->template->set_layout('default')
            ->build('/partials/history/main',
                array(
                    'data' =>  $data_user,
                    'history' => $history
                    )
                );

    }


    public function sort()
    {
        $data_user = $this->_get_udata();
        $where = array(
            'rek_asal' =>$data_user[0]->no_rekening
            );

        if($_GET['ts'] == null && $_GET['te'] == null) {
            redirect(base_url('history'));
        }
        else {
            $date = array(
                'date_awal' => $_GET['ts'],
                'date_akhir' => $_GET['te']
                );

            if ($date['date_awal'] == null) {
                $where['DATE(tgl_transaksi) <='] = $date['date_akhir'];
            }
            elseif ($date['date_akhir'] == null) {
                $where['DATE(tgl_transaksi) >='] = $date['date_awal'];
            }
            else {
                $where['DATE(tgl_transaksi) >='] = $date['date_awal'];
                $where['DATE(tgl_transaksi) <='] = $date['date_akhir'];
            }
            $history = $this->tbl_vtransaksi->v_get($where);

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
