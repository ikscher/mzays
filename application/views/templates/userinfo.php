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
		<div class="where">
			<form  method="post" >
				
				<ul class="form_search">
					<li><div data-role="fieldcontain" class="ui-grid-c"  > <div class="ui-block-a" style="width:45px;"><label  >性别：</label> </div>
					
							<div class="ui-block-b"><input type="radio" name="gender" id="male" value="0"><label for="male">男</label></a></div>
							<div class="ui-block-c"><input type="radio" name="gender" id="female" checked="checked" value="1"><label for="female">女</label></div>
								</div>		
					</li>
					<li>
					    <div data-role="fieldcontain"   class="ui-grid-d" >
						    <div class="ui-block-a"  style="width:45px;"><label >年龄：</label></div>
							<div class="ui-block-b" style="width:100px;">
							    <select data-native-menu="false" name="age1" id="age1" >
								    <option value="12h">最小的</option>
									<option value="1d">18</option>
									<option value="2d">19</option>
									<option value="week">20</option>
								</select>
							</div>
							<div class="ui-block-c center" style="width:15px;">至</div>
							<div class="ui-block-d" style="width:100px;">
							    <select data-native-menu="false" name="age2" id="age2" >
								    <option value="12h">最大的</option>
									<option value="1d">88</option>
									<option value="2d">89</option>
									<option value="week">90</option>
								</select>
							</div>
						</div>
					</li>
					
					
					<li><div data-role="fieldcontain"   class="ui-grid-b" ><div class="ui-block-a"  style="width:45px;"><label >地区：</label></div>
					    <div class="ui-block-b" style="width:200px;">
							<select data-native-menu="false" name="province" id="province">
								<option value="0">请选择省份</option>
								<option value="1d">一天</option>
								<option value="2d">两天</option>
								<option value="week">一周</option>
							</select>
						</div>
						</div>
					</li>
					<li>
					    <div style="margin-left:45px;width:200px;">
						<select data-native-menu="false" name="city" id="city" >
							<option value="12h">请选择城市</option>
							<option value="1d">一天</option>
							<option value="2d">两天</option>
							<option value="week">一周</option>
						</select>
						</div>
		            </li>
					
					<li><div data-role="fieldcontain" class="ui-grid-b"><div class="ui-block-a" style="width:45px;"><label>婚姻：</label></div>
					        <div class="ui-block-b" style="width:150px;">
								<select data-native-menu="false" name="marriage" id="marriage" >
								<option value="12h">请选择婚姻状况</option>
								<option value="1d">未婚</option>
								<option value="2d">离异</option>
								<option value="week">单身</option>
							</select>
							</div>
						</div>
					</li>
					<li>
					    <div data-role="fieldcontain" class="ui-grid-d">
					        <div class="ui-block-a" style="width:45px;"><label>身高：</label></div>
							<div class="ui-block-b" style="width:100px;">
							    <select data-native-menu="false" name="height1" id="height1" >
								    <option value="12h">最低的</option>
									<option value="1d">155cm</option>
									<option value="2d">156cm</option>
									<option value="week">157cm</option>
								</select>
								
							</div>
							<div class="ui-block-c center" style="width:15px;">至</div>
							<div class="ui-block-d" style="width:100px;">
							    <select data-native-menu="false" name="height2" id="height2" >
								    <option value="12h">最高的</option>
									<option value="1d">175cm</option>
									<option value="2d">176cm</option>
									<option value="week">177cm</option>
								</select>
							</div>
					    </div>
					</li>
					<li>
					    <div data-role="fieldcontain" class="ui-grid-b">
						    <div class="ui-block-a" style="width:45px;"><label>学历：</label></div>
						    <div class="ui-block-b">
							    <select data-native-menu="false" name="education" id="education" >
								    <option value="12h">博士</option>
									<option value="1d">硕士</option>
									<option value="2d">本科</option>
									<option value="week">专科</option>
								</select>
							</div>
						</div>
					</li>
					<li>
					    <div data-role="fieldcontain" class="ui-grid-b">
						    <div class="ui-block-a" style="width:45px;"><label>月薪：</label></div>
						    <div class="ui-block-b" style="width:150px;">
							    <select data-native-menu="false" name="salary" id="salary" >
								    <option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
									<option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
									<option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
									<option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
									<option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
									<option value="12h">10000以上</option>
									<option value="1d">8000-10000</option>
									<option value="2d">5000-8000</option>
									<option value="week">5000以下</option>
								</select>
							</div>
						</div>
					</li>
					<li><input type="submit" value="搜索意中人" data-theme="b"></li>
				</ul>
				
			</form>
		</div>
	</div>
	
	<div data-role="footer">
	    <p>
	    <!--<span class="f12">品牌：8年专业婚恋服务</span> <span class="f12">专业：庞大的资深红娘队伍</span>  <span class="f12">真实：诚信会员验证体系 </span>-->
		<p><span class="nfb"><?php echo $this->lang->line('footer');?></span> <p>
		<span class="nfb"><?php echo $this->lang->line('telphone');?></span>
    </div>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/search.css'); ?>" type="text/css" />
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

<div data-role="page" id="setting">
	<div data-role="navbar" data-grid="d">
		<ul>
			<li><a href="#home" >首页</a></li>
			<li><a href="#search">搜索</a></li>
			<li><a href="#message">消息</a></li>
			<li><a href="#setting" class="ui-btn-active" >设置</a></li>
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
			<li><a href="#service" class="ui-btn-active">服务</a></li>
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