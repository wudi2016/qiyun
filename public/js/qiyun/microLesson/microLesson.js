$(function () {

	$('div[class=microLesson_contentBlock_content_recommend_image]').hover(function () {
		$(this).find('div[class=microLesson_contentBlock_content_recommend_image_bottomText]').css('display','none');
		$(this).find('div[class=microLesson_contentBlock_content_recommend_image_position]').css('display','block');
	}, function () {
		$(this).find('div[class=microLesson_contentBlock_content_recommend_image_bottomText]').css('display','block');
		$(this).find('div[class=microLesson_contentBlock_content_recommend_image_position]').css('display','none');
	});

	$('div[id=recommend]').mouseover(function () {
		$(this).siblings().removeClass('microLesson_contentBlock_title_block_active');
		$(this).addClass('microLesson_contentBlock_title_block_active');
		var type = $(this).attr('type');
		$('div[id=recommendContent]').css('display','none');
		$('div[id=recommendContent][type='+type+']').css('display','block');
	});

	$('div[id=bySchool]').click(function () {
		$(this).siblings().removeClass('microLesson_contentBlock_title_block_active');
		$(this).addClass('microLesson_contentBlock_title_block_active');
		// var type = $(this).attr('type');
		// $('div[class=microLesson_contentBlock_navigation][id=bySchool_navigation]').css('display','none');
		// $('div[class=microLesson_contentBlock_navigation][id=bySchool_navigation][type='+type+']').css('display','block');
		// $('div[id=bySchool_content]').css('display','none');
		// $('div[id=bySchool_content][type='+type+']').css('display','block');  
	});

	$('div[id=bySchool_navigation][class=microLesson_contentBlock_navigation]').find('div').click(function () {
		$(this).siblings().removeClass('microLesson_contentBlock_navigation_block_active');
		$(this).addClass('microLesson_contentBlock_navigation_block_active');
	});

});