<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-reg.css" />
<title></title>
<style type='text/css'>
body{
    width:100%;height:auto;
}

    .main{width:100%;}
    .main input{width:166px !important;}
	.main p input {
		float:none;
    }
    .main p textarea {
        max-width: 255%;
    }
	.btn{margin:10px;}
</style>
</head>

<body>
<div class="title"><h2>用户信息</h2></div>
<form action="" method="post" enctype="multipart/form-data" style="width:800px;max-width:90%;padding:12px; margin:0 auto;">
<div class="main">
	<p class="short-input ue-clear">
    	<label>用户名：</label>
		<input name="username" type="text" placeholder="用户名" value="<?php echo ($data["username"]); ?>"/>
		<input type="hidden" name="userid" value="<?php echo (session('id')); ?>">
    </p>
	<p class="short-input ue-clear">
    	<label>头像：</label><img src="<?php echo ((isset($file) && ($file !== ""))?($file):'/book1/Public/Admin/img/headshot.png'); ?>" alt="" style="width:80px;height:80px;">
        <input name="file" type="file"/>
        <span style="float:none;margin-left: 0;display:inline-block;">  说明：如果需要修改则选择文件，留空则表示不修改。</span>
    </p>
    <p class="short-input ue-clear">
    	<label style="width:100%;">个人信息：
        <textarea name="content" style="font-family:Microsoft YaHei !important; font-size:14px; background:#e2d9d9; width:64vw;" placeholder="请输入内容..." ><?php echo ($data["content"]); ?></textarea>
		</label>
	</p>
	
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/book1/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
	$('#btnSubmit').on('click',function(){
		$('form').submit();
	});
	
	$('#btnReset').on('click',function(){
		$('form')[0].reset();
	});
});	
</script>
</html>