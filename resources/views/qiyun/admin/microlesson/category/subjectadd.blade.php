@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    学科添加页面
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="{{url('admin/microlesson/addsubjectsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   学段名称  </label>
                        <div class="col-sm-9">
                            
                            <select name="section" id="section" class="col-xs-10 col-sm-5" style="width:150px">
                                <option value=""  selected>--学段名称--</option>
                                @foreach($section as $sections)
                                    <option value="{{$sections->id}}">{{$sections->sectionName}}</option>
                                @endforeach
                            </select>
                            
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>


                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   年级名称  </label>
                        <div class="col-sm-9">
                            
                            <select name="grade" id="grade" class="col-xs-10 col-sm-5" style="width:150px">
                                <option value=""  selected>--年级名称--</option>
                                
                            </select>
                            
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>



{{--              
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   学科名称  </label>
                        <div class="col-sm-9">
                            
                            <select name="subjectName" id="subject" class="col-xs-10 col-sm-5" style="width:150px" change="ost()">
                                <option value="0"  >--学科名称--</option>
                                <option value="语文"  > 语文 </option>
                                <option value="数学"  > 数学 </option>
                                <option value="英语"  > 英语 </option>
                            </select>
                            
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>
--}}                




                    <div class="space-4"></div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学科名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="subjectName" id="subject" placeholder="请填写正确名称，如('语文','数学'  等)" class="col-xs-10 col-sm-5" value=""  onblur="ost()"; />
                            <span class="subject_span" ></span>
                        </div>

                    </div>

                    <div class="space-4"></div>




                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection


@section('js')

    <script language="javascript" type="text/javascript">
        //  学段 -- 年级
        $(function(){
            $('#section').change(function(){
            var sectionid = $('#section').val();
                $.ajax({
                    type:'get',
                    data:{'id':sectionid},
                    url:'{{url('admin/microlesson/ajaxgrade')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">--年级--</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.gradeName+'</option>';
                        })
                        $('#grade').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            }) 
        })

        // 验证学科是否重复
        function ost(){
            var section = $("select[name='section'] option:checked").val();      
            var grade = $("select[name='grade'] option:checked").val();
            var subjectname = $('#subject').val();
                $.ajax({
                    type:'get',
                    data:{'subjectname':subjectname,'sectionid':section,'gradeid':grade},
                    url:'{{url('admin/microlesson/ajaxname')}}',
                    success:function(data){
                        if(data.status == true){
                            var str ='';
                            str = "<font color='red'>有相同名称的学科,请从新填写</font>";
                            $('.subject_span').html(str);
                            $('#subject').val('');
                        }else{
                            $('.subject_span').html('');
                        }    
                    },
                    dataType:'json',
                    'async':false
                });
            }
        

    </script>

@endsection