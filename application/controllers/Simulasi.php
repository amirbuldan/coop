<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Table_trans_model', 'tbl_trans');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');

        $this->template->title('Simulasi');
        $this->template->set_partial('navbar','/partials/navbar' );
        $this->template->set_partial('header', '/partials/simulasi/header');

        $this->faker = Faker\Factory::create();
    }

    public function index()
    {
        $this->template->set_layout('default')
            ->build('partials/simulasi/main');
    }

    public function proses_transfer()
    {
        echo $rek_tujuan = $this->input->post('rek_tujuan');
        echo "<br>";
        echo $jumlah_transfer = $this->input->post('jumlah');


        $dUser = $this->_get_user_data();
        
        for ($i=0; $i < 3 ; $i++) {
            $bankAccount[$i] = $this->faker->bankAccountNumber;
        }

        for ($i=0; $i < 1; $i++) {
            $idTrans[$i] = $this->faker->unique()->creditCardNumber;
            // $nom[$i] = $this->faker->randomElement($mn);
            $dataRek = $this->_get_rekening_data($dUser[0]->id_user);
            // $jenis_trans = $this->faker->randomElement(array('kredit','debit'));
            $jenis_trans = "debit";

            $d[$i] = array(
                'id_transaksi' => $idTrans[$i],
                'jenis' => $jenis_trans,
                'jumlah_transaksi' => $jumlah_transfer,
                'tgl_transaksi' => mdate('%Y-%m-%d %H:%i:%s', time())
            );

            $this->tbl_trans->insert_header($d[$i]);
            echo "berhasil insert header"."<br>";
            if ($jenis_trans == 'kredit') {
                $sa = $dataRek[0]->saldo + $jumlah_transfer;
            }
            else {
                $sa = $dataRek[0]->saldo - $jumlah_transfer;
            }
            $ds[$i] = array(
                'id_trans' => $idTrans[$i],
                'rek_asal' => $dataRek[0]->no_rekening ,
                'rek_tujuan' => $rek_tujuan,
                'saldo_awal' => $dataRek[0]->saldo,
                'saldo_akhir' => $sa
            );

            $this->tbl_trans->insert_detail($ds[$i]);
            echo "berhasil insert detail"."<br>";
            //update saldo di table rekening
            $rekUpdate = array('saldo' => $sa );
            $this->tbl_rekening->update('1234567890', $rekUpdate);

            echo "berhasil insert update saldo"."<br>";
            $data = array(
                'id_nasabah' => $dataRek[0]->no_rekening, 
                'id_trans' => $idTrans[$i],
                'jumlah_transfer'=> $jumlah_transfer,
                'tgl_transfer' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'tujuan_transfer' => $rek_tujuan
                );

            $this->_send_message($data);
        }
        redirect('/inbox', 'refresh');
    }

    function _save_data_transfer()
    {
        
    }

    function _send_message($data)
    {

        $isi = "
            <p>m-Transfer</p>
            <p>BERHASIL</p>
            <p>$data[tgl_transfer]</p>
            <p>Ke $data[tujuan_transfer]</p>
            <p>Rp. " .number_format($data['jumlah_transfer'], 2, ',', '.')
            ."</p><p>Berita</p>"."<p>Ref : $data[id_trans]</p>";
        
            $data = array(
                'id_message' => '',
                'id_nasabah' => $data['id_nasabah'],
                'judul' => "m-Transfer",
                'isi' => $isi,
                'created_at' => $data['tgl_transfer']
            );

            $this->tbl_msg->fake_insert($data);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
    }
}
