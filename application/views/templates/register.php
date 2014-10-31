<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="utf-8">
	<title>注册</title>
	<meta content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" name="viewport">
	<!-- Standard iPhone -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/touch-icon-iphone-114.png');?>" />
	<!-- Retina iPhone -->
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/images/touch-icon-iphone-114.png');?>" />
	<!-- Standard iPad -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/images/touch-icon-ipad-144.png');?>" />
	<!-- Retina iPad -->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/images/touch-icon-ipad-144.png');?>" />
    
    <link rel="stylesheet" href="<?php echo base_url('assets/javascript/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/javascript/jquery.mobile-1.4.2/jquery-1.8.3.min.js'); ?>" ></script>
    <script type="text/javascript" src="<?php echo base_url('assets/javascript/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js'); ?>" ></script>
	
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon"/>
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon">
	<script>
			
	</script>
</head>
<body>
<div data-role="page" id="home">
	<div data-role="header">
	    <a href="/home/index"    class="ui-btn-left ui-btn ui-icon-home ui-btn-icon-notext ui-shadow ui-corner-all" role="button"></a>
    	<h1 class="ui-title" role="heading" aria-level="1">注册</h1>
    </div>

	<div data-role='content'>
		<form action="" method="POST" name="reg_form">
		<div class="bt50">
			<ul>
				<li class="mb15"><span class="name">用户名</span><input type="text"   id="mobile" name="mobile" data-role="none" placeholder="请输入手机号"  maxLength="11"  value="13856900659" /></li>
				<li class="w_180"><span class="name">验证码</span><input type="text" style="width:110px;"  data-role="none" name="authcode" id="authcode" value="" placeholder="请输入验证码"  maxLength="4"/>		<!--点击获取按钮-->
				<a href="javascript:void(0);" class="getcode pa" id="getAuthCode" >点击获取</a>
				</li>
			</ul>
			<a  href="javascript:void(0);" id="nextstep" data-role="button">下一步</a>
			
			
			<dl class="clearfix">
				<dt class="f12 fl">【提示】</dt>
				<dd class="f12 fl w_240">真爱一生网会发送一条验证码到时您的手机，以验证手机的有效性，该条短信免费。</dd>
			</dl>
		</div>
		<input type="hidden" name="pin" value=""><input type="hidden" name="v" value="6">
		</form>
    </div>
    

	<div data-role="footer">
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
    </div>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/register.css'); ?>" type="text/css" />
	
	<a  id="popupError" href="#warning" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline h" data-transition="pop"></a>
	<div data-role="popup" id="warning"><p>您输入的手机号码有误，请重新输入。</p></div>
	
		
	<script type="text/javascript">
	//判断手机号是否正确
	function isMobile(mobile){
		 var reg = /^((1[345]\d{9})|(18[0-9]\d{8}))$/;
		 var flag=false;
		 if (reg.test(mobile)) flag=true;
		 return flag;
	}

	var authcode_;
	function checkForm(){
		var mobile=$('#mobile').val();
		if(!isMobile(mobile)) {  var errorMsg='您输入的手机号码有误，请重新输入。';$('#warning p').html(errorMsg); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click'); return false;}

		var authcode=$('#authcode').val();
		if(!authcode || authcode.length!=4 ||  (typeof authcode_=='undefined') || (typeof authcode_!='undefined' && authcode!=authcode_)) {  var errorMsg='您输入的验证码有误，请重新输入。';$('#warning p').html(errorMsg); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click');  return false;}
	}


	$('#nextstep').on('click',function(){
		if(checkForm()){authcode_=null;}
	});

	$('#getAuthCode').on('click',function(){
		var mobile=$('#mobile').val();
		if(!isMobile(mobile)) {  var errorMsg='您输入的手机号码有误，请重新输入。';$('#warning p').html(errorMsg); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click'); return false;}
		
		
		$.ajax({
			type:'get',
			url:'/register/isBindedMobile',
			dataType:'text',
			data:{mobile:mobile},
			success:function(str){
				if(str=='yes'){
					var errorMsg_='您使用的手机号码已经注册过。';$('#warning p').html(errorMsg_); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click'); 
				}else if(str=='no'){
					$.ajax({
						type:'get',
						url:'/register/getAuthCode',
						dataType:'text',
						data:{mobile:mobile},
						success:function(str){
						   //console.log(str);
						   authcode_=str;
						   //跳转到注册的下一步...
						}
					});
				}
			}
		});
		
		
		
	});
	</script>
</div>



</body>
</html>