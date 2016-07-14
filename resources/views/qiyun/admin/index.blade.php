 @extends('qiyun.layouts.layoutAdmin')
 @section('content')
   <div class="page-content">
     <div class="page-header">
       <h1>
         控制台
         <small>
           <i class="icon-double-angle-right"></i>
           查看
         </small>
       </h1>
     </div><!-- /.page-header -->

     <div class="row">
       <div class="col-xs-12" style="text-align: center">
         <!-- PAGE CONTENT BEGINS -->
         <div class="alert alert-block alert-success">
           <button type="button" class="close" data-dismiss="alert">
             <i class="icon-remove"></i>
           </button>

           <i class="icon-ok green"></i>

           欢迎使用
           <strong class="green">
             启创教育云平台后台管理系统
             <small></small>
           </strong>
         </div>
         {{--<div style="background: red;">gg--}}
           <img src="{{asset('admin/images/index.jpg')}}" />
         {{--</div>--}}


         <!-- PAGE CONTENT ENDS -->
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div>
 @endsection