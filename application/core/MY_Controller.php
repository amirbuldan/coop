<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('username'))) {
            redirect('auth/login','refresh');
        }

        $this->load->model('Table_transaksi_model', 'tbl_transaksi');
        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');
    }

    public function _encrypt($plaintext)
    {
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            // 'key' => $this->config->item('encryption_key'),
        ));

        return $this->encryption->encrypt($plaintext);
    }

    public function _decrypt($encrypttext)
    {
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            // 'key' => $this->config->item('encryption_key'),
        ));

        return $this->encryption->decrypt($encrypttext);
    }

    public function _get_user_data()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
        );
        $userdata = $this->tbl_user->get($data);
        return $userdata;
    }

    public function _get_rekening_data($id)
    {
        $where = array(
            'id_user' => $id,
        );

        return $this->tbl_rekening->get_rekening_user($where);
    }

    public function _get_user_rekening_data()
    {
        $data_user = $this->_get_user_data();
        return $this->tbl_user->get_r_rekening($data_user[0]->id_user);
    }

}

