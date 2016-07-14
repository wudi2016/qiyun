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

  $('.li_sel_xk_d_cn').click(function(){
    // $(this).addClass("sel").siblings('.li_sel_xk_d_cn').removeClass("sel");
    $(this).parents('.li_sel_con').find('.li_sel_xk_d_cn').removeClass("sel");
    $(this).addClass("sel");
  });

  // $('.li_con_r_top_ls').click(function(){
  //   $(this).addClass('btm').siblings().removeClass('btm');
  // });

  $('.li_con_r_or_d').click(function(){
    $(this).addClass('li_con_r_or_d_2').siblings().removeClass('li_con_r_or_d_2');
  });
  
  $('.pg').click(function(){
    $(this).addClass('pg_n').siblings().removeClass('pg_n');
  });

  //select
  // $('.li_sel_xk_d_m').click(function () {
  //       $(this).parent().siblings('.li_sel_xk_m').slideToggle('1000');   
  // });

  // $('.li_sel_xk_d_m').toggle(
  //   function(){
  //      $(this).children('.jt').html('▲');
  //   },
  //   function(){
  //      $(this).children('.jt').html('▼');
  //   }
  // );




  // 层叠下拉菜单

  // $('.li_con_l_list_nm').click(function () {
  //       $(this).next('.li_con_l_list_cont').slideToggle();   
  // }); 
  
  // $('.li_con_l_list_nm').toggle(
  //   function(){
  //      $(this).children('.jt2').html('▲');
  //   },
  //   function(){
  //      $(this).children('.jt2').html('▼');
  //   }
  // );

  // $('.li_con_l_list_cont_d').click(function(){
  //    $('.li_con_l_list_cont_d').removeClass("li_con_l_list_cont_d_2");
  //    $(this).addClass("li_con_l_list_cont_d_2");
  // });