$(function(){
	$(".nav").on("click","li",function(){
		$(this).siblings().removeClass("active");
		var hasChild = !!$(this).find(".subnav").size();
		if(hasChild){
			$(this).toggleClass("hasChild");
		}
		$(this).addClass("active");
	});
	
	
	
	
	$(".nav>li").css({"borderColor":"#dbe9f1"});
	$(".nav>.active").prev().css({"borderColor":"#7ac47f"});
	$(".nav").on("click","li",function(e){
		var aurl = $(this).find("a").attr("date-src");
		$("#iframe").attr("src",aurl);
		$(".nav>li").css({"borderColor":"#dbe9f1"});
		$(".nav>.active").prev().css({"borderColor":"#7ac47f"});
		reinitIframe();
		return false;
	});
	
	$('.exitDialog').Dialog({
		title:'提示信息',
		autoOpen: false,
		width:400,
		height:200
		
	});
	
	$('.exit').click(function(){
		$('.exitDialog').Dialog('open');
	});
	
	
	
	$('.exitDialog input[type=button]').click(function(e) {
		$('.exitDialog').Dialog('close');
		
		if($(this).hasClass('ok')){
			window.location.href = "/book1/index.php/Admin/Public/logout"	;
		}
	});

	
})
