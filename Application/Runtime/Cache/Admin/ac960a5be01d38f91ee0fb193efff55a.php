<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="" method="post">
	<div class="main">
	    <p class="short-input ue-clear">
	    	<label>公众号名称：</label>
	        <input type="text" name="name" placeholder="公众号名称" />
		</p>
			
	    <p class="short-input ue-clear">
	    	<label>公众号：</label>
	        <input type="text" name="wxname" placeholder="公众号" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>地址：</label>
	        <input type="text" name="address" placeholder="地址" />
	    </p>

	    <p class="short-input ue-clear">
	    	<label>电话：</label>
	        <input type="text" name="tel" placeholder="电话" />
	    </p>

		<p class="short-input ue-clear">
	    	<label>价格：</label>
	        <input type="text" name="price" placeholder="价格" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>备注：</label>
			<textarea placeholder="备注" name="remark"></textarea>
			<input type="hidden" name="addtime" value="<?php echo ($data); ?>">
			<input type="hidden" name="user_id" value="<?php echo (session('username')); ?>">
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" class="confirm">确定</a>
	    <a href="javascript:;" class="clear">清空内容</a>
	</div>
</form>
</body>
<script type="text/javascript" src="/book1/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});


showRemind('input[type=text], textarea','placeholder');

$(function(){
	$('.confirm').on('click',function(){
		$('form').submit();
	})
	$('.clear').on('click',function(){
		$('form')[0].reset();
	})
})
</script>
</html>