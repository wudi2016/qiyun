$(function () {
	var div = $('div[class=makeGroup_contentBlock_content_block_right]');

	$('div[class=makeGroup_contentBlock_content_block_right]').find('button').click(function () {
		var groupType = div.find('input[type=radio][name=groupType]').is(':checked');
		var gourpImg  = document.getElementById("uploadImage").files[0];
		//var joinMethod = div.find('input[type=radio][name=joinMethod]').is(':checked');
		var groupName = div.eq(0).find('input').val();
		var groupDesc = div.eq(3).find('textarea').val();
		if (!groupName.match(/^[\u4E00-\u9FA50-9A-Za-z]+$/)) {
			div.eq(0).find('div').html('请填写正确名称');
			return false;
		}
		if (!gourpImg) {
			div.eq(1).find('.makeGroup_contentBlock_content_block_right_danger').html('请选择教封面');
			return false;            
		}
		if (!groupType) {
			div.eq(2).find('div').html('请选择教研组属性');
			return false;
		}
		//if (!joinMethod) {
		//	div.eq(3).find('div').html('请选择加入方式');
		//	return false;
		//}
		// if (!groupDesc.match(/^[\u4E00-\u9FA50-9A-Za-z]+$/)) {
		// 	div.eq(3).find('div').html('请选择教研组简介');
		// 	return false;
		// }
	});

	div.find('input[type=text]').focus(function () {
		$(this).parent().find('div[class=makeGroup_contentBlock_content_block_right_danger]').html('');
	});

	div.find('input[type=radio]').click(function () {
		$(this).parent().find('div[class=makeGroup_contentBlock_content_block_right_danger]').html('');
	});

	div.find('textarea').focus(function () {
		$(this).parent().find('div[class=makeGroup_contentBlock_content_block_right_danger]').html('');
	});
    
	// 私密的隐藏

 //   	$('#radio_1').click(function(){
	// 	if($("#radio_1").is(":checked")){  
	// 	    $("#hideshow").hide(); 
	// 	}
	// });

	// $('#radio_2').click(function(){
	// 	if($("#radio_2").is(":checked")){
	// 		$("#hideshow").show();
	// 	}
	// })



});