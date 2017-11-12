<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_rekening_model', 'tbl_rekening');

        $this->template->title('Setting');
        $this->template->set_partial('navbar', 'partials/navbar');
        $this->template->set_partial('header', 'partials/setting/header');

    }

    public function index()
    {
        $datauser = $this->_get_udata();
        $this->template->set_layout('default');
        $this->template->build('partials/setting/main', array('data' => $datauser));

    }

    public function profil($param = null)
    {
        $datauser = $this->_get_udata();
        $this->template->build('partials/setting/profileForm',
                array(
                    'data' => $datauser,
                    )
                );
    }

    public function password($param = null)
    {
        $datauser = $this->_get_udata();
        $this->template->set_layout('default');
        $this->template->build('partials/setting/passwordForm',
            array(
                    'data' => $datauser,
                    )
            );
    }

    public function updateProfil()
    {
        $userdata = $this->_get_user_data();
        $data = array(
            'update' => array(
                'username' => $this->input->post('username'),
                'id_number' => $this->input->post('id'),
                'alamat' => $this->input->post('address'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'TTL' => $this->input->post('date'),
            ),
            'where' => array(
                'id_user' => $userdata[0]->id_user,
            ),
        );

        $chk = $this->tbl_user->update($data);
        if (!empty($chk)) {
            $this->session->set_flashdata('msg', 'profil berhasil di update');
            redirect('','refresh');
        }

    }

    public function updatePassword()
    {
        $userdata = $this->_get_user_data();

        $old = $this->input->post('oldpassword');
        $new = $this->input->post('newpassword');
        $confnew =  $this->input->post('confirmnewpassword');
        sha256_decrypt( $userdata[0]->password);

        if ($old !== sha256_decrypt($userdata[0]->password)) {
            $this->session->set_flashdata('error', 'password lama anda salah');
            redirect('setting/password','refresh');
        }
        else {
            if ($new !== $confnew) {
                $this->session->set_flashdata('error', 'konfirmasi password tidak cocok');
                redirect('setting/password','refresh');
            }
            else {
                echo "password berhasil diubah";
                $data = array(
                    'update' => array(
                        'password' => sha256_encrypt($new),
                    ),
                    'where' => array(
                        'id_user' => $userdata[0]->id_user,
                    ),
                );

                $chk = $this->tbl_user->update($data);
                if (!empty($chk)) {
                    $this->session->set_flashdata('msg', 'harap login dengan password baru anda');
                    $this->session->keep_flashdata('msg');
                    redirect('auth/logout','refresh');
                }
            }
        }

    }

}
