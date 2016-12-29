$(function() {
	$(".text_search").focus(function(){
		$(".header .search_box ul").show();
		$(".smark").show();
	}),$(".text_search").blur(function(){
		setTimeout(function(){
			$(".smark").hide();
			$(".header .search_box ul").hide();
		}, 300);
	});
});