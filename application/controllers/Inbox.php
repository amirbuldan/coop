<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Inbox extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Table_messages_model', 'tbl_msg');

        $this->template->title('Inbox');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/inbox/header' );
    }

    public function index()
    {
        $data_user = $this->_get_user_rekening_data();

        $data_msg = $this->i_get_inbox($data_user[0]->no_rekening);
        // echo "<pre>";
        // var_dump($data_msg);
        // echo "</pre>";
        // $this->load->view('inbox', array('msg' => $data_msg,));
        $this->template->set_layout('default')
            ->build('partials/inbox/main', 
                array(
                    'msg' => $data_msg, 
                    'data' => $data_user,
                    )
                );
    }


    public function i_get_inbox($id_nasabah)
    {
        $where = array(
            'id_nasabah' => $id_nasabah,
        );
        $data = $this->tbl_msg->get_messages($where);
        return $data;
    }
}
