$(document).ready(function(e){
	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
	    e.preventDefault();
	    $(this).siblings('a.active').removeClass("active");
	    $(this).addClass("active");
	    var index = $(this).index();
	    $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
	    $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	});
	$("ul#nav_child>li>a").click(function(e){
		e.preventDefault();
		var index;
		if($(this).attr('id') == "tk_bill") index = 3;
		if($(this).attr('id') == "tk_thuchi") index = 2;
		if($(this).attr('id') == "menu" || $(this).attr('id') == "menudetail") index = 0;
		if($(this).attr('id') == "groupresource" || $(this).attr('id') == "addresource" ||$(this).attr('id') == "importresource" || $(this).attr('id') =="listimportresource") index = 1;
		if($(this).attr('id') == "phieuthu" || $(this).attr('id') == "phieuchi") index = 2;
		$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass('active');
		$("#navbar-collapse-4").collapse('hide');
		$("div.bhoechie-tab-menu>div.list-group>a").eq(index).addClass('active');
		$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass('active');
	});
//modals
	$("#phieuthu").click(function(){
		$.ajax({
			type:'post',
			url:'ajaxcall.php',
			data:{thuchi_type:0},
			success:function(response){
				$('#thuchi_type').html(response);
			}
		});
	});
	$("#phieuchi").click(function(){
		$.ajax({
			type:'post',
			url:'ajaxcall.php',
			data:{thuchi_type:1},
			success:function(response){
				$('#thuchi_type').html(response);
			}
		});
	});
});
