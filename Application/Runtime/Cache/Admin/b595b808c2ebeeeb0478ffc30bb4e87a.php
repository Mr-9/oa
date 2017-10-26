<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Dashboard - Bootstrap Admin</title>
	<link rel="shortcut icon" href="/book1/Public/Admin/img/headshot.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/book1/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/book1/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="/book1/Public/Admin/css/font-awesome.css" rel="stylesheet" />
    
    <link href="/book1/Public/Admin/css/adminia.css" rel="stylesheet" /> 
    <link href="/book1/Public/Admin/css/adminia-responsive.css" rel="stylesheet" /> 
    
	<link href="/book1/Public/Admin/css/pages/dashboard.css" rel="stylesheet" /> 
	<link rel="stylesheet" type="text/css" href="/book1/Public/Admin/css/jquery.dialog.css" />
     
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<style>
	.subnav{display: none;}
	.hasChild .subnav{ display:block;}
</style>
<body>
	
<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="/book1/index.php/Admin/Index">数字化管理系统</a>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					<li>
						<a href="#"><span class="badge badge-warning">7</span></a>
					</li>
					
					<li class="divider-vertical"></li>
					
					<li class="dropdown">
						<a href="javascript:;" class="quit-btn exit"><i class="icon-off"></i> Logout</a>
						
						<!-- <a data-toggle="dropdown" class="dropdown-toggle " href="#">
							Rod Howard <b class="caret"></b>							
						</a> -->
						
						<!-- <ul class="dropdown-menu subnav">
							<li>
								<a href="/book1/Public/Admin/account.html"><i class="icon-user"></i> Account Setting  </a>
							</li>
							
							<li>
								<a href="/book1/Public/Admin/change_password.html"><i class="icon-lock"></i> Change Password</a>
							</li>
							
							<li class="divider"></li>
							
							<li>
								<a href="javascript:;" class="quit-btn exit"><i class="icon-off"></i> Logout</a>
							</li>
						</ul> -->
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div id="content">
	
	<div class="container">
		
		<div class="row">
			
			<div class="span3">
				
				<div class="account-container">
				
					<div class="account-avatar">
						<img src="<?php echo ((isset($file) && ($file !== ""))?($file):'/book1/Public/Admin/img/headshot.png'); ?>" alt="" class="thumbnail" />
					</div> <!-- /account-avatar -->
				
					<div class="account-details">
					
						<span class="account-name"><?php echo ((isset($data['username']) && ($data['username'] !== ""))?($data['username']):'用户名'); ?></span>
						
						<span class="account-role"><?php echo ((isset($data['content']) && ($data['content'] !== ""))?($data['content']):'用户描述。。。'); ?></span>
						
						<span class="account-actions ">
							<!-- <a href="javascript:;">Profile</a> | -->
							<ul class="nav">
								<li>
									<a href="javascript:;" date-src="<?php echo U('Msg/edit');?>">信息修改</a>
								</li>
							</ul>
						</span>
					
					</div> <!-- /account-details -->
				
				</div> <!-- /account-container -->
				
				<hr />

				<ul id="main-nav" class="nav nav-tabs nav-stacked ">
					
					<li class="active ">
						 <a href="javascript:;" date-src="<?php echo U('home');?>">
							<i class="icon-home"></i>
							日常办公 		
						</a> 
					</li>
					
					<!-- <li>
						<a href="javascript:;" date-src="faq.html">
							<i class="icon-pushpin"></i>
							FAQ	
						</a>
					</li> -->
					
					<li class="dropdown">
						<a href="javascript:;" >
							<i class="icon-th-list"></i>
							微信公众号		
						</a>
						<ul class="subnav">
							<li>
								<a href="javascript:;" date-src="<?php echo U('Dept/showList');?>"><i class="icon-user"></i> 公众号列表 </a>
							</li>
							
							<li>
								<a href="javascript:;" date-src="<?php echo U('Dept/add');?>"><i class="icon-lock"></i> 添加公众号 </a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" >
							<i class="icon-align-justify"></i>
							信息统计		
						</a>
						<ul class="subnav">
							<li>
								<a href="javascript:;" date-src="<?php echo U('List/showList');?>"><i class="icon-user"></i> 信息列表 </a>
							</li>
							
							<li>
								<a href="javascript:;" date-src="<?php echo U('List/add');?>"><i class="icon-lock"></i> 添加信息 </a>
							</li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" >
							<i class="icon-plus-sign"></i>
							分类编辑		
						</a>
						<ul class="subnav">
							<li>
								<a href="javascript:;" date-src="<?php echo U('Assort/showList');?>"><i class="icon-user"></i> 分类列表 </a>
							</li>
							
							<li>
								<a href="javascript:;" date-src="<?php echo U('Assort/add');?>"><i class="icon-lock"></i> 添加分类 </a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;">
							<i class="icon-th-large"></i>
							公文起草	
							<span class="label label-warning pull-right">5</span>
						</a>
						<ul class="subnav">
							<li>
								<a href="javascript:;" date-src="<?php echo U('Doc/showList');?>"><i class="icon-user"></i> 公文列表 </a>
							</li>
							
							<li>
								<a href="javascript:;" date-src="<?php echo U('Doc/add');?>"><i class="icon-lock"></i> 公文起草 </a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="javascript:;" date-src="/book1/index.php/Admin/Index/charts">
							<i class="icon-signal"></i>
							数据统计	
						</a>
					</li>
					
					<li>
						<a href="javascript:;" date-src="<?php echo U('Msg/edit');?>">
							<i class="icon-user"></i>
							用户信息							
						</a>
					</li>
					
					<!-- <li>
						<a href="javascript:;" date-src="login.html">
							<i class="icon-lock"></i>
							Login	
						</a>
					</li> -->
					
				</ul>	
				
				<hr />
				
				<div class="sidebar-extra">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
				</div> <!-- .sidebar-extra -->
				
				<br />
		
			</div> <!-- /span3 -->
			
			
			
			<div class="span9">
				
				<!-- <iframe src="home.html" id="iframe" width="100%" height="100%" frameborder="0"></iframe> -->
				<iframe src="<?php echo U('home');?>" frameborder="0" scrolling="no" id="iframe" width="100%"  style="min-height:60vh;" onload="this.height=100"></iframe>
				
				<script type="text/javascript">
					function reinitIframe(){
						var iframe = document.getElementById("iframe");
						try{
						var bHeight = iframe.contentWindow.document.body.scrollHeight;
						var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
						var height = Math.min(bHeight, dHeight);
						iframe.height = height;
						// console.log(height);
						}catch (ex){}
						}
					window.setInterval("reinitIframe()", 1200);
					
					window.onresize = function(){
						reinitIframe()
						console.log(iframe.height);
                	};
				</script>
				
			</div> <!-- /span9 -->
			
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /content -->
	
<div id="footer"style="">
	
	<div class="container" >				
		<hr />
		<p>&copy; 2012 Go Ideate.</p>
	</div> <!-- /container -->
	
</div> <!-- /footer -->

<div class="exitDialog">
		<div class="dialog-content">
		  <div class="ui-dialog-icon"></div>
		  <div class="ui-dialog-text">
			<p class="dialog-content">你确定要退出系统？</p>
			<p class="tips">如果是请点击“确定”，否则点“取消”</p>
			<div class="buttons">
			  <input type="button" class="button long2 ok" value="确定" />
			  <input type="button" class="button long2 normal" value="取消" />
			</div>
		  </div>
		</div>
	  </div>

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
		<script src="/book1/Public/Admin/js/jquery-1.7.2.min.js"></script>
		<script src="/book1/Public/Admin/js/excanvas.min.js"></script>
		<script src="/book1/Public/Admin/js/jquery.flot.js"></script>
		<script src="/book1/Public/Admin/js/jquery.flot.pie.js"></script>
		<script src="/book1/Public/Admin/js/jquery.flot.orderBars.js"></script>
		<script src="/book1/Public/Admin/js/jquery.flot.resize.js"></script>
		<script src="/book1/Public/Admin/js/bootstrap.js"></script>
		<script type="text/javascript" src="/book1/Public/Admin/js/common.js"></script>
		<script type="text/javascript" src="/book1/Public/Admin/js/core.js"></script>
		<script type="text/javascript" src="/book1/Public/Admin/js/jquery.dialog.js"></script>
		<script src="/book1/Public/Admin/js/index.js"></script>
		
	</body>
</html>