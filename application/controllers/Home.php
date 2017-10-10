<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller {

    private $rotations = 0;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Table_trans_model', 'tbl_trans');
        if (empty($this->session->userdata('username'))) {
            redirect('auth/login','refresh');
        }

        $this->template->title('Home');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/home/header');

    }
    public function index()
    {
        $data_user = $this->_get_user_rekening_data();
        $history = $this->h_get_last_trans();
        $this->template->set_layout('default')
            ->build('/partials/home/main', array(
                        'data' => $data_user,
                        'trans' => $history
                        )
                    );
    }

    /***
        function untuk mengambil 10 data transaksi terakhir
    */
    public function h_get_last_trans()
    {
        $data = $this->_get_user_rekening_data();
        return $this->tbl_trans->get_last_ten($data[0]->no_rekening);   
    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lHome.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Home/:application/controllers/${1/(.+)/lHome.php/}} */
