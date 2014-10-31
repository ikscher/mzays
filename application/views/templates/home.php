<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>真爱一生婚恋交友网站</title>
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
<!--<meta name="baidu-tc-cerfication" content="658154ceedf0d8e7938ed156d9ea256d"> -->
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon"/>
<link rel="icon" href="<?php echo base_url('assets/images/favicon.ico');?>" type="image/x-icon">
</head>

<body>
<div data-role="page" id="home">
	<div data-role="header">
    	<div class="tc bg"><img  src="<?php echo base_url('assets/images/icon.png');?>" alt=""></div>
    </div>
    <div data-role="content">
	    <div class="tc">
    	    <img src="<?php echo base_url('assets/images/logo_home.png');?>" alt="">
            <p class="f12">三千多万会员在这里征婚...</p>
			
		</div>
		<a href="/register/index"  data-role="button">注册</a>
        <div class="login">
            <a href="/login/index" class="ui-btn ui-btn-inline ui-mini">登录</a>
            <!--<a href="/open/oauth_login.php?ofrom=qq2&amp;pin=0_0_1411972768_18ea0fa459dabf4da840cefb5f6aad78&amp;v=6" class="ui-btn ui-btn-inline ui-mini">QQ登录</a>-->
        </div>
    </div>
    <!--注册按钮-->
    
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>
</body></html>