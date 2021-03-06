<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_user_model extends CI_Model {

    public $table = "tbl_user";
    public function get($where)
    {
        if ($where) {
            $this->db->where($where);
            $data = $this->db->get($this->table);
        }
        else {
            $data = $this->db->get($this->table);
        }
        return $data->result();
    }

    public function insert($data)
    {
        $chk = $this->db->insert($this->table, $data);
        return $chk;
    }

    function update($data)
    {
        $chk = $this->db->update($this->table, $data['update'], $data['where']);
        return $chk;
    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_user_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_user_model/:application/models/${1/(.+)/lTable_user_model.php/}} */
