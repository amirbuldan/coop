<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('join_using')) {
    function join_using($table, $key) 
    {
        $CI =& get_instance();
        $join = 'JOIN '. $table .' USING (`'. $key .'`)';
        return $CI->db->qb_join[] = $join;
    }
}
