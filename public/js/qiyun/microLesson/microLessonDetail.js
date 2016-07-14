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

  $('.pg').click(function(){
	$(this).addClass('pg_n').siblings().removeClass('pg_n');
  });
  
   // $('.de_con_graybg_fx').click(function(){
  	// $('.jiathis_style').show();
   // });

  

   // $('.de_con_graybg_fx').toggle(
   // 		function(){
   //          $('.jiathis_style').show();
   //      }, 
   //      function(){
   //          $('.jiathis_style').hide();
   //      }
   //  );

    $(".de_con_graybg_fx").click(function(){
        $(".jiathis_style").toggle();
    });


});