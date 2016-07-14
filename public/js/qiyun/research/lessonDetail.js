$(document).ready(function () {
  //search
  $('.input').click(function () {
		$(this).next('#sub').show();
		$('#sub li').click(function () {
			$('.input').html($(this).text());
			$('#sub').hide();
		});
  });
  $('#sub').find("li").mouseover(function(){
	   $(this).css({"background-color":"#E8E6E7","color":"#225697"});
	});
  $('#sub').find("li").mouseout(function(){
	   $(this).css({"background-color":"#ffffff","color":"#626262"});
	});

	//menu
	$('.fir_m').mouseover(function(){
		$(this).next('.nav_more').show();
		$(this).css({"margin-left":"7px"});
	});
	$('.fir_m').mouseout(function(){
		$(this).next('.nav_more').hide();
		$(this).css({"margin-left":"0px"});
	});

	$('.nav_more').mouseover(function(){
		$(this).show();
	});

	$('.nav_more').mouseout(function(){
		$(this).hide();
	});

  //select card bkdetail

  $('.bk_con_l_con_t_xk').hover(function(){
	$(this).addClass("sel_bk")            
		   .siblings('.bk_con_l_con_t_xk').removeClass("sel_bk");  
	var index =  $('.bk_con_l_con_t_xk').index(this);  

	$(this).parents(".bk_con_l_con_t").siblings('.bk_con_l_con_b').find('.bk_con_l_con_t_xk_con')    
		  .eq(index).show()   
		  .siblings('.bk_con_l_con_t_xk_con').hide(); 
  });

  //---Special effects
  $('.order_body').mouseover(function(){
	$(this).css({'font-size':'15px','text-indent':'10px'});
  }).mouseout(function(){
	$(this).css({'font-size':'17px','text-indent':'0px'});
  });

  $('.ziyuan_l_con_body_b_c').mouseover(function(){
	$(this).css({'font-size':'14px','text-indent':'5px'});
  }).mouseout(function(){
	$(this).css({'font-size':'12px','text-indent':'0px'});
  });

  $('.menu').mouseover(function(){
	$(this).css({'font-size':'16px'});
  }).mouseout(function(){
	$(this).css({'font-size':'14px'});
  });

});