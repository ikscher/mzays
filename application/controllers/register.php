<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->lang->load('common');
        $this->load->helper('url');
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
	
	//注册页面
	public function index()
	{
	    $this->load->model('user');
        $rows=$this->user->getUser();
        $data['result']=$rows;
		$this->load->view('register',$data);
	}
	
	//获取验证码
	public function getAuthCode(){
	    $this->load->helper('sms');
	    $rand = rand(3621,9654);
		$this->input->set_cookie('_rand',$rand,3600);
		$this->input->set_cookie('rand',md5(md5($rand)),3600);
		$mobile = $this->input->get('mobile');

		$time = time();
		$vtime=$this->input->cookie('vtime');
		$time_cookie = isset($vtime)? $vtime: 0;
		if($time - $time_cookie >= 1){
			$this->input->set_cookie('vtime',$time,time()+3600*24*8);
			//sendMsg($mobile,"您的短信验证码：".$rand,1);//手机短信接口
			echo $rand;exit;
		}
	}
	
	
	
	//查询该手机号码 是否被他人验证过
	public function isBindedMobile(){
	    $this->load->model('model_register');
		$mobile = $this->input->get('mobile');
		$mobile_arr = array('13856900659');
		if(in_array($mobile,$mobile_arr)){
			echo 'no';exit;
		}else{
			$r= $this->model_register->isBindedMobile($mobile);
			if($r>0){echo 'yes';exit;}else {echo 'no';exit;}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */