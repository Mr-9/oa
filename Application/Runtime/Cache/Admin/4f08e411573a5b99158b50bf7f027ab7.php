<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/book1/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/book1/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">

    </a>
    <a href="/book1/index.php/Admin/Dept/charts" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
        <form action="<?php echo U('search');?>" method="get">
            <input type="text" name="status">
            <button type="submit">查询</button>
        </form>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
                <th colspan="2">公众号名称</th>
                <th>公众号</th>
                <th>地址</th>
                <th>电话</th>
                <th>价格</th>
                <th>备注</th>
                <th>编辑</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" class="deptid" value="<?php echo ($vol["id"]); ?>" style="vertical-align:middle; margin-bottom:2px; margin-bottom:-2px\9;"/></td>
            	<td><?php echo ($vol["name"]); ?></td>
                <td><?php echo ($vol["wxname"]); ?></td>
                <td><?php echo ($vol["address"]); ?></td>
                <td><?php echo ($vol["tel"]); ?></td>
                <td><?php echo ($vol["price"]); ?></td>
                <td><?php echo ($vol["remark"]); ?></td>
                <td>
                    
                    <a href="/book1/index.php/Admin/Dept/edit/id/<?php echo ($vol["id"]); ?>">编辑</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<!-- <div class="pagination ue-clear"></div> -->
<div class="pagination ue-clear">
    <?php echo ($show); ?>
</div>
</body>
<script type="text/javascript" src="/book1/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/book1/Public/Admin/js/jquery.pagination.js"></script>
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

// $('.pagination').pagination(100,{
// 	callback: function(page){
// 		alert(page);	
// 	},
// 	display_msg: true,
// 	setPageNo: true
// });

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

$(function(){
    //给删除元素绑定点击事件
    $('.del').on('click',function(){
    //事件处理程序
        var idObj = $(':checkbox:checked');
        var id = '';    //接收处理后的部门id值。。。
        //循环遍历idObj对象，获取其中的每一个值
        for(var i = 0;i<idObj.length;i++){
            id += idObj[i].value+',';
        }
        //去掉最后的逗号
        id = id.substring(0,id.length-1);
        // console.log(id);
        //带着参数跳转到del方法
        window.location.href = '/book1/index.php/Admin/Dept/del/id/'+id;
    })

})
</script>
</html>