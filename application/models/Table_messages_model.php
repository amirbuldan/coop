<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_messages_model extends CI_Model {
    public $table = "tbl_messages";

    public function fake_insert($data)
    {
        $cek = $this->db->insert($this->table, $data);
        return $cek;
    }
    public function get_messages($where)
    {
        
        $msg = $this->db->where($where)
            ->order_by('id_message', 'DESC')
            ->get($this->table);
        
        return $msg->result();
    }
}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_messages_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_messages_model/:application/models/${1/(.+)/lTable_messages_model.php/}} */
