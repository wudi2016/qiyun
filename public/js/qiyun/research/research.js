$(function() {

	$('div[id=moreByLesson]').mouseover(function () {
		var type = $(this).attr('type');
		$(this).parent().find('div[id=moreByLesson]').removeClass('research_contentBlock_title_moreByLesson_active');
		$(this).addClass('research_contentBlock_title_moreByLesson_active');
		$('div[class=research_contentBlock_content][id=moreByLesson_content]').css('display','none');
		$('div[id=moreByLesson_content][type='+type+']').css('display','block');
	});

});