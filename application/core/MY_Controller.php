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

        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');
        $this->load->model('Table_view_user_model', 'tbl_vuser');
        $this->load->helper('sha256_helper');
    }

    public function _get_user_data()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
        );
        $userdata = $this->tbl_user->get($data);
        return $userdata;
    }

    public function _get_rekening_data($id_user)
    {
        $where = array(
            'id_user' => $id_user,
        );
        return $this->tbl_rekening->get_rekening_user($where);
    }

    public function _get_udata()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
        );
        return $this->tbl_vuser->get($data);
    }

}
