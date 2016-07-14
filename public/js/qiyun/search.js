// 选项卡
// $('.body_left_top_li').click(function(){
//     $(this).addClass("body_left_top_now")            
//            .siblings().removeClass("body_left_top_now");   

//     var index =  $('.body_left_top_li').index(this);  

//     $(this).parents(".body_left_top").siblings(".body_left_con")    
//           .eq(index).show()   
//           .siblings('.body_left_con').hide(); 
// });


// 隔行添加背景色
// var element = $('.body_left_con_li');
// for(var i =0;i<element.length;i++){
//    if(i%2 == 0){
//    	    $(".body_left_con_li:eq("+i+")").addClass('body_left_con_li_bg');
//    }
// }

// 分页
$('.pg').click(function(){
    $(this).addClass('pg_n').siblings().removeClass('pg_n');
});



//获取新闻类型
