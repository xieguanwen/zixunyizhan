$(function(){
    $(".list_more_div span").hover(function(){
        $(this).parent().css("height","37px").siblings().css("height","25px");
        $(".list_more_content").hide();
        $(this).next(".list_more_content").show();
    });
});