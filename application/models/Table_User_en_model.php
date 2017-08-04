<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_User_en_model extends CI_Model {
    public $tbl = "tbl_user_en";
    public function seed_insert($data)
    {
        $cek = $this->db->insert($this->tbl, $data);
        return $cek;
    }
    public function seed_select($where)
    {
        $data = $this->db->get_where($this->tbl, $where);
        return $data->result();
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_User_en_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_User_en_model/:application/models/${1/(.+)/lTable_User_en_model.php/}} */
