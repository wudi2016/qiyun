@extends('qiyun.layouts.layoutHome')

@section('title','创建教研组')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/makeGroup.css') }}">
	<script>
		oFReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

			oFReader.onload = function (oFREvent) {
				// alert(document.getElementById("uploadImage").files[0].name);
				// document.getElementById("uploadPreview").src = oFREvent.target.result;
				$("#uploadPreview").html(document.getElementById("uploadImage").files[0].name);
			};

			function loadImageFile() {
				$('.cc').html('');

				if (document.getElementById("uploadImage").files.length === 0) { return; }
				var oFile = document.getElementById("uploadImage").files[0];
		  if (!rFilter.test(oFile.type)) { alert("You must select a valid image file!"); return; }
		  oFReader.readAsDataURL(oFile);
		}
	</script>
@endsection

@section('content')
	<div class="clear"></div>
	<div class="posi">
		<a href="">
			<div class="li_home"></div>
		</a>
		<a href="">
			<div class="li_nxt"> 教研备课 > 教研协作组 > 创建协作组 </div>
		</a>
	</div>
	<!--  公共banner  -->
	<div id="makeGroup_banner"></div>


	<div style="height:50px"></div>



	<!--  创建教研组  -->
	<div id="makeGroup_contentBlock" onload="loadImageFile();">
		<div class="makeGroup_contentBlock_title">
			<div class="makeGroup_contentBlock_title_block" style="background-position: 0% 9.6%;"></div>
			<div class="makeGroup_contentBlock_title_text">创建协作组</div>
			
		</div>
		<div class="makeGroup_contentBlock_line"></div>

		<form class="makeGroup_contentBlock_content" action="/research/addGroup" method="post"  enctype="multipart/form-data"  >
			<div style="height:30px;"></div>
			<div class="makeGroup_contentBlock_content_block">
				<div class="makeGroup_contentBlock_content_block_left">协作组名称</div>
				<div class="makeGroup_contentBlock_content_block_right">
					<input type="text" name="name" >
					<div class="makeGroup_contentBlock_content_block_right_danger"></div>
				</div>
			</div>
			<div style="height:20px;"></div>


			<div class="makeGroup_contentBlock_content_block_left1">上传封面</div>
			<div class="makeGroup_contentBlock_content_block" style="height:50px;">
				
				<div class="makeGroup_contentBlock_content_block_right">
					<div>
						<img class="input_img"  style="height:30px" width="100px" src="{{asset('/image/qiyun/research/shangchuan.png')}}" alt="">
					<input id="uploadImage" type="file" name="myPhoto" onchange="loadImageFile();" />
					<div class="makeGroup_contentBlock_content_block_right_danger cc"></div>
				</div>
					<span id='uploadPreview'></span>
				</div>
			</div>



			<div class="makeGroup_contentBlock_content_block" style="height:80px;">
				<div class="makeGroup_contentBlock_content_block_left">协作组属性</div>
				<div class="makeGroup_contentBlock_content_block_right" style="height:80px;">
					<input type="radio" name="groupType" value="1" class="radio_1" id="radio_2"><span id="span_2">公开</span>
					<span id="span_1">全平台内任何成员都可以看到，可以设置成员的加入方式</span>
					<br>
					<input type="radio" name="groupType" value="0" class="radio_1" id="radio_1"> <span id="span_2">私密</span>
					<span  id="span_1">只有接受组员邀请才能加圈子，可以设置成员的加入方式</span>
				<div class="makeGroup_contentBlock_content_block_right_danger"></div>
				</div>
			</div>



		{{--<div style="height:20px;"></div>--}}
		{{--<div class="makeGroup_contentBlock_content_block" id="hideshow" >--}}
			{{--<div class="makeGroup_contentBlock_content_block_left">加入方式</div>--}}
			{{--<div class="makeGroup_contentBlock_content_block_right">--}}
				{{--<input type="radio" name="joinMethod" value="1" id="input_1"> <span id="span_1_1">任何人都可以加入</span>--}}
				{{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
				{{--<input type="radio" name="joinMethod" value="0" id="input_2"> <span id="span_1_2">审核后方可加入</span>--}}
				{{--<div class="makeGroup_contentBlock_content_block_right_danger"></div>--}}
			{{--</div>--}}
		{{--</div>--}}



		<div style="height:20px;"></div>
		<div class="makeGroup_contentBlock_content_block" style="height:160px;">
			<div class="makeGroup_contentBlock_content_block_left">协作组简介</div>
			<div class="makeGroup_contentBlock_content_block_right">
				<textarea  name="desc" id="textarea_desc" maxlength="200" placeholder="最多可输入200字" ></textarea>
				<!-- <div class="makeGroup_contentBlock_content_block_right_danger"></div> -->
				<div class="textarea_desc_error" id="textarea_desc_error" ></div>
			</div>
		</div>
		<div style="height:25px;"></div>
		<div class="makeGroup_contentBlock_content_block">
			<div class="makeGroup_contentBlock_content_block_right" >
				<button id="button_create">创建</button>
				<span id="button_reset">取消</span>
			</div>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@endsection

@section('js')
	<script>
		
		$('#button_create').click(function(){
			// var xx = $('#textarea_desc').val();
			// alert(xx);
			// return false;
			if($('#textarea_desc').val() == ''){
				var str = "<font color='red'>请填写教研组简介</font>";
				$('.textarea_desc_error').html(str);
				return false;
			}	
			
		})
		$('#button_reset').click(function(){
			location.href = '/research';
		})

	
	</script>

	<script type="text/javascript">
	    var status = {!! session('status') !!};
	    if(status == 1){
	        alert('请登录!');location.href = '/';
	    }else if(status == 2){
	        alert('抱歉，您不是教师!');
	    }else if(status == 3){
	        location.href = '/research/groupList';
	    }else{
	    	alert('创建失败!');
	    }
	</script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/research/makeGroup.js') }}"></script>
@endsection