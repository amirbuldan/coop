<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    private $rotations = 0;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_rekening_model', 'tbl_rekening');
        $this->load->model('Table_transaksi_model', 'tbl_transaksi');
        $this->load->model('Table_messages_model', 'tbl_msg');
        if (empty($this->session->userdata('username'))) {
            redirect('auth/login','refresh');
        }

    }
    public function index()
    {
        $data = $this->_get_rekening_with_profil();
        $lastTrans = $this->_get_last_user_trans();
        $this->load->view('home', array('data' => $data, 'trans'=> $lastTrans));
    }

    public function history()
    {
        $data = $this->_get_rekening_with_profil();
        // $dataTrans = $this->tbl_transaksi->get_transaksi();
        $this->load->view('history', array('data' => $data,));
    }

    public function inbox()
    {
        $user_data = $user = $this->_get_user_data();
        $rek_data = $this->_get_rekening_user($user_data[0]['id_user']);

        // echo "<pre>";
        // var_dump($rek_data[0]->no_rekening);
        // echo "</pre>";

        // echo $tes->no_rekening;
        $data_msg = $this->_get_inbox($rek_data[0]->no_rekening);
        // echo "<pre>";
        // var_dump($data_msg);
        // echo "</pre>";
        $this->load->view('inbox', array('msg' => $data_msg,));
    }

    public function settings($param = null)
    {
        $usr_data = $this->_get_user_data();

        if ($param == null) {
            $this->load->view('settings');
        }
        else if ($param == 'profil') {
            $this->load->view('settings/ChangeProfil', array('userdata' => $usr_data, ));
        }
        else if ($param == 'password') {
            $this->load->view('settings/ChangePassword');
        }
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
                'id_user' => $userdata[0]['id_user'],
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

        if ($old !== $userdata[0]['password']) {
            $this->session->set_flashdata('error', 'password lama anda salah');
            redirect('settings/password','refresh');
        }
        else {
            if ($new !== $confnew) {
                $this->session->set_flashdata('error', 'konfirmasi password tidak cocok');
                redirect('settings/password','refresh');
            }
            else {
                echo "password berhasil diubah";
                $data = array(
                    'update' => array(
                        'password' => $new,
                    ),
                    'where' => array(
                        'id_user' => $userdata[0]['id_user'],
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



    public function _get_user_data()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
        );
        $userdata = $this->tbl_user->get($data);
        return $userdata;
    }

    public function _get_rekening_user($id)
    {
        $where = array(
            'id_user' => $id,
        );

        return $this->tbl_rekening->get_rekening_user($where);
    }

    public function _get_rekening_with_profil()
    {
        $userdata = $this->_get_user_data();
        $where = array(
            'tbl_user.id_user' => $userdata[0]['id_user'],
        );
        $data = $this->tbl_rekening->get_with_profil($where);
        return $data;
    }

    public function _get_last_user_trans()
    {
        $userRek = $this->_get_rekening_with_profil();

        $where = array(
            'no_rekening_asal' => $userRek[0]->no_rekening,
        );
        $data = $this->tbl_transaksi->get_last_transaksi($where);

        return $data;
    }

    public function _get_transaksi()
    {
        // $userdata = $this->_get_user_data();
        // $where = array(
        //     '' => ,
        // );
    }

    public function _get_history_trans()
    {
        $this->tbl_transaksi->history_transaksi();
    }

    public function _get_inbox($id_nasabah)
    {
        $where = array(
            'id_nasabah' => $id_nasabah,
        );
        $data = $this->tbl_msg->get_messages($where);
        return $data;
    }

    public function tes_sha($name)
    {
        $key = bin2hex($this->encryption->create_key(32));
        $keybin = hex2bin($key);
        // echo $keybin;
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            'key' => $keybin
        ));

        $chipertext = $this->encryption->encrypt($name);
        echo $chipertext."\n \n";

        $plaintext = $this->encryption->decrypt($chipertext);
        echo $plaintext."\n \n";

    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lHome.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Home/:application/controllers/${1/(.+)/lHome.php/}} */
