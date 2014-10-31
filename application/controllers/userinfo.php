<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userinfo extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->lang->load('common');
        $this->load->helper('url');
		$this->load->library('user');
    }
	
	
	public function index()
	{
	    if(!$this->user->isLogged()) header("location:/login/index");
		
		$img_url=$this->config->item('img_url');
		$uid=$this->user->getUid();
		$imgUrl=getThubmImage($img_url,$uid,'medium');
		$imgUrl_com=getThubmImage($img_url,$uid,'com');
		
		
		$user=$this->user->getMemberInfo($uid);
		$user_=$this->user->getInfo('members_login', 'uid', $uid);
		$user +=$user_;

		if($user['images_ischeck']=='1' && $user['mainimg']){
			if(!empty($imgUrl)){
			    $imgUrl=$imgUrl;
			}elseif(!empty($imgUrl_com)){
			    $imgUrl=$imgUrl_com;
			}elseif($user['gender'] == '1'){
			    $imgUrl='public/system/images/woman.gif';
			}else{
           	    $imgUrl='public/system/images/man.gif';
			}
		
		}else{
			if($user['gender'] == '1'){
				$imgUrl="public/system/images/service_nopic_woman.gif";
			}else{
				$imgUrl="public/system/images/service_nopic_man.gif";
			}
		}


		switch($user['s_cid']){
		    case '20':  
		        $level='钻石会员';break;
			case '30':
			    $level='高级会员';break;
			case '10':
			    $level='铂金会员';break;
			default:
				$level='普通会员';break;
		}
		
		$lastvisit= date('Y-m-d H:i',$user['lastvisit']);
		
		$username=$user['username']?sliceStr($user['username'], 16, $dot = ' ...'):$user['nickname'];
		$memberStars=getMemberStars($user['certification']);
		$integrity=$this->user->getIntegrity($uid);
		
		
		$data['imgUrl']   = $imgUrl;
		$data['level']    = $level;
		$data['lastvisit']= $lastvisit;
		$data['username'] = $username;
		$data['uid']      = $uid;
		$data['memberStars']= $memberStars;
		$data['integrity'] = $integrity;
		
		$this->load->view('userinfo',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */