<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('sha256')) {
    function sha256_encrypt($plaintext)
    {
        $CI =& get_instance();
        $CI->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
        ));

        return $CI->encryption->encrypt($plaintext);
    }
    function sha256_decrypt($encrypttext)
    {
        $CI =& get_instance();
        $CI->encryption->initialize(array(
            'chiper' => 'aes-256',
            'mode' => 'ctr',
        ));

        return $CI->encryption->decrypt($encrypttext);
    }

}
