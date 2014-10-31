<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  会员信息
 */

class CI_User {
    private $auth;
	private $userid;
    private $username;
    private $db;
	private $password;
    private $session;
    private $cookie;
    private $tbl_prefix;
  

    public function __construct() {
        global $COOKIE,$IN;
        $CI = & get_instance();
        //$CI->load->database();//因为没有在autoload.php中自动加载数据库，所以这步需要写上
        $this->db = &$CI->db;
        //$CI->load->library('session');
        $this->session = &$CI->session;
        $this->cookie = &$COOKIE;
        $this->input=&$IN;
        $this->tbl_prefix=$this->db->dbprefix;
      
        $auth=$this->input->cookie('auth');
        
        $this->auth = $this->cookie->AuthCode(isset($auth)? $auth : '', 'DECODE');
        
		
	    if(!empty($this->auth)){
		    $arr=explode("\t",$this->auth);
			list($this->userid,$this->password)=$arr;
		}

    }


    public function logout() {
        //unset($this->session->data['userid']);
        if($this->input->cookie['auth']) $this->cookie->SetCookie("auth","",-24*3600);
        $this->cookie->SetCookie('last_login_time',"",-86400); 
		$this->cookie->SetCookie('username',$username,-1200);
        $this->auth = null;
		$this->userid=null;
    }
	
	
	public function isLogged() {
        return $this->userid;
    }

    public function getUid() {
        return $this->userid;
    }

	
	
	/**
	 * 从表里获取内容
	 * @Author:
	 * param $table string 表名 不带前缀
	 * param $fieldname string 字段名
	 * param $fieldvalue string 字段值
	 * param $getfield string 你要获取的字段值 字段间用半角逗号分开， 仅对未开启memcahe缓存时可用
	 * return $arr  array()
	 */
	public function getInfo($table, $fieldname, $fieldvalue, $getfield=''){
	    global $CI;
		$data = array();
		//$CI = & get_instance();
		$CI->load->driver('cache', array('adapter' =>'memcached'));
		if ($CI->cache->memcached->is_supported()){
			$data = $this->getTableInfo($table, $fieldname, $fieldvalue);	
		}else{
			$getfield = $getfield ? $getfield : '*';		
			$query = $this->db->query("SELECT {$getfield} FROM {$this->tbl_prefix}{$table} WHERE {$fieldname}='{$fieldvalue}' limit 1");
			$data=$query->row_array();
		}
		
		return $data;
		
	}
	
	
	/**
	 * 从cache获取内容
	 * @Author:
	 * param $table string 表
	 * param $key string 条件
	 * param $field string 字段
	 * return $arr  array()
	 */
	public function getTableInfo($table,$field,$key) {
	    global $CI;
	    //$CI = & get_instance();
	    $CI->load->driver('cache', array('adapter' =>'memcached'));
		$value = $CI->cache->get($table.$field.$key);
		if(empty($value)){
		   $query = $this->db->query("SELECT * FROM {$this->tbl_prefix}{$table} WHERE {$field}='{$key}'  LIMIT 1");
		   $arr=$query->row_array();
		   $CI->cache->save($table.$field.$key,serialize($arr));
		}else{
		   $arr = unserialize($value);
		
		   if(!$arr){
				$query = $this->db->query("SELECT * FROM {$this->tbl_prefix}{$table} WHERE {$field}='{$key}'  LIMIT 1");
				$arr=$query->row_array();
				$CI->cache->save($table.$field.$key,serialize($arr));
				$value = $CI->cache->get($table.$field.$key);
				$arr = unserialize($value);     	
		   }
		}
		return $arr;
    }
	
	
	
	/**
	 * 从表web_members_search和web_members_base里的表里获取内容
	 * @Author:
	 * param $uid int 字段 用户id值
	 * param $getfield string 你要获取的字段值 单一字段 
	 * return $arr  array()/string 如果设置了getfield字段,将返回字段值，不设置将返回所有数据
	 */
	public function getMemberInfo($uid, $getfield=False){
		global $CI;
		if(!$uid) return array();
		static $member_all = array();
		if(isset($member_all[$uid])){
			if($getfield){
				return isset($member_all[$uid][$getfield]) ? $member_all[$uid][$getfield] : NULL; 
			}else{
				return $member_all[$uid];
			}
		}	
		
		//$CI = & get_instance();
	    $CI->load->driver('cache', array('adapter' =>'memcached'));
		
		if ($CI->cache->memcached->is_supported()){

			$member_all[$uid] = $this->getTableInfo('members_search','uid',$uid);		
			if($member_base = $this->getTableInfo('members_base','uid',$uid)){
				$member_all[$uid] = array_merge($member_all[$uid], $member_base);
			}
				 
			$query = $this->db->query("select s_cid from {$this->tbl_prefix}members_search where uid={$uid} limit 1");
			$r=$query->row_array();
			if(isset($r['s_cid'])) $member_all[$uid]['s_cid'] = $r['s_cid'];
			
		}else{
		
			$query= $this->db->query("select * from {$this->tbl_prefix}members_search where uid={$uid} limit 1");
			$member_all[$uid] =$query->row_array();
			$query_ = $this->db->query("select * from  {$this->tbl_prefix}members_base where uid={$uid} limit 1");
			if($query_->num_rows>0){
				$member_all[$uid] = array_merge($member_all[$uid], $query_->row_array());
			}
			
		}
		
		if($getfield) return isset($member_all[$uid][$getfield]) ? $member_all[$uid][$getfield] : NULL;
		
		
		return $member_all[$uid];
		
	}
	
	//获得会员的资料完整度 
	public function getIntegrity($uid){
		$member_info_all = $this->getMemberInfo($uid);
		$member_info_all['birthyear']=$member_info_all['birthmonth']=$member_info_all['birthday']='';
		if(!empty($member_info_all['birth']) && strlen($member_info_all['birth'])==10){
		   list($member_info_all['birthyear'],$member_info_all['birthmonth'],$member_info_all['birthday']) = explode('-',$member_info_all['birth']);
		}
		$info_array=array('nickname','telphone','gender','birthyear','birthmonth','birthday','province','city','marriage','education','salary','house','children','height','oldsex','mainimg','truename','nature','weight','body','animalyear','constellation','bloodtype','hometownprovince','hometowncity','nation','religion','finishschool','family','language','smoking','drinking','occupation','vehicle','corptype','wantchildren','fondfood','fondplace','fondactivity','fondsport','fondmusic','fondprogram','blacklist','qq','msn','currentprovince','currentcity','friendprovince');
		$i = 0;
		foreach($info_array as $v){
			if($member_info_all[$v]){
				$i++;
			}
		}
		//return ($i/48);
		return $i;

	}
	
	
	/**
	 * @Author:
	 * param $table string 表
	 * param $key string 条件
	 * param $field string 字段
	 * param $upvalue array() 字段
	 * return $return int  1:set 2:replace
	 */
	function updateTableCache($table,$field,$key,$upvalue="") {
	    global $CI;
		if(empty($upvalue)){
				$query = $this->db->query("SELECT * FROM {$this->tbl_prefix}{$table} WHERE {$field}='{$key}'  LIMIT 1");
				$fbvalue=$query->row_array();
				if( $CI->cache->memcached->get($table.$field.$key) ){
				  
					$CI->cache->memcached->set($table.$field.$key,serialize($fbvalue));
					$return = 2;
				}else{
					
					$CI->cache->memcached->set($table.$field.$key,serialize($fbvalue));
					$return = 1;
				}
		}else{
			   
				if(!( $fbvalue = unserialize($CI->cache->memcached->get($table.$field.$key)) ) ){
					$query = $this->db->query("SELECT * FROM {$this->tbl_prefix}{$table} WHERE {$field}='{$key}'  LIMIT 1");
					$fbvalue=$query->row_array();
					$return = 1;
				}else{
					$return = 2;
				} 
			
				foreach($upvalue as $upkey => $val){
					$fbvalue[$upkey] = $val;
				}
				
				
				if($return == 2){
					$CI->cache->memcached->set($table.$field.$key,serialize($fbvalue));  
									
				}
				if($return == 1){
					$CI->cache->memcached->set($table.$field.$key,serialize($fbvalue));               
				}           
		}
		
		return $return;
	}

   
    

}

?>