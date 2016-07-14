<?php

namespace App\Http\Controllers\qiyun\admin\evaluation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\evaluation\evaluationRequest;

class EvaluationController extends Controller
{
    /**
     *评课列表
     */
    public function evaluationList(Request $request){
        $query = DB::table('evaluat as ev');
        if($request['type'] == 1){
            $query = $query->where('ev.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据评课名称查询
            $query = $query->where('ev.evaluatName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('ev.evaluatAuthor','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){
            $query = $query->where('ev.evaluatCreate','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){
            $query = $query->where('s.sectionName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluatType as t','ev.evaluatType','=','t.id')
            ->leftJoin('studysection as s','ev.evaluatSection','=','s.id')
            ->leftJoin('studysubject as b','ev.evaluatSubject','=','b.id')
            ->leftJoin('studyedition as e','ev.evaluatEdition','=','e.id')
            ->leftJoin('studygrade as g','ev.evaluatGrade','=','g.id')
            ->leftJoin('chapter as c','ev.evaluatChapter','=','c.id')
            ->leftJoin('evaluaTemp as temp','ev.evaluatTmpId','=','temp.id')
            ->select('ev.*','t.evaluatTypeName','s.sectionName','b.subjectName','e.editionName','g.gradeName','c.chapterName','temp.evaluatTmpName')
            ->orderBy('ev.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluationList',['data'=>$data]);
    }

    /**
     * 评课编辑页
     */
    public function editEvaluation($id){
        $data = DB::table('evaluat as ev')
            ->leftJoin('evaluatType as t','ev.evaluatType','=','t.id')
            ->leftJoin('studysection as s','ev.evaluatSection','=','s.id')
            ->leftJoin('studysubject as b','ev.evaluatSubject','=','b.id')
            ->leftJoin('studyedition as e','ev.evaluatEdition','=','e.id')
            ->leftJoin('studygrade as g','ev.evaluatGrade','=','g.id')
            ->leftJoin('chapter as c','ev.evaluatChapter','=','c.id')
            ->leftJoin('evaluaTemp as temp','ev.evaluatTmpId','=','temp.id')
            ->select('ev.*','t.evaluatTypeName','s.sectionName','b.subjectName','e.editionName','g.gradeName','c.chapterName','temp.evaluatTmpName')
            ->where('ev.id',$id)
            ->first();
        $data->evaluatTypes = DB::table('evaluatType')->where('status',0)->select('id','evaluatTypeName')->get();
        $data->sections = DB::table('studysection')->where('parentId',1)->get();
        $data->subjects = DB::table('studysubject')->where('parentId',$data->evaluatSection)->get();
        $data->editions = DB::table('studyedition')->where('parentId',$data->evaluatSubject)->get();
        $data->grades = DB::table('studygrade')->where('parentId',$data->evaluatEdition)->get();
//        $data->chapters = DB::table('chapter')->where('parentGradeId',$data->evaluatGrade)->get();
        $data->chapters = DB::select("select * from chapter where parentGradeId = ? order by concat(path,'-',id)",[$data->evaluatGrade]);
        foreach($data->chapters as &$val){
            $pre = '';
            $num = explode('-',$val->path);
            for($i=1;$i<count($num);$i++){
                $pre .= '|----';
            }
            $val->chapterName = $pre.($val->chapterName);
        }
        $data->evaluatTmpNames = DB::table('evaluaTemp')->select('id','evaluatTmpName')->get();
        return view('qiyun.admin.evaluation.editEvaluation',['data'=>$data]);
    }

    /**
     *评课编辑
     */
    public function doEditEvaluation(evaluationRequest $request){
        $data = $request->except('_token','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(strtotime($request['beginTime']) > strtotime($request['endTime'])){
            return redirect()->back()->withInput()->withErrors('结束时间必须大于开始时间');
        }
        if($request->hasFile('evaluatPic')){ //判断文件是否存在
            if($request->file('evaluatPic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('evaluatPic')->getClientOriginalName();//获取图片名
                $entension = $request->file('evaluatPic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('evaluatPic')->move('./image/qiyun/research/makeGroup',$newname)){
                    $data['evaluatPic'] = './image/qiyun/research/makeGroup/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('evaluat')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课修改失败');
        }
    }

    /**
     * 删除评课
     */
    public function delEvaluation($id){
        $data = DB::table('evaluat')->where('id',$id)->delete();
        if($data){
            DB::table('evaluaCourseware')->where('parentId',$id)->delete();//删除关联的课件
            $rrid = DB::table('evaluatComment')->where('evaluatId',$id)->select('id')->first();
            $rrid = $rrid->id;
            DB::table('evaluatComment')->where('evaluatId',$id)->delete();//删除关联的评论
            if(DB::table('evaluatCommentReply')->where('parentId',$rrid)->first()){
                DB::table('evaluatCommentReply')->where('parentId',$rrid)->delete();//删除评论的回复
            }
            return redirect('admin/message')->with(['status'=>'评课删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课删除失败');
        }
    }





    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课分类表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     * 评课分类列表
     */
    public function evaluatTypeList(Request $request){
        $query = DB::table('evaluatType');
        if($request['type'] == 1){
            $query = $query->where('id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('evaluatTypeName','like','%'.trim($request['search']).'%');
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatTypeList',['data'=>$data]);
    }

    /**
     *添加评课分类
     */
    public function addEvaluatType(){
        return view('qiyun.admin.evaluation.addEvaluatType');
    }

    /**
     *执行添加评课分类
     */
    public function doAddEvaluatType(Request $request){
        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatType')->insert($data)){
            return redirect('admin/message')->with(['status'=>'评课分类添加成功','redirect'=>'evaluation/evaluatTypeList']);
        }else{
            return redirect()->back()->withInput()->withErrors('评课分类添加失败');
        }
    }

    /**
     * 评课分类编辑页
     */
    public function editEvaluatType($id){
        $data = DB::table('evaluatType')->where('id',$id)->first();
        return view('qiyun.admin.evaluation.editEvaluatType',['data'=>$data]);
    }

    /**
     *评课分类编辑
     */
    public function doEditEvaluatType(Request $request){
        $data['evaluatTypeName'] = $request['evaluatTypeName'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatType')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课分类修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课分类修改失败');
        }
    }

    /**
     * 删除评课分类
     */
    public function delEvaluatType($id){
        $data = DB::table('evaluatType')->where('id',$id)->delete();
        if($data){
            $iid = DB::table('evaluat')->where('evaluatType',$id)->select('id')->first();
            if($iid){
                $iid = $iid->id;
                $eid = DB::table('evaluat')->where('evaluatType',$id)->delete();//删除分类下的评课
                if($eid){
                    DB::table('evaluaCourseware')->where('parentId',$iid)->delete();//删除关联的课件
                    $rrid = DB::table('evaluatComment')->where('evaluatId',$iid)->select('id')->first();
                    $rrid = $rrid->id;
                    $rid = DB::table('evaluatComment')->where('evaluatId',$iid)->delete();//删除关联的评论
                    if($rid){
                        DB::table('evaluatCommentReply')->where('parentId',$rrid)->delete();//删除评论的回复
                    }
                }
            }
            return redirect('admin/message')->with(['status'=>'评课分类删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课分类删除失败');
        }
    }





    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课课件表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *课件列表
     */
    public function evaluatCoursewareList(Request $request){
        $query = DB::table('evaluaCourseware as c');
        if($request['type'] == 1){ //根据自增id查询
            $query = $query->where('c.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据评课名查询
            $query = $query->where('e.evaluatName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据课件名查询
            $query = $query->where('c.evaluatCourseName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluat as e','c.parentId','=','e.id')
            ->select('c.*','e.evaluatName')
            ->orderBy('c.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatCoursewareList',['data'=>$data]);
    }

    /**
     * 课件编辑页
     */
    public function editEvaluatCourseware($id){
        $data = DB::table('evaluaCourseware as c')
            ->leftJoin('evaluat as e','c.parentId','=','e.id')
            ->where('c.id',$id)
            ->select('c.*','e.evaluatName')
            ->first();
        $data->evaluatNames = DB::table('evaluat')->select('id','evaluatName')->get();
        return view('qiyun.admin.evaluation.editEvaluatCourseware',['data'=>$data]);
    }

    /**
     *课件编辑
     */
    public function doEditEvaluatCourseware(Request $request){
        $data['parentId'] = $request['parentId'];
        $data['evaluatCourseName'] = $request['evaluatCourseName'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('evaluatPath')){ //判断文件是否存在
            if($request->file('evaluatPath')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('evaluatPath')->getClientOriginalName();//获取图片名
                $entension = $request->file('evaluatPath')->getClientOriginalExtension();//上传文件的后缀
                $data['evaluatFomat'] = $entension;
                $size = $request->file('evaluatPath')->getSize();//获取文件大小
                $size =round($size/1024) ;
                $data['evaluatSize'] = $size;
                $data['evaluatFomat'] = $entension;
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('evaluatPath')->move('/image/qiyun/research/makeGroup',$newname)){
                    $data['evaluatPath'] = '/image/qiyun/research/makeGroup/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('evaluaCourseware')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课课件修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课课件修改失败');
        }
    }

    /**
     * 删除课件
     */
    public function delEvaluatCourseware($id){
        $data = DB::table('evaluaCourseware')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课课件删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课课件删除失败');
        }
    }





    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课评论表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评课评论列表
     */
    public function evaluatCommentList(Request $request){
        $query = DB::table('evaluatComment as c');
        if($request['type'] == 1){ //根据评论自增id
            $query = $query->where('c.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){  //根据评课名称
            $query = $query->where('e.evaluatName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据评论用户查询
            $query = $query->where('c.username','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluat as e','c.evaluatId','=','e.id')
            ->select('c.*','e.evaluatName')
            ->orderBy('c.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatCommentList',['data'=>$data]);
    }

    /**
     * 评论编辑页
     */
    public function editEvaluatComment($id){
        $data = DB::table('evaluatComment as c')
            ->leftJoin('evaluat as e','c.evaluatId','=','e.id')
            ->where('c.id',$id)
            ->select('c.*','e.evaluatName')
            ->first();
        $data->evaluatNames = DB::table('evaluat')->select('id','evaluatName')->get();
        return view('qiyun.admin.evaluation.editEvaluatComment',['data'=>$data]);
    }

    /**
     *评论编辑
     */
    public function doEditEvaluatComment(Request $request){
        $data['commentContent'] = $request['commentContent'];
        $data['evaluatId'] = $request['evaluatId'];
        $data['username'] = $request['username'];
        $data['checks'] = $request['checks'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatComment')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课评论修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课评论修改失败');
        }
    }

    /**
     * 删除评论
     */
    public function delEvaluatComment($id){
        $data = DB::table('evaluatComment')->where('id',$id)->delete();
        if($data){
            DB::table('evaluatCommentReply')->where('parentId',$id)->delete();
            return redirect('admin/message')->with(['status'=>'评课评论删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课评论删除失败');
        }
    }




    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课评论回复表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评论回复列表
     */
    public function evaluatCommentReplyList(Request $request){
        $query = DB::table('evaluatCommentReply as r');
        if($request['type'] == 1){
            $query = $query->where('r.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据评论内容查询
            $query = $query->where('c.commentContent','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据评论回复内容查询
            $query = $query->where('r.commentContent','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据评论回复用户
            $query = $query->where('r.username','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluatComment as c','r.parentId','=','c.id')
            ->select('r.*','c.commentContent as comments')
            ->orderBy('r.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatCommentReplyList',['data'=>$data]);
    }

    /**
     * 评论回复编辑页
     */
    public function editEvaluatCommentReply($id){
        $data = DB::table('evaluatCommentReply as r')
            ->leftJoin('evaluatComment as c','r.parentId','=','c.id')
            ->where('r.id',$id)
            ->select('r.*','c.commentContent as comments')
            ->first();
        $data->comments = DB::table('evaluatComment')->select('id','commentContent')->get();
        return view('qiyun.admin.evaluation.editEvaluatCommentReply',['data'=>$data]);
    }

    /**
     *评论回复编辑
     */
    public function doEditEvaluatCommentReply(Request $request){
        $data['commentContent'] = $request['commentContent'];
        $data['parentId'] = $request['parentId'];
        $data['username'] = $request['username'];
        $data['checks'] = $request['checks'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatCommentReply')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课评论回复修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课评论回复修改失败');
        }
    }

    /**
     * 删除评论回复
     */
    public function delEvaluatCommentReply($id){
        $data = DB::table('evaluatCommentReply')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课评论回复删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课评论回复删除失败');
        }
    }




    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课打分结果表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评课打分结果列表
     */
    public function evaluatResultList(Request $request){
        $query = DB::table('evaluaResult as r');
        if($request['type'] == 1){
            $query = $query->where('r.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('e.evaluatName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluat as e','r.evaluatId','=','e.id')
            ->leftJoin('evaluatTmpContent as t','r.evaluatIdTmpContentId','=','t.id')
            ->select('r.*','e.evaluatName','t.evaluatTmpContentName')
            ->orderBy('r.id','desc')
            ->paginate(15);
        foreach ($data as &$val) {
            $count = DB::table('evaluaResult')->where('evaluatId',$val->evaluatId)->count();
            $avgsore = 100 / $count;//每项的总分
            $everyscore = $val->score / $val->nums;
            $val->scorepct = round((($everyscore / $avgsore) * 100),2).'%';
        }
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatResultList',['data'=>$data]);
    }

    /**
     * 评课打分结果编辑页
     */
    public function editEvaluatResult($id){
        $data = DB::table('evaluaResult as r')
            ->leftJoin('evaluat as e','r.evaluatId','=','e.id')
            ->leftJoin('evaluatTmpContent as t','r.evaluatIdTmpContentId','=','t.id')
            ->where('r.id',$id)
            ->select('r.*','e.evaluatName','t.evaluatTmpContentName')
            ->first();
        $data->evaluatNames = DB::table('evaluat')->select('id','evaluatName')->get();
        $data->evaluatTmpContentNames = DB::table('evaluatTmpContent')->select('id','evaluatTmpContentName')->get();
        return view('qiyun.admin.evaluation.editEvaluatResult',['data'=>$data]);
    }

    /**
     *评课打分结果编辑
     */
    public function doEditEvaluatResult(Request $request){
        $this->validate($request,[
           'score'=>'numeric',
            'nums'=>'integer'
        ], [
            'score.numeric'=>'分数必须是数值型并且小数点后只会为您保留一位小数',
            'nums.integer'=>'参与人数必须是整型'
        ]);
        $count = DB::table('evaluaResult')->where('evaluatId',$request['evaluatId'])->count();
        $avgsore = round((100 / $count) * $request['nums'],2);//每项的总分
        if($request['score'] > $avgsore){
            return redirect()->back()->withInput()->withErrors('根据参与人数及此评课的总项数统计出此项分数请不要超过'.$avgsore);
        }
        $data['evaluatId'] = $request['evaluatId'];
        $data['evaluatIdTmpContentId'] = $request['evaluatIdTmpContentId'];
        $data['nums'] = $request['nums'];
        $data['score'] = $request['score'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluaResult')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课打分结果修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课打分结果修改失败');
        }
    }

    /**
     * 删除评课打分结果
     */
    public function delEvaluatResult($id){
        $data = DB::table('evaluaResult')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课打分结果删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课打分结果删除失败');
        }
    }




    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课模板表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评课模板列表
     */
    public function evaluatTempList(Request $request){
        $query = DB::table('evaluaTemp');
        if($request['type'] == 1){
            $query = $query->where('id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据模板名查询
            $query = $query->where('evaluatTmpName','like','%'.trim($request['search']).'%');
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatTempList',['data'=>$data]);
    }

    /**
     * 评课模板编辑页
     */
    public function editEvaluatTemp($id){
        $data = DB::table('evaluaTemp')->where('id',$id)->first();
        return view('qiyun.admin.evaluation.editEvaluatTemp',['data'=>$data]);
    }

    /**
     *评课模板编辑
     */
    public function doEditEvaluatTemp(Request $request){
        $data['evaluatTmpName'] = $request['evaluatTmpName'];
        $data['evaluatTmpUsername'] = $request['evaluatTmpUsername'];
        $data['evaluatTmpState'] = $request['evaluatTmpState'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluaTemp')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课模板修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课模板修改失败');
        }
    }

    /**
     * 删除评课模板
     */
    public function delEvaluatTemp($id){
        $data = DB::table('evaluaTemp')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课模板删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课模板删除失败');
        }
    }



    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课模板对应选项标准表管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评课模板对应选项标准列表
     */
    public function evaluatTmpContentList(Request $request){
        $query = DB::table('evaluatTmpContent as c');
        if($request['type'] == 1){
            $query = $query->where('c.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('t.evaluatTmpName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('c.evaluatTmpContentName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluaTemp as t','c.parentId','=','t.id') //关联评课模板表
            ->select('c.*','t.evaluatTmpName')
            ->orderBy('c.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatTmpContentList',['data'=>$data]);
    }

    /**
     * 评课模板对应选项标准编辑页
     */
    public function editEvaluatTmpContent($id){
        $data = DB::table('evaluatTmpContent as c')
            ->leftJoin('evaluaTemp as t','c.parentId','=','t.id')
            ->where('c.id',$id)
            ->select('c.*','t.evaluatTmpName')
            ->first();
        $data->evaluatTmpNames = DB::table('evaluaTemp')->select('id','evaluatTmpName')->get();
        return view('qiyun.admin.evaluation.editEvaluatTmpContent',['data'=>$data]);
    }

    /**
     *评课模板对应选项标准编辑
     */
    public function doEditEvaluatTmpContent(Request $request){
        $data['parentId'] = $request['parentId'];
        $data['evaluatTmpContentName'] = $request['evaluatTmpContentName'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatTmpContent')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课模板对应选项标准修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课模板对应选项标准修改失败');
        }
    }

    /**
     *删除评课模板对应选项标准
     */
    public function delEvaluatTmpContent($id){
        $data = DB::table('evaluatTmpContent')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课模板对应选项标准删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课模板对应选项标准删除失败');
        }
    }



    //
    //----------------------------------------------------------------------------------------
    //------------------------------------评课成员管理---------------------------------------
    //----------------------------------------------------------------------------------------
    //
    /**
     *评课成员列表
     */
    public function evaluatMemberList(Request $request){
        $query = DB::table('evaluatMember as m');
        if($request['type'] == 1){
            $query = $query->where('m.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('e.evaluatName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('evaluat as e','m.parentId','=','e.id')
            ->leftJoin('users as u','m.userId','=','u.id')
            ->select('m.*','e.evaluatName','u.realname')
            ->orderBy('m.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.evaluation.evaluatMemberList',['data'=>$data]);

    }

    /**
     * 编辑评课成员
     */
    public function editEvaluatMember($id){
        $data = DB::table('evaluatMember as m')
            ->leftJoin('evaluat as e','m.parentId','=','e.id')
            ->leftJoin('users as u','m.userId','=','u.id')
            ->select('m.*','e.evaluatName','u.realname')
            ->where('m.id',$id)
            ->first();
        $data->evaluatNames = DB::table('evaluat')->select('id','evaluatName')->get();
        return view('qiyun.admin.evaluation.editEvaluatMember',['data'=>$data]);
    }

    /**
     *执行编辑
     */
    public function doEditEvaluatMember(Request $request){
        $data = $request->except('_token','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('evaluatMember')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'评课成员修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课成员修改失败');
        }
    }

    /**
     *删除评课成员
     */
    public function delEvaluatMember($id){
        $data = DB::table('evaluatMember')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'评课成员删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('评课成员删除失败');
        }
    }
}
