<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="utf-8">
	<title>真爱一生交友网_中国严肃婚恋网站</title>
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
	<meta name="baidu-tc-cerfication" content="658154ceedf0d8e7938ed156d9ea256d">
	
</head>

<body>
<div data-role="page" id="loginform">
	<div data-role="header">
	    <a href="/home/index"    class="ui-btn-left ui-btn ui-icon-home ui-btn-icon-notext ui-shadow ui-corner-all" role="button"></a>
    	<h1 class="ui-title" role="heading" aria-level="1">登录</h1>
    </div>
	
	<div data-role='content'>
		<form  name="loginForm" method="GET" action="/login/me">
			<ul class="input_list ">
				<li class="mb15 clearfix " id="user_name_li"><span class="name name2  fl" id="user_icon"></span><input class="w_180" name="name" id="name" placeholder="输入手机号或ID" type="text"  data-role="none" value="13856900659"><span class="txt_off txt_off_un"></span></li>
				<li class="mb15 clearfix pr" id="psw_name_li"><span class="name name3 fl" id="psw_icon"></span><input type="password" class="pr w_180" style="z-index:2;" name="password" id="password" placeholder="输入您的密码"   data-role="none" value=""><span class="txt_off txt_off_pw dn"></span></li>
				<li style="border:none;">
					<label class="fl"><input type="checkbox" id="autologin" name="autologin" value="1" checked="checked" data-role="none"><span style="color:#888888;font-size:14px;">自动登录</span></label>
					<a href="#" class="forg_psw fr">忘记密码</a>
				</li>
				
			</ul>
			<input type="hidden" name="returnurl" value="/userinfo/index" />
			<a href="javascript:void(0);"  id="login" data-role="button">登录</a>
	    </form>
    </div>
    
	<a  id="popupError" href="#warning" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline dn" data-transition="pop"></a>
	<div data-role="popup" id="warning"><p>您输入的手机号码有误，请重新输入。</p></div>
	
	<div data-role="footer">
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
	</div>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>" type="text/css" />
	<script type="text/javascript">
		
		$(function() {
			$("#name, #password").focus(function() {
				var class_name_str = $(this).attr('id')=='name'?'focus':'focus2';
				$(this).prev().addClass(class_name_str); 
			}).blur(function() {
				var class_name_str = $(this).attr('id')=='name'?'focus':'focus2';
				$(this).prev().removeClass(class_name_str); 
			}).keyup(function() {
				countTextLen();
			});
			
			$(".txt_off").click(function() {
				$(this).prev().val("");
				$(this).addClass("dn");
				$(this).prev().focus();
			});
			countTextLen();

		});

	

		function countTextLen() {
			if ($("#name").val().length>0) {
				$(".txt_off_un").removeClass("dn");
			}
			else {
				$(".txt_off_un").addClass("dn");
			}
			if ($("#password").val().length>0) {
				$(".txt_off_pw").removeClass("dn");
			}
			else {
				$(".txt_off_pw").addClass("dn");
			}
		}
		
		
		//判断手机号是否正确
		function isMobile(mobile){
			 var reg = /^((1[345]\d{9})|(18[0-9]\d{8}))$/;
			 var flag=false;
			 if (reg.test(mobile)) flag=true;
			 return flag;
		}
		
		
		
		$('#login').on('click',function(){
		    var name=$('#name').val();
			if(!isMobile(name) && !/^\d{8,8}$/.test(name)) {  var errorMsg='您输入的手机号码或ID有误，请重新输入。';$('#warning p').html(errorMsg); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click'); return false;}
            var password=$('#password').val();
			var autologin=$('#autologin').val();
			//var returnurl='/userinfo/index';
			if(!password) {  var errorMsg='请输入密码。';$('#warning p').html(errorMsg); $('#warning').removeClass('ui-popup-hidden');$('#popupError').trigger('click'); return false;}
			
			document.loginForm.submit();
			/*
			$.ajax({
				type:'get',
				url:'/login/me',
				dataType:'text',
				data:{name:name,password:password,autologin:autologin,returnurl:returnurl},
				success:function(str){
                    if(!str) return false;
					var newbie=str.split(',');
	
					switch(newbie[0]){
					    case 'errorUid':
						    location.href=newbie[1];
						    break;
						case 'errorPwd':
						    location.href=newbie[1];
						    break;
						case 'locked':
						    location.href=newbie[1];
						    break;
						case 'ok':
						    location.href=newbie[1];
						    break;
					}
				}
			});
			*/
		});
	</script>
</div>

</body></html>