//点击省级id查出此省级下的所有市级
$('#organize').change(function(){
    $('#countyname').find('.county').remove();
    $('#schoolgrade').find('.grade').remove();
    $('#schoolclass').find('.class').remove();
    $('#schoolsubject').find('.sub').remove();
    var organizeid = $('#organize').val();
    $.ajax({
            type:'get',
            data:{'id':organizeid},
            url:'/admin/school/city',
        success:function(data){
        var str = '<option value="">--所在市--</option>';
        $.each(data,function(i,val){
            str += '<option value="'+val.id+'">'+val.city_name+'</option>';
        })
        $('#cityname').html(str);

    },
    dataType:'json',
        'async':false
});
})
//点击市级时查出此市级下的所有区县
$('#cityname').change(function(){
    $('#schoolgrade').find('.grade').remove();
    $('#schoolclass').find('.class').remove();
    $('#schoolsubject').find('.sub').remove();
    var cityid = $('#cityname').val();
    $.ajax({
            type:'get',
            data:{'id':cityid},
            url:'/admin/school/county',
        success:function(data){
        var str = '<option value="">--所在区县--</option>';
        $.each(data,function(i,val){
            str += '<option class="county" value="'+val.id+'">'+val.county_name+'</option>';
        })
        $('#countyname').html(str);

    },
    dataType:'json',
        'async':false
});
})
//点击区县时查出此区县下的所有学校
$('#countyname').change(function(){
    $('#schoolgrade').find('.grade').remove();
    $('#schoolclass').find('.class').remove();
    $('#schoolsubject').find('.sub').remove();
    var countyid = $('#countyname').val();
    $.ajax({
            type:'get',
            data:{'id':countyid},
            url:'/admin/school/schools',
        success:function(data){
        var str = '<option value="">--学校--</option>';
        $.each(data,function(i,val){
            str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
        })
        $('#school').html(str);

    },
    dataType:'json',
        'async':false
});
})

//点击省级时查出此省级下的学校
$('#organize').change(function(){
    var organizeid = $('#organize').val();
    $.ajax({
            type:'get',
            data:{'id':organizeid},
            url:'/admin/school/organizeschools',
        success:function(data){
        var str = '<option value="">--学校--</option>';
        $.each(data,function(i,val){
            str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
        })
        $('#school').html(str);

    },
    dataType:'json',
        'async':false
});
})

//点击市级时查出此市级下的学校
$('#cityname').change(function(){
    var citynameid = $('#cityname').val();
    $.ajax({
            type:'get',
            data:{'id':citynameid},
            url:'/admin/school/citychools',
        success:function(data){
        var str = '<option value="">--学校--</option>';
        $.each(data,function(i,val){
            str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
        })
        $('#school').html(str);

    },
    dataType:'json',
        'async':false
});
})