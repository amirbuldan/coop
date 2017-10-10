<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Seed extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Table_transaksi_model', 'tbl_transaksi');
        $this->load->model('Table_user_model', 'tbl_user');
        $this->load->model('Table_messages_model', 'tbl_msg');
        $this->load->model('Table_rekening_model', 'tbl_rekening');
        $this->load->model('Table_trans_model', 'tbl_trans');

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

    public function seeds_trans()
    {
        $dUser = $this->_get_user_data();
		$dataRek = $this->_get_rekening_user($dUser[0]['id_user']);
        $mn = ['50000', '100000', '300000', '350000' ,'500000',];
        
        for ($i=0; $i < 3 ; $i++) {
            $bankAccount[$i] = $this->faker->bankAccountNumber;
        }

        for ($i=0; $i < 3; $i++) {
            $idTrans[$i] = $this->faker->unique()->creditCardNumber;
            $nom[$i] = $this->faker->randomElement($mn);

            $d[$i] = array(
                'id_transaksi' => $idTrans[$i],
                'jenis' => $this->faker->randomElement(array('kredit','debit')),
                'jumlah_transaksi' => $nom[$i],
                // 'tgl_transaksi' => $this->faker->dateTimeThisMonth->format("Y-m-d H:i:s")
                'tgl_transaksi' => mdate('%Y-%m-%d %H:%i:%s', time())
            );

            $this->tbl_trans->insert_header($d[$i]);

            $ds[$i] = array(
                'id_trans' => $idTrans[$i],
                'rek_asal' => '123456789' ,
                'rek_tujuan' => $this->faker->bankAccountNumber ,
                'saldo_awal' => $dataRek[0]->saldo,
                'saldo_akhir' => $dataRek[0]->saldo - $nom[$i],
            );

            $this->tbl_trans->insert_detail($ds[$i]);

            // $tgl_transaksi[$i] = $this->faker->dateTimeThisMonth;
            // $data[$i] = array(
            //     'id_transaksi' => $this->faker->unique()->creditCardNumber,
            //     // 'no_rekening_asal' => $this->faker->randomElement($bankAccount) ,
            //     'no_rekening_asal' => '1234567890' ,
            //     'no_rekening_tujuan' => $this->faker->bankAccountNumber ,
            //     'jenis_transaksi' => $this->faker->randomElement(array('kredit','debit')),
            //     'tanggal_transaksi' => $tgl_transaksi[$i]->format("Y-m-d H:i:s"),
            //     'jumlah' => $this->faker->randomElement($mn),
            // );

            // $this->tbl_transaksi->insert($data[$i]);
        }
    }

    public function seed_trans()
    {
        $dUser = $this->_get_user_data();
		
        $mn = ['50000', '100000', '300000', '350000' ,'500000',];
        
        for ($i=0; $i < 3 ; $i++) {
            $bankAccount[$i] = $this->faker->bankAccountNumber;
        }

        for ($i=0; $i < 1; $i++) {
            $idTrans[$i] = $this->faker->unique()->creditCardNumber;
            $nom[$i] = $this->faker->randomElement($mn);
            $dataRek = $this->_get_rekening_data($dUser[0]->id_user);
            $jenis_trans = $this->faker->randomElement(array('kredit','debit'));

            $d[$i] = array(
                'id_transaksi' => $idTrans[$i],
                'jenis' => $jenis_trans,
                'jumlah_transaksi' => $nom[$i],
                // 'tgl_transaksi' => $this->faker->dateTimeThisMonth->format("Y-m-d H:i:s")
                'tgl_transaksi' => mdate('%Y-%m-%d %H:%i:%s', time())
                // 'tgl_transaksi' => '2017-10-09 13:28:23'
            );

            $this->tbl_trans->insert_header($d[$i]);

            if ($jenis_trans == 'kredit') {
                $sa = $dataRek[0]->saldo + $nom[$i];
            }
            else {
                $sa = $dataRek[0]->saldo - $nom[$i];
            }
            $ds[$i] = array(
                'id_trans' => $idTrans[$i],
                'rek_asal' => '1234567890' ,
                'rek_tujuan' => $this->faker->bankAccountNumber ,
                'saldo_awal' => $dataRek[0]->saldo,
                'saldo_akhir' => $sa
            );

            $this->tbl_trans->insert_detail($ds[$i]);

            //update saldo di table rekening
            $rekUpdate = array('saldo' => $sa );
            $this->tbl_rekening->update('1234567890', $rekUpdate);

            // $tgl_transaksi[$i] = $this->faker->dateTimeThisMonth;
            // $data[$i] = array(
            //     'id_transaksi' => $this->faker->unique()->creditCardNumber,
            //     // 'no_rekening_asal' => $this->faker->randomElement($bankAccount) ,
            //     'no_rekening_asal' => '1234567890' ,
            //     'no_rekening_tujuan' => $this->faker->bankAccountNumber ,
            //     'jenis_transaksi' => $this->faker->randomElement(array('kredit','debit')),
            //     'tanggal_transaksi' => $tgl_transaksi[$i]->format("Y-m-d H:i:s"),
            //     'jumlah' => $this->faker->randomElement($mn),
            // );

            // $this->tbl_transaksi->insert($data[$i]);
        }
    }
    
    public function seed_kredit()
    {
        
    }
    public function seed_debit()
    {
        
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
