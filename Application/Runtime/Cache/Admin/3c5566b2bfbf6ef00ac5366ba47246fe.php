<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dashboard - Bootstrap Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/book1/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/book1/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="/book1/Public/Admin/css/adminia.css" rel="stylesheet" /> 
    <link href="/book1/Public/Admin/css/adminia-responsive.css" rel="stylesheet" /> 
    
    <link href="/book1/Public/Admin/css/pages/login.css" rel="stylesheet" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	
<div id="login-container">
	
	
	<div id="login-header">
		
		<h3>Login</h3>
		
	</div> <!-- /login-header -->
	
	<div id="login-content" class="clearfix">
	
	<form action="<?php echo U('checkLogin');?>" method="post"/>
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="username">Username</label>
						<div class="controls">
							<input type="text" class="" id="username" name="username"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" class="" id="password" name="password"/>
						</div>
					</div>
				</fieldset>
				
				<div id="remember-me" class="pull-left">
					<input type="checkbox" name="remember" id="remember" />
					<label id="remember-label" for="remember">Remember Me</label>
				</div>
				
				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">
						Login
					</button>
				</div>
			</form>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			
			<p>Don't have an account? <a href="javascript:;">Sign Up.</a></p>
			
			<p>Remind Password? <a href="forgot_password.html">Retrieve.</a></p>
			
		</div> <!-- /login-extra -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
 <!-- <script src="./js/jquery-1.7.2.min.js"></script>  -->
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

 <script src="/book1/Public/Admin/js/bootstrap.js"></script> 

  </body>
</html>