<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_login extends CI_Model {

    private $tbl_prefix;

    function __construct() {
        parent::__construct();
        $this->tbl_prefix = $this->db->dbprefix;
    }

    /*通过QQ号取用户信息*/
    function getUserByQQ($username)
    {
        $sql="SELECT uid from `{$this->tbl_prefix}members_base` where qq='{$username}' limit 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
	
	/*通过条件获取会员信息*/
	function getUserInfo($where){
	    $sql="SELECT uid from `{$this->tbl_prefix}members_search` where {$where} limit 1";
		$query = $this->db->query($sql);
        return $query->row_array();
	}
	
	/*更新登录时间和登录次数*/
    function updateLoginTime($uid,$ip){
	    /*
		$updatesqlarr = array(
			'lastip' => $ip,
			'lastvisit'=> CURTIME
		);
		$wheresqlarr = array(
			'uid' => $uid
		);
		$sql=$this->db->update_string("members_login",$updatesqlarr,$wheresqlarr);
		$this->db->query($sql);
		*/
	    $time=CURTIME;
		$sql="select login_meb from {$this->tbl_prefix}members_login where uid='{$uid}'";
		$query = $this->db->query($sql);
		$row=$query->row_array();
		if($query->num_rows()<=0){
	        $sql="insert into `{$this->tbl_prefix}members_login` set uid='{$uid}',last_login_time = '{$time}',login_meb = 1,lastvisit='{$time}',lastip='{$ip}'";
		}else{
    		$sql="update `{$this->tbl_prefix}members_login` set lastip='{$ip}',last_login_time = '{$time}',login_meb = login_meb+1,lastvisit='{$time}' where uid = '{$uid}'";
		}
	    return $this->db->query($sql);//更新最后登录时间
	}
	
	/*记录本次登录和上次登录的IP，以及最新登录网站的时间*/
	function saveLoginInfo($uid,$ip){
	    $lastactive=CURTIME;
	    $sql = "SELECT last_ip,finally_ip FROM {$this->tbl_prefix}member_admininfo WHERE uid='{$uid}'";
		$q_ = $this->db->query($sql);
		$row=$q_->row_array();
		if($q_->num_rows()>0){
			$sql_ip = "UPDATE {$this->tbl_prefix}member_admininfo SET last_ip='{$row['finally_ip']}',finally_ip='{$ip}',real_lastvisit='{$lastactive}' WHERE uid='{$uid}'";
		}else{
			$sql_ip = "INSERT INTO {$this->tbl_prefix}member_admininfo SET finally_ip='{$ip}',uid='{$uid}',real_lastvisit='{$lastactive}'";
		}
		$this->db->query($sql_ip);
	  
	}
   

}

?>
