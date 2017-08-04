<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_en extends CI_Controller {
    public function index()
    {

    }
    public function tes_encr($name)
    {
        $chip = $this->encrypt($name);
        $plain = $this->decrypt($chip);
        echo $name."\n";
        echo $chip."\n";
        echo $plain ."\n";
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

    public function decrypt($encrypttext)
    {
        $this->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
            // 'key' => $this->config->item('encryption_key'),
        ));

        return $this->encryption->decrypt($encrypttext);
    }


}
/* End of file ${TM_FILENAME:${1/(.+)/lUser_en.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/User_en/:application/controllers/${1/(.+)/lUser_en.php/}} */
