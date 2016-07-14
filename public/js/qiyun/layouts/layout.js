var url = window.location.href.split('/');
switch (url[3]) {
    case '':
        url = 'index';
        break;
    case 'index':
        url = 'index';
        break;      
    case 'error':
        url = 'index';
        break;            
    case 'news':
        url = 'news';
        break;
    case 'resource':
        url = 'resource';
        break;
    case 'member':
        url = 'perSpace';
        break; 
    case 'research':
        url = 'research';
        break;
    case 'lessonDetail':
        url = 'research';
        break;    
    case 'microLesson':
        url = 'microLesson';
        break; 
    case 'perSpace':
        url = 'perSpace';
        break;
    default:
        url = 'index';
        break;
}
$('div[class=menu][name='+ url +']').addClass('menu_bg');

// $('.menu').click(function(){
// 	$(this).addClass('menu_bg');
//     $(this).parent().siblings().children('.menu').removeClass('menu_bg');
// });




//搜索下拉选择
$('.menu').mouseover(function(){
    $(this).css({'font-size':'16px'});
}).mouseout(function(){
    $(this).css({'font-size':'14px'});
});


// 搜索下拉列表
// $('.input').click(function () {
//         $(this).next('#sub').show();
//     });

$('.input').click(
    function () {
        $('#sub').toggle();
    }
);

$('#sub li').click(function () {
    $('.input').html($(this).text());
    $('#sub').hide();
    $('.hidden_value').html("<input type='hidden' name='searchType' value='"+$(this).text()+"' >");
});

$('#sub').find("li").mouseover(function(){
	   $(this).css({"background-color":"#E8E6E7","color":"#225697"});
	});
$('#sub').find("li").mouseout(function(){
	   $(this).css({"background-color":"#ffffff","color":"#626262"});
	});


$(document).click(function(e){
    $('#sub').hide();
});

$('.input').bind('click', function () {
    return false;
});

