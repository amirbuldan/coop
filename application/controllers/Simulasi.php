<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends MY_Controller
{
    private $userData;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Table_trans_model', 'tbl_trans');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');
        $this->load->model('Table_view_transaksi_model', 'tbl_vtransaksi');

        $this->userData = $this->_get_udata();

        $this->template->title('Simulasi');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/simulasi/header');

        $this->faker = Faker\Factory::create();
    }

    public function index()
    {

        $data_user = $this->_get_udata();

        $this->template->set_layout('default')
            ->build('partials/simulasi/main',
                array(
                    'data' => $data_user,
                )
            );
    }

    public function transfer()
    {
        $this->template->set_layout('default')
            ->build('partials/simulasi/transfer',
                array(
                    'data' => $this->_getUserData(),
                )
            );
    }

    public function kredit()
    {
        $this->template->set_layout('default')
            ->build('partials/simulasi/kredit',
                array(
                    'data' => $this->_getUserData(),
                )
            );
    }

    public function proses_kredit()
    {
        $jumlah = $this->input->post('jumlah');
        $user = $this->_getUserData();

        for ($i=0; $i < 1; $i++) {
            $id_transaksi = $this->faker->unique()->creditCardNumber;
            $jenis = 'kredit';
            $jumlah_transaksi = $jumlah;
            $tgl_transaksi  = mdate('%Y-%m-%d %H:%i:%s', time());
            $id_trans = $id_transaksi;
            $rek_asal = $user[0]->no_rekening;
            $rek_tujuan = $user[0]->no_rekening;
            $saldo_awal = $user[0]->saldo;
            $saldo_akhir = ($saldo_awal + $jumlah);
        }

        $d['table1'] = array(
                'id_transaksi' => $id_transaksi,
                'jenis' => $jenis,
                'jumlah_transaksi' => $jumlah_transaksi,
                'tgl_transaksi' => $tgl_transaksi,
            );
        $d['table2'] = array(
                'id_trans' => $id_trans,
                'rek_asal' => $rek_asal,
                'rek_tujuan' => $rek_tujuan,
                'saldo_awal' => $saldo_awal,
                'saldo_akhir' => $saldo_akhir
            );

        $c_insert = $this->tbl_vtransaksi->v_insert($d);

        if ($c_insert) {

            $rekUpdate = array(
                    'saldo' => $saldo_akhir
                );
            $this->tbl_rekening->update($rek_asal, $rekUpdate);

            echo "<script type=\"text/javascript\">";
            echo "window.alert(\"Success!!!!\");";
            echo "window.location.href='". base_url('/history') ."';";
            echo "</script>";
        }
        else{
            echo "gagal ga tau kenapa";
        }
    }

    public function proses_transfer()
    {

        $jumlah = $this->input->post('jumlah');
        $tujuan = $this->input->post('rek_tujuan');
        $user = $this->_getUserData();

        for ($i=0; $i < 1; $i++) {
            $id_transaksi = $this->faker->unique()->creditCardNumber;
            $jenis = 'debit';
            $jumlah_transaksi = $jumlah;
            $tgl_transaksi  = mdate('%Y-%m-%d %H:%i:%s', time());
            $id_trans = $id_transaksi;
            $rek_asal = $user[0]->no_rekening;
            $rek_tujuan = $tujuan;
            $saldo_awal = $user[0]->saldo;
            $saldo_akhir = ($saldo_awal - $jumlah);
        }

        $d['table1'] = array(
                'id_transaksi' => $id_transaksi,
                'jenis' => $jenis,
                'jumlah_transaksi' => $jumlah_transaksi,
                'tgl_transaksi' => $tgl_transaksi,
            );
        $d['table2'] = array(
                'id_trans' => $id_trans,
                'rek_asal' => $rek_asal,
                'rek_tujuan' => $rek_tujuan,
                'saldo_awal' => $saldo_awal,
                'saldo_akhir' => $saldo_akhir
            );

        $c_insert = $this->tbl_vtransaksi->v_insert($d);
        if ($c_insert) {

            $rekUpdate = array(
                    'saldo' => $saldo_akhir
                );
            $this->tbl_rekening->update($rek_asal, $rekUpdate);

            $data = array(
                'id_nasabah' => $user[0]->no_rekening,
                'id_trans' => $id_transaksi,
                'jumlah_transfer'=> $jumlah,
                'tgl_transfer' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'tujuan_transfer' => $rek_tujuan
                );

            $this->_send_message($data);

            echo "<script type=\"text/javascript\">";
            echo "window.alert(\"Success!!!!\");";
            echo "window.location.href='". base_url('/inbox') ."';";
            echo "</script>";
        }
        else{
            echo "gagal ga tau kenapa";
        }
    }

    function _send_message($data)
    {

        $isi = "
            <p>m-Transfer</p>
            <p>BERHASIL</p>
            <p>$data[tgl_transfer]</p>
            <p>Ke $data[tujuan_transfer]</p>
            <p>Rp. " .number_format($data['jumlah_transfer'], 2, ',', '.')
            ."<p>Ref : $data[id_trans]</p>";

            $data = array(
                'id_message' => '',
                'id_nasabah' => $data['id_nasabah'],
                'judul' => "m-Transfer",
                'isi' => $isi,
                'created_at' => $data['tgl_transfer']
            );

            $this->tbl_msg->fake_insert($data);

    }

    public function _getUserData()
    {
        return $this->userData;
    }
}
