<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-reg.css" />
<title>公文起草</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/book1/Public/Admin/images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 8px;
	    width: 240px;
	}
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>公文起草</h2></div>
<form action="" method="post" enctype="multipart/form-data">
<div class="main">
	<p class="short-input ue-clear">
    	<label>标题：</label>
		<input name="title" type="text" placeholder="标题..." />
		<input type="hidden" value="<?php echo ($user_id); ?>" name="user_id">
	</p>
	<div class="short-input select ue-clear">
			<label>所属分类：</label>
			<select name="assort_id">
				<option value="-1">请选择</option>
				<?php if(is_array($data)): foreach($data as $key=>$fo): ?><!-- <td style="text-align:left;"><?php echo (str_repeat('---',$vol["level"])); echo ($vol["assortname"]); ?></td> -->
					<option value="<?php echo ($fo["id"]); ?>"><?php echo (str_repeat('---',$fo["level"])); echo ($fo["assortname"]); ?></option><?php endforeach; endif; ?>
			</select>
	</div>
	<p class="short-input ue-clear">
    	<label>附件：</label>
        <input name="file" type="file"/>
    </p>
    <p class="short-input ue-clear">
    	<label>作者：</label>
        <input name="author" type="text" placeholder="作者..." />
    </p>
    <p class="short-input ue-clear">
    	<label>搜索关键字：</label>
        <input name="method" type="text" placeholder="关键字..." />
    </p>
    <p class="short-input ue-clear">
    	<label>内容：

        <!-- <textarea name="content" style="font-family:Microsoft YaHei !important; font-size:14px;" placeholder="请输入内容..." ></textarea> -->
		</label>
	    <script id="editor" type="text/plain" name ="content" style="width:90%;height:300px; margin:8px 82px;left:30px;"></script>
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
<script type="text/javascript" src="/book1/Public/Admin/plugin/ue/ueditor.config.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/plugin/ue/ueditor.all.min.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/plugin/ue/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	//ue实例化容器，id为富文本编辑器id
    var ue = UE.getEditor('editor');

	$('#btnSubmit').on('click',function(){
		$('form').submit();
	});
	
	$('#btnReset').on('click',function(){
		$('form')[0].reset();
	});
});	

$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});
showRemind('input[type=text], textarea','placeholder');
</script>
</html>