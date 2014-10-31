<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->lang->load('common');
        $this->load->helper('url');
		$this->load->library('user');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function index()
	{
	    if($this->user->isLogged()) header("location:/userinfo/index");
		$this->load->view('login');
	}
	
	//用户登录系统判定
	public function me(){
	    $username=$this->input->get('name');
	    $password=$this->input->get('password');
		$username = trim($username);
		$autologin=$this->input->get('autologin');
		$md5_password = md5($password);
        
		//登录后跳转的页面
		$returnurl = $this->input->get('returnurl');
	
	
		$userid = 0;
		$sp = searchApi('members_man members_women');
		$limit = array(0, 1);
		//note 验证用户名，密码     enky

        $this->load->model('model_login');
		$this->load->model('model_admin_remark');
		if(is_numeric($username)){
			if(strlen($username)==11){
				//判断手机号是否存在
				$filter = array();
				$filter[] = array('telphone', $username);
				if($sp->getResultOfReset($filter, $limit)){
					$ids = $sp->getIds();
					if(isset($ids[0])) $userid = $ids[0];
				}
			}

			if(!$userid){
				//判断uid是否存在
				$filter = array();
				$filter[] = array('@id', $username);
				if($sp->getResultOfReset($filter, $limit)){
					$ids = $sp->getIds();
					if(isset($ids[0])) $userid = $ids[0];
				}
			}

			if(!$userid){
			    
				$resultQQ=$this->model_login->getUserByQQ($username);
			    $userid = isset($resultQQ['uid'])?$resultQQ['uid']:'';
			}
	
		}else{

			$filter = array();
			$filter[] = array('username', $username);
			if($sp->getResultOfReset($filter, $limit)){
				$ids = $sp->getIds();
				if(isset($ids[0])) $userid = $ids[0];
			}
			
		}
		
	
		//note 用户名找不到
		if(!$userid) {
			$login_where = is_numeric($username) ? "uid='{$username}' or telphone='{$username}'" : "username='{$username}'";
			$user_=$this->model_login->getUserInfo($login_where);
	      
			if($user_){
				$userid = $user_['uid'];
			}else{
				//note 转至邮箱验证页
				if($returnurl){
					//exit("errorUid,/login/index");
					show_error('用户名不存在',200,'系统提示','/home/index');
				}
			}
		}
		
		
		//获取
		
		$user = array_merge($this->user->getInfo('members_login', 'uid', $userid), $this->user->getMemberInfo($userid));
     
		if($user['is_lock']!='1'){
			//exit("很抱歉您的用户名已经被锁定！<br>请联系真爱一生网客服：<b>400-8787-920</b>");
			//exit("locked,/login/index");
			show_error('很抱歉您的用户名已经被锁定！<br>请联系真爱一生网客服：<b>400-8787-920</b>',200,'系统提示','/login/index');
		}
		//note 用户密码错误
		if($user['uid'] && $user['password'] != $md5_password) {
		    show_error('输入的密码错误',200,'系统提示','/login/index');
		}

		//note 验证通过
		if($user['uid'] && $user['password'] == $md5_password) {
            
		    $ip = GetIP();

			if($user['automatic']==1){
			    $this->cookie->SetCookie("auth", $this->cookie->AuthCode("$user[uid]\t$user[password]", 'ENCODE'), 24 * 3600*30);
			}else{
			    $this->cookie->SetCookie("auth", $this->cookie->AuthCode("$user[uid]\t$user[password]", 'ENCODE'), 24 * 3600);
			}
            
			//note 更新用户的最近登录ip和最近登录时间
			$this->model_login->updateLoginTime($user['uid'],$ip);

			$this->cookie->SetCookie('last_login_time', CURTIME,86400);
           
			//note 客服提醒
			if($user['is_awoke'] == '1'){
				$this->model_admin_remark->callCS($user['uid']);
			}
	
			//note 记住用户名
			if($autologin == 1){
				$this->cookie->SetCookie('username',$username,CURTIME+3600);
			}else{
				$this->cookie->SetCookie('username',$username,-1200);
			}

			$uid = $user['uid'];

			
			//更新缓存
			$this->load->driver('cache', array('adapter' =>'memcached'));
			if ($this->cache->memcached->is_supported()){
				$val = array();
				$val['lastip'] = $ip;
				$val['last_login_time']= $time;
				$val['lastvisit']=$time;
				$this->user->updateTableCache('members_login','uid',$uid, $val);//!!
			}


			//记录本次登录ip及上次的ip,及真实的最后访问时间
			$this->model_login->saveLoginInfo($user['uid'],$ip);

			header("location:/userinfo/index");
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */