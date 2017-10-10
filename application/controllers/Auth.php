<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Table_user_model', 'tbl_user');
    }

    public function login()
    {

        // validation
        $this->load->view('login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            // 'password' => $password,
        );

        $chk = $this->tbl_user->get($data);

        if ($this->decrypt($chk[0]->password) == $password) {

            $array = array(
                'username' => $chk[0]->username
            );
            $this->session->set_userdata( $array );
            redirect('','refresh');

        }

        else {
            $this->session->set_flashdata('error', 'Login Gagal');
            redirect('auth/login','refresh');
        }
        // echo "<pre>";
        // var_dump($chk);
        // echo "</pre>";


    }

    public function decrypt($encrypttext)
    {
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            // 'key' => $this->config->item('encryption_key'),
        ));

        return $this->encryption->decrypt($encrypttext);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('','refresh');
    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lAuth.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Auth/:application/controllers/${1/(.+)/lAuth.php/}} */
