<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */


/**
   send message
 */
if ( ! function_exists('sendMsg'))
{
	function sendMsg($mobile,$content,$type=0){
		if($type==1){//只发验证码
			$content.='【真爱一生网】';
			$uid='55215';
			$pwd='rfkda9';
			if(is_array($mobile)) $mobile=implode(',',$mobile);
		    return sendSMS($uid,$pwd,$mobile,$content);

		}else{
			//$uid = '55220';		//用户账号
			// $pwd = '8p6hri';		//密码
			//SendMsg_gao($mobile,$content);
			$content.='回N退订';
			return sendSMS_mm($mobile,$content);
		}
		//if(is_array($mobile)) $mobile=implode(',',$mobile);
		
		//return
	}
}


//************************************云网***********************************************
/*--------------------------------
功能:HTTP接口 发送短信
修改日期:	2009-04-08
说明:		http://http.yunsms.cn/tx/?uid=用户账号&pwd=MD5位32密码&mobile=号码&content=内容
状态:
	100 发送成功
	101 验证失败
	102 短信不足
	103 操作失败
	104 非法字符
	105 内容过多
	106 号码过多
	107 频率过快
	108 号码内容空
	109 账号冻结
	110 禁止频繁单条发送
	111 系统暂定发送
	112	有错误号码
	113	定时时间不对
	114	账号被锁，10分钟后登录
	115	连接失败
	116 禁止接口发送
	117	绑定IP不正确
	120 系统升级*/

if ( ! function_exists('sendSMS'))
{	
	function sendSMS($uid,$pwd,$mobile,$content,$time='',$mid=''){   
		//验证短信
		//账号55220，密码8p6hri
		//账号55215  密码rfkda9
		//提醒短信

		//$content = urlencode($content);
		$http = 'http://http.yunsms.cn/tx/';
		$data = array
			(
			'uid'=>$uid,					//用户账号
			'pwd'=>strtolower(md5($pwd)),	//MD5位32密码
			'mobile'=>$mobile,				//号码
			'content'=>$content,			//内容 如果对方是utf-8编码，则需转码iconv('gbk','utf-8',$content); 如果是gbk则无需转码
			'time'=>$time,		//定时发送
			'mid'=>$mid						//子扩展号
			);
		$re=postSMS($http,$data); 
		
		return $re;
		/* $re= postSMS($http,$data);			//POST方式提交
		if( trim($re) == '100' )
		{
			return "发送成功!";
		}
		else 
		{
			return "发送失败! 状态：".$re;
		} */ 
	}
}


if ( ! function_exists('postSMS'))
{	
	function postSMS($url,$data=''){
		$row = parse_url($url);
		$host = $row['host'];
		$port = isset($row['port']) ? $row['port']:80;
		$file = $row['path'];
		$post='';
		while (list($k,$v) = each($data)) 
		{
			$post .= rawurlencode($k)."=".rawurlencode($v)."&";	//转URL标准码
		}
		$post = substr( $post , 0 , -1 );
		$post .='&encode=utf8';
		$len = strlen($post);
		$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
		if (!$fp) {
			return "$errstr ($errno)\n";
		} else {
			$receive = '';
			$out = "POST $file HTTP/1.1\r\n";
			$out .= "Host: $host\r\n";
			$out .= "Content-type: application/x-www-form-urlencoded\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Content-Length: $len\r\n\r\n";
			$out .= $post;		
			fwrite($fp, $out);
			while (!feof($fp)) {
				$receive .= fgets($fp, 128);
			}
			fclose($fp);
			$receive = explode("\r\n\r\n",$receive);
			unset($receive[0]);
			return implode("",$receive);
		}
	}
}
//****************************************云网*****************************************************
/* End of file string_helper.php */
/* Location: ./system/helpers/string_helper.php */