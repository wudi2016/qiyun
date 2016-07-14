// 教育资讯 选项卡	
$('.hot_con_sel_num').hover(function(){
    // $(this).addClass("act")            
    //        .siblings().removeClass("act");  
    $(this).addClass("act").parent()            
           .siblings().find(".hot_con_sel_num").removeClass("act");  
    var index =  $('.hot_con_sel_num').index(this);  

    $(this).parents(".hot_con_sel").siblings(".hot_con_det")    
          .eq(index).show()   
          .siblings('.hot_con_det').hide(); 
});