<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_admin_remark extends CI_Model {

    private $tbl_prefix;

    function __construct() {
        parent::__construct();
        $this->tbl_prefix = $this->db->dbprefix;
    }
    
	/**会员上线通知*/
    function callCS($uid){
	    $awoketime = CURTIME+120;
		$time=CURTIME;
		
	    $sql = "INSERT INTO `{$this->tbl_prefix}admin_remark` SET sid='{$uid}',title='会员上线',content='ID:{$uid}会员刚刚通过手机上线,请联系',awoketime='{$awoketime}',dateline='{$time}'";
		
		$this->db->query($sql);
	}
}

?>
