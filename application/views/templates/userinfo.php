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
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" class="ui-btn-active">首页</a></li>
			<li><a href="#search">搜索</a></li>
			<li><a href="#message">消息</a></li>
			<li><a href="#setting">设置</a></li>
			<li><a href="#service">服务</a></li>
		</ul>
	</div><!-- /navbar -->
    
	
	<div data-role="content">
		<div class="r-basic-data-img fleft"><img src="<?php echo $imgUrl;?>" /></div>
		<p class="name-time"><span class="f-b-d73c90"><?php echo $level;?></span><span>上次登录：&nbsp;<?php echo $lastvisit;?></span></p>
		<dl class="user-data fleft">
			<dt>用&nbsp;户&nbsp;名：&nbsp;<?php echo $username;?></dt>
			<dd>ID：<?php echo $uid;?> </dd>
			<dt><span class="fleft">诚&nbsp;信&nbsp;值：</span> <?php echo $memberStars;?></dt>
			<dd>资料完整度：<meter min="0" max="48" value="<?php echo $integrity;?>"></meter></dd>
		</dl>
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>

<div data-role="page" id="search">
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" >首页</a></li>
			<li><a href="#search" class="ui-btn-active">搜索</a></li>
			<li><a href="#message">消息</a></li>
			<li><a href="#setting">设置</a></li>
			<li><a href="#service">服务</a></li>
		</ul>
	</div>
    
	
	<div data-role="content">
		ddddd
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>


<div data-role="page" id="message">
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" >首页</a></li>
			<li><a href="#search">搜索</a></li>
			<li><a href="#message" class="ui-btn-active">消息</a></li>
			<li><a href="#setting">设置</a></li>
			<li><a href="#service">服务</a></li>
		</ul>
	</div>
    
	
	<div data-role="content">
		sdfsdfsdfsdf
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>

<div data-role="page" id="setup">
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" >首页</a></li>
			<li><a href="#search">搜索</a></li>
			<li><a href="#message">消息</a></li>
			<li><a href="#setting"  class="ui-btn-active">设置</a></li>
			<li><a href="#service">服务</a></li>
		</ul>
	</div>
    
	
	<div data-role="content">
		sdfsw34234234
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>


<div data-role="page" id="service">
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" >首页</a></li>
			<li><a href="#search">搜索</a></li>
			<li><a href="#message">消息</a></li>
			<li><a href="#setting" >设置</a></li>
			<li><a href="#service"  class="ui-btn-active">服务</a></li>
		</ul>
	</div>
    
	
	<div data-role="content">
		sdfsw34234234
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>" type="text/css" />
</div>
</body></html>