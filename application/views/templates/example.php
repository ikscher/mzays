<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="<?php echo base_url('views/javascript/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('views/javascript/jquery.mobile-1.4.2/jquery-1.8.3.min.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url('views/javascript/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js'); ?>" ></script>
<title>无标题文档</title>

<body>

<section data-role="page" id="firstview" data-add-back-btn="true" data-back-btn-text="后退" >
   <header data-role="header"  ><h1>第一个视图</h1></header>
   <article data-role="content"><a href="#secondview" data-role="button" data-icon="grid" data-transition="flip" data-rel="dialog">切换到第二个视图</a></article>
  <article data-role="content"><a href="#thirdview" data-role="button" data-icon="grid" data-transition="slide" data-rel="dialog">切换到第三个视图</a></article>
  
   <footer data-role="footer">页脚</footer>
   <div data-role="controlgroup">
        <input type="button" value="按钮"   onClick="javascript:alert('dd');" data-inline="true" data-theme="a"/>
		<input type="button" value="按钮"   onClick="javascript:alert('dd');" data-inline="true" data-theme="a"/>
		<input type="button" value="按钮"   onClick="javascript:alert('dd');" data-inline="true" data-theme="a"/>
   </div>
   
   <div data-role="controlgroup" data-type="horizontal">
        <a href="#" data-role="button" data-inline="true">确定</a>
		<a href="#" data-role="button" data-inline="true">取消</a>
		<a href="#" data-role="button" data-inline="true">退出</a>
   </div>
   

</section>

<section data-role="page" id="secondview" data-title="第二个视图" >
   <header data-role="header" data-title="第二个视图 " data-position=”fixed">
      <nav data-role='navbar'>
	     <ul>
		     <li><a href="#" class="ui-btn-active">照片</a></li>
			 <li><a href="#">状态</a></li>
			 <li><a href="#">信息</a></li>
			 <li><a href="#">签到</a></li>
			 <li><a href="#">评论</a></li>

		 </ul>
	  </nav>
   </header>
   <article data-role="content"><a href="#"  data-rel="back">切换到第一个视图</a></article>
   <div data-role="controlgroup">
      <label for="select">请选择你的兴趣</label>
	  <select name="select" id="select" data-native-menu="true">
	     <optgroup label="娱乐类"/>
		 <option value="音乐">音乐</option>
		 <option value="电影">电影</option>

	
	
	  </select>
	  
	  <div data-role="content">
	      <ul data-role="listview" data-theme="g" data-split-icon="gear" data-split-theme="a">
		     <li><a href="#">list 1</a><a href="#"></a></li>
			 <li><a href="#">list 2</a></li>
			 <li><a href="#">list 3</a></li>
			 <li><a href="#">list 4</a></li>
			 <li><a href="#">list 5</a></li>
		  </ul>
	  </div>
	  
	  <p>如今<abbr title="是指Model-View-Controller模式">MVC</abbr>模式越
来越被人们诟病，而使用
快速<abbr title="是create, read, update, delete四个词的首字母缩略">CRUD</abbr>生成开发
更是被一些著名程序员唾弃。</p>

   </div>
   <footer data-role="footer" class="ui-bar" >
       <div data-role="controlgroup" data-type="horizontal">
       <a href="#" data-role="button" data-icon="delete">删除</a>
	   <a href="#" data-role="button" data-icon="plus">添加</a>
	   <a href="#" data-role="button" data-icon="arrow-u">上</a>
	   <a href="#" data-role="button" data-icon="arrow-d">下</a>
	   <a href="#" data-role="button" data-icon="arrow-l">左</a>
	   </div>
   </footer>
</section>


<section data-role="page" id="thirdview" data-title="第三个视图">
     <header data-role="header" data-title="第三个视图" data-position="fixed"><h1>第三个视图</h1></header>
     <article data-role="content"><a href="#firstview"  >切换到第一个视图</a></article>
	 <div class="ui-grid-b">
	     <div class="ui-block-a"><input type="button" value="a" data-theme="a" /></div>
		 <div class="ui-block-b"><input type="button" value="b" data-theme="b"/></div>
		 <div class="ui-block-c"><input type="button" value="c" data-theme="c"/></div>
		 
		 <div class="ui-block-a"><input type="button" value="a" data-theme="a"/></div>
		 <div class="ui-block-b"><input type="button" value="b" data-theme="b"/></div>
		 <div class="ui-block-c"><input type="button" value="c" data-theme="c"/></div>
		 
		 
		 <div class="ui-block-a"><input type="button" value="a" data-theme="a"/></div>
		 <div class="ui-block-b"><input type="button" value="b" data-theme="b"/></div>
		 <div class="ui-block-c"><input type="button" value="c" data-theme="c"/></div>
		
	 </div>
	 
	 <div data-role="collapsible">
		<h6>可折叠区域</h6>
		<p>这是一个可折叠区域的内容</p>
	</div>
	<div data-role="fieldcontain">
	    <label for="slider">slider</label>
		<input type="range" name="slider" id="slider" value="2" min="0" max="10" />
	</div>
	
	<div data-role="fieldcontain">
	    <label for="slider">toggle switch :</label>
		<select name="slider" id="slider" data-role="slider">
		    <option value="off">关闭</option>
			<option value="on">开取</option>
		</select>
	</div>
	
	<fieldset data-role="controlgroup">
	    <legend>您的微博选项</legend>
		<input type="radio" name="r1" id="r1" checked /><label for="r1">微博</label>
		<input type="radio" name="r1" id="r2" /><label for="r2">粉丝</label>
		<input type="radio" name="r1" id="r3"/><label for="r3">关注</label>
	</fieldset>
	
	<div data-role="fieldcontain">
	    <label for="birthday">生日：</label> <input type="date" name="birthday" id="birthday" value="2014-07-02" / >
    </div>
	 <footer data-role="footer" >地步</footer>
</section>





</body>
</html>
