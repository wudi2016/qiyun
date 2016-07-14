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

  //select card
  $('.ziyuan_l_con_top_m_1 div').hover(function(){
    $(this).addClass("select")            
           .siblings().removeClass("select");  
    var index =  $('.ziyuan_l_con_top_m_1 div').index(this);  

    // alert($(this).parents(".ziyuan_l_con_top").siblings().attr('class'));

    $(this).parents(".ziyuan_l_con_top").siblings()    
          .eq(index).show()   
          .siblings('.ziyuan_l_con_body').hide(); 
  });

  $('.ziyuan_l_con_top_m_2 div').hover(function(){
    $(this).addClass("select")            
           .siblings().removeClass("select");  
    var index =  $('.ziyuan_l_con_top_m_2 div').index(this);  


    $(this).parents(".ziyuan_l_con_top").siblings()    
          .eq(index).show()   
          .siblings('.ziyuan_l_con_body').hide(); 
  });

  $('.ziyuan_l_con_top_m_3 div').hover(function(){
    $(this).addClass("select")            
           .siblings().removeClass("select");  
    var index =  $('.ziyuan_l_con_top_m_3 div').index(this);  


    $(this).parents(".ziyuan_l_con_top").siblings()    
          .eq(index).show()   
          .siblings('.ziyuan_l_con_body').hide(); 
  });

  $('.ziyuan_l_con_top_m_4 div').hover(function(){
    $(this).addClass("select")            
           .siblings().removeClass("select");  
    var index =  $('.ziyuan_l_con_top_m_4 div').index(this);  

    // alert(index);

    $(this).parents(".ziyuan_l_con_top").siblings()    
          .eq(index).show()   
          .siblings('.ziyuan_l_con_body').hide(); 
  });

  //---Special effects
  $('.order_body').mouseover(function(){
    $(this).css({'font-size':'14px','text-indent':'10px'});
  }).mouseout(function(){
    $(this).css({'font-size':'14px','text-indent':'0px'});
  });

  $('.ziyuan_l_con_body_b_c').mouseover(function(){
    $(this).css({'font-size':'14px','text-indent':'5px'});
  }).mouseout(function(){
    $(this).css({'font-size':'14px','text-indent':'0px'});
  });

