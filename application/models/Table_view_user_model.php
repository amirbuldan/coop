<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Table_view_user_model extends CI_Model {
    private $table = 'view_user';

    public function get($where)
    {
        return $this->db->where($where)
            ->get($this->table)
            ->result();
    }

}
/* End of file ${TM_FILENAME:${1/(.+)/lTable_view_user_model.php/}} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Table_view_user_model/:application/models/${1/(.+)/lTable_view_user_model.php/}} */
