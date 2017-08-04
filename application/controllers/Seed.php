<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Seed extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Table_transaksi_model', 'tbl_transaksi');
        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');

        $this->faker = Faker\Factory::create();
    }
    public function index()
    {
        echo "hello";
    }

    public function seed_transaksi()
    {
        $mn = ['50000', '100000', '300000', '350000' ,'500000',];
        for ($i=0; $i < 3 ; $i++) {
            $bankAccount[$i] = $this->faker->bankAccountNumber;
        }

        for ($i=0; $i < 100; $i++) {
            $tgl_transaksi[$i] = $this->faker->dateTimeThisMonth;
            $data[$i] = array(
                'id_transaksi' => $this->faker->unique()->creditCardNumber,
                // 'no_rekening_asal' => $this->faker->randomElement($bankAccount) ,
                'no_rekening_asal' => '1234567890' ,
                'no_rekening_tujuan' => $this->faker->bankAccountNumber ,
                'jenis_transaksi' => $this->faker->randomElement(array('kredit','debit')),
                'tanggal_transaksi' => $tgl_transaksi[$i]->format("Y-m-d H:i:s"),
                'jumlah' => $this->faker->randomElement($mn),
            );

            $this->tbl_transaksi->insert($data[$i]);
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // // echo date("d-m-Y" ,strtotime($data[0]['tanggal_transaksi']->date));

    }

    public function reset_auto_increment_id()
    {
        $this->db->query("ALTER TABLE tbl_transaksi auto_increment=0");
    }

    public function seed_message()
    {
        for ($i=0; $i < 15; $i++) {
            $data = array(
                'id_message' => '',
                'id_nasabah' => '1234567890',
                'judul' => $this->faker->sentence(6, true),
                'isi' => $this->faker->text(200, 2),
                'created_at' => $this->faker->dateTimeThisMonth('now')->format("Y-m-d H:i:s"),
            );

            $this->tbl_msg->fake_insert($data);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
        }
    }

    public function seed_user()
    {
        $data = array(
            'id_user' => '',
            'username' => 'amirbuldan',
            'password' => $this->encrypt('amirbuldan'),
            'nama' => 'amir buldan',
            'id_number' => 'USR003',
            'alamat' => 'maxico',
            'email' =>  'amirbuldan@example.com',
            'TTL' => '1985-05-23'
        );

        $chk = $this->tbl_user->insert($data);
        if ($chk) {
            echo "berhasil";
        }
        else {
            echo "gagal";
        }

    }

    public function seed_rekening()
    {
        $data = array(
            'no_rekening' => '00966072497',
            'id_user' => '2',
            'saldo' => 5000000
        );

        $this->tbl_rekening->insert($data);
    }


    public function encrypt($plaintext)
    {
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            // 'key' => $this->config->item('encryption_key'),
        ));

        return $this->encryption->encrypt($plaintext);
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lSeed.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Seed/:application/controllers/${1/(.+)/lSeed.php/}} */
