$(function() {
	jQuery(".hot_left").hover(function () {
			jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
		}
		, function () {
			jQuery(this).find(".prev,.next").fadeOut()
		}
	);
	jQuery(".hot_left").slide({
		titCell: ".hd ul",
		mainCell: ".bd ul",
		effect: "fold",
		autoPlay: true,
		autoPage: true,
		trigger: "click",
		interTime:"4000",
		startFun: function (i) {
			var curLi = jQuery(".hot_left .bd li").eq(i);
			if (!!curLi.attr("_src")) {
				curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
			}

		}
	});
	
	
	$(".main_phone_header li").click(function(){
		var index = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".main_phone_content>div").eq(index).addClass("active").siblings().removeClass("active");
	})
	
	$(".main_info_header li").click(function(){
		var index = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".main_info_box>div").eq(index).addClass("active").siblings().removeClass("active");
	})

	
	$(".all_list_right li").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
	})

	$(".list_more_content a").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
	})

});