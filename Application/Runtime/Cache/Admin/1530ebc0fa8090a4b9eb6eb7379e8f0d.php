<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
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
		<input name="title" type="text" placeholder="标题..." value="<?php echo ($data["title"]); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
	</p>
	<!-- $info
	'id' => string '1' (length=1)
	'assortname' => string '第一级目录1' (length=16)
	'pid' => string '0' (length=1)
	'sort' => string '0' (length=1)
	'remark' => string '顶级栏目1' (length=13)   -->
	
	<!-- $data
	'id' => string '1' (length=1)
	'title' => string '天真的我' (length=12)
	'assort_id' => string '1' (length=1)
	'filepath' => string '/Public/Upload/2017-10-12/59dec9a056c5d.jpg' (length=43)
	'filename' => string '09d06947a5ff6b6fc2c9a4089fc5_500_500.jpg' (length=40)
	'hasfile' => string '1' (length=1)
	'content' => string '&lt;p&gt;123&lt;/p&gt;' (length=22)
	'author' => string 'admin' (length=5)
	'addtime' => string '1507625771' (length=10) -->
	<div class="short-input select ue-clear">
	    	<label>所属类别：</label>
	        <div class="select-wrap">
	        	<select name="assort_id">
					<!-- <option value="0">顶级部门</option> -->
					<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>" <?php if($vol["id"] == $data["assort_id"] ): ?>selected="selected"<?php endif; ?> > 
							<?php echo (str_repeat('---',$vol["level"])); echo ($vol["assortname"]); ?>
						</option><?php endforeach; endif; else: echo "" ;endif; ?>
	            </select>
	        </div>
	</div>

	<p class="short-input ue-clear">
    	<label>附件：</label>
		<input name="file" type="file"/>
		说明：如果需要修改则选择文件，留空则表示不修改。
    </p>
    <p class="short-input ue-clear">
    	<label>作者：</label>
        <input name="author" type="text" placeholder="作者..." value="<?php echo ($data["author"]); ?>"/>
	</p>
	<p class="short-input ue-clear">
    	<label>搜索关键字：</label>
        <input name="method" type="text" placeholder="关键字..." value="<?php echo ($data["method"]); ?>"/>
    </p>
    <p class="short-input ue-clear">
    	<label>内容：

        <!-- <textarea name="content" style="font-family:Microsoft YaHei !important; font-size:14px;" placeholder="请输入内容..." ></textarea> -->
		</label>
	    <script id="editor" type="text/plain" name ="content" style="width:90%;height:300px; margin:8px 82px;left:30px;"><?php echo (htmlspecialchars_decode($data["content"])); ?></script>
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