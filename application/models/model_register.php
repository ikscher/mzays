<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_register extends CI_Model {

    private $tbl_prefix;

    function __construct() {
        parent::__construct();
        $this->tbl_prefix = $this->db->dbprefix;
    }

    /*是否存在已注册的手机号*/
    function isBindedMobile($mobile)
    {
        $sql="select * from {$this->tbl_prefix}members_search  ms  left join {$this->tbl_prefix}members_base mb on ms.uid=mb.uid where ms.telphone={$mobile} or mb.callno={$mobile} limit 1";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

   

}

?>
