<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	/* table tr .id{ width:63px; text-align: center;}
	table tr .name{ width:118px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:17px;}
	table tr .dept_id{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:80px; padding-left:13px;}
	table tr .tel{ width:113px; padding-left:13px;}
	table tr .email{ width:160px; padding-left:13px;}
	table tr .addtime{ width:160px; padding-left:13px;}
	table tr .operate{ padding-left:13px;} */
</style>
</head>

<body>
<div class="title"><h2>公文管理</h2></div>
<div class="table-operate ue-clear">
	<a href="/book1/index.php/Admin/Doc/add" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
	<form action="<?php echo U('search');?>" method="get">
		<input type="text" name="status" style="text-indent:10px;">
		<button type="submit">查询</button>
	</form>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<!-- <th class="id">序号</th> -->
                <th class="name">标题</th>
                <th class="assort">所属分类</th>
				<th class="file">附件</th>
                <th class="content">作者</th>
                <th class="method">关键字</th>
				<th class="addtime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
				<!-- 'id' => string '1' (length=1)
				'title' => string '天真的我' (length=12)
				'assort_id' => string '1' (length=1)
				'filepath' => string '/Public/Upload/2017-10-12/59dec9a056c5d.jpg' (length=43)
				'filename' => string '09d06947a5ff6b6fc2c9a4089fc5_500_500.jpg' (length=40)
				'hasfile' => string '1' (length=1)
				'content' => string '&lt;p&gt;123&lt;/p&gt;' (length=22)
				'author' => string 'admin' (length=5)
				'addtime' => string '1507625771' (length=10)
				'assortname' => string '第一级目录1' (length=16) -->
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
					<!-- <td><img src="/book1<?php echo ($vol["filepath"]); ?>" alt=""></td> -->
					<!-- <td class="id"><?php echo ($vol["id"]); ?></td> -->
					<td class="name"><?php echo (msubstr($vol["title"],0,8)); ?></td>
					<td class="assort"><?php echo (msubstr($vol["assortname"],0,8)); ?></td>
					<!-- <td class="file"><?php echo ($vol["filename"]); if($vol["hasfile"] == 1 ): ?><a href="/book1/index.php/Admin/Doc/download/id/<?php echo ($vol["id"]); ?>">【下载】</a><?php endif; ?></td> -->
					<td class="file"><?php echo (msubstr($vol["filename"],0,8)); if(!empty($vol["filename"])): ?><a href="/book1/index.php/Admin/Doc/download/id/<?php echo ($vol["id"]); ?>">【下载】</a><?php endif; ?></td>
					<td class="content"><?php echo ($vol["author"]); ?></td>
					<td class="content"><?php echo (msubstr($vol["method"],0,8)); ?></td>
					<td class="addtime"><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
					<td class="operate">
						<a href ='javascript:;' class="show" data='<?php echo ($vol["id"]); ?>' data-title="<?php echo ($vol["title"]); ?>">查看</a> |
						<a href ='/book1/index.php/Admin/Doc/edit/id/<?php echo ($vol["id"]); ?>' class="show" >编辑</a> 
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
	<div class="pagin-list">
		<?php echo ($show); ?>
	</div>
	<div class="pxofy">共 <?php echo ($count); ?> 条记录</div>
</div>
</body>
<script type="text/javascript" src="/book1/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/plugin/layer/layer.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

//查看方法
$(function(){
	$('.show').on('click',function(){
		//获取id
		var id = $(this).attr('data');
		var title = $(this).attr('data-title');
		layer.open({
			type: 2,
			title: title,
			shadeClose: true,
			shade: 0.1,
			area: ['95%', '95%'],
			content: '/book1/index.php/Admin/Doc/showContent/id/'+id //iframe的url
			}); 
	})
})
</script>
</html>