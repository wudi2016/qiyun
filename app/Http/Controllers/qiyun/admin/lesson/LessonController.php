<?php

namespace App\Http\Controllers\qiyun\admin\lesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\lesson\lessonSubjectRequest;
use App\Http\Requests\lesson\lessonTotalRequest;
use App\Http\Requests\lesson\lessonArticleRequest;

class LessonController extends Controller
{
    /**
     *协同备课列表
     */
    public function lessonSubjectList(Request $request){
        $query = DB::table('lessonsubject as ls');
        if($request['type'] == 1){
            $query = $query->where('ls.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('ls.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('ls.lessonSubjecAuthor','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('studysection as s','ls.lessonSection','=','s.id')
            ->leftJoin('studysubject as b','ls.lessonSubject','=','b.id')
            ->leftJoin('studyedition as e','ls.lessonEdition','=','e.id')
            ->leftJoin('studygrade as g','ls.lessonGrade','=','g.id')
            ->leftJoin('chapter as c','ls.lessonChapter','=','c.id')
            ->leftJoin('techresearch as t','ls.techResearch','=','t.id')
            ->select('ls.*','s.sectionName','b.subjectName','e.editionName','g.gradeName','c.chapterName','t.techResearchName')
            ->orderBy('ls.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonSubjectList',['data'=>$data]);
    }

    /**
     * 协同备课表编辑页
     */
    public function lessonSubjectEdit($id){
        $data = DB::table('lessonsubject as ls')
            ->leftJoin('studysection as s','ls.lessonSection','=','s.id')
            ->leftJoin('studysubject as b','ls.lessonSubject','=','b.id')
            ->leftJoin('studyedition as e','ls.lessonEdition','=','e.id')
            ->leftJoin('studygrade as g','ls.lessonGrade','=','g.id')
            ->leftJoin('chapter as c','ls.lessonChapter','=','c.id')
            ->leftJoin('techresearch as t','ls.techResearch','=','t.id')
            ->select('ls.*','s.sectionName','b.subjectName','e.editionName','g.gradeName','c.chapterName','t.techResearchName')
            ->where('ls.id',$id)
            ->first();
        $data->sections = DB::table('studysection')->where('parentId',1)->get();
        $data->subjects = DB::table('studysubject')->where('parentId',$data->lessonSection)->get();
        $data->editions = DB::table('studyedition')->where('parentId',$data->lessonSubject)->get();
        $data->grades = DB::table('studygrade')->where('parentId',$data->lessonEdition)->get();
//        $data->chapters = DB::table('chapter')->where('parentGradeId',$data->lessonGrade)->orderBy('concat(path,"-",id)')->get();
        $data->chapters = DB::select("select * from chapter where parentGradeId = ? order by concat(path,'-',id)",[$data->lessonGrade]);
        foreach($data->chapters as &$val){
            $pre = '';
            $num = explode('-',$val->path);
            for($i=1;$i<count($num);$i++){
                $pre .= '|----';
            }
            $val->chapterName = $pre.($val->chapterName);
        }
        $data->themenames = DB::table('techresearch')->select('id','techResearchName')->get();
        return view('qiyun.admin.lesson.editLessonSubject',['data'=>$data]);

    }

    /**
     *协同备课编辑
     */
    public function dolessonSubjectEdit(lessonSubjectRequest $request){
        $data = $request->except('_token','urlPath');//过滤
        if(strtotime($request['beginTime']) > strtotime($request['endTime'])){
            return redirect()->back()->withInput()->withErrors('结束时间必须大于开始时间');
        }
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('pic')){ //判断文件是否存在
            if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('pic')->getClientOriginalName();//获取图片名
                $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('pic')->move('./image/qiyun/research/makeGroup',$newname)){
                    $data['pic'] = '/image/qiyun/research/makeGroup/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('lessonsubject')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课修改失败');
        }
    }

    /**
     * 接收ajax传过来的学段查出此学段下所有的学科
     */
    public function subject(Request $request){
        $data = DB::table('studysubject')->where('parentId',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     * 接收ajax传过来的学科查出此学科下所有的版本
     */
    public function edition(Request $request){
        $data = DB::table('studyedition')->where('parentId',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的版本查出此版本下的所有的年级册别
     */
    public function grade(Request $request){
        $data = DB::table('studygrade')->where('parentId',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的年级册别查出此年级册别下的所有的章节
     */
    public function chapter(Request $request){
//        $data = DB::table('chapter')->where('parentGradeId',$request['id'])->get();
        $data = DB::select("select * from chapter where parentGradeId = ? order by concat(path,'-',id)",[$request['id']]);
        foreach($data as &$val){
            $pre = '';
            $num = explode('-',$val->path);
            for($i=1;$i<count($num);$i++){
                    $pre .= '|----';
            }
            $val->chapterName = $pre.($val->chapterName);
        }
        echo json_encode($data);
    }


    /**
     * 删除协同备课
     */
    public function delLessonSubject($id){
        $data = DB::table('lessonsubject')->where('id',$id)->delete();
        if($data){
            //删除备课下的相关数据
            DB::table('lessonsubjects')->where('parentId',$id)->delete();//删除共案
            DB::table('lessonsubject_article')->where('lessonId',$id)->delete();//删除文章
            DB::table('lessonsubject_image')->where('lessonId',$id)->delete();//删除图片
            DB::table('lessonsubject_video')->where('lessonId',$id)->delete();//删除音视频
            DB::table('lessonsubject_resource')->where('lessonId',$id)->delete();//删除资源
            return redirect('admin/message')->with(['status'=>'协同备课表删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课删除失败');
        }
    }





    //----------------------------------------------------------------------------
    //--------------------协同备课共案管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 共案列表页
     */
    public function lessonTotalList(Request $request){
        $query = DB::table('lessonsubjects as s');
        if($request['type'] == 1){ //根据自增id查询
            $query = $query->where('s.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据备课名
            $query = $query->where('t.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据共案名
            $query = $query->where('s.lessonName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据编辑人
            $query = $query->where('s.editerName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('lessonsubject as t','s.parentId','=','t.id')
            ->select('s.*','t.lessonSubjectName')
            ->orderBy('s.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonTotalList',['data'=>$data]);
    }

    /**
     * 共案编辑页
     */
    public function editLessonTotal($id){
        $data = DB::table('lessonsubjects as s')
            ->leftjoin('lessonsubject as t','s.parentId','=','t.id')
            ->select('s.*','t.lessonSubjectName')
            ->where('s.id',$id)
            ->first();
        $data->lessonSubjectName = DB::table('lessonsubject')->select('id','lessonSubjectName')->get();
        return view('qiyun.admin.lesson.editLessonTotal',['data'=>$data]);
    }

    /**
     *共案编辑
     */
    public function doEditLessonTotal(lessonTotalRequest $request){
        $data['parentId'] = $request['parentId'];
        $data['lessonName'] = $request['lessonName'];
        $data['title'] = $request['title'];
        $data['descript'] = $request['descript'];
        $data['type'] = $request['type'];
        $data['status'] = $request['satus'];
        $data['editerName'] = $request['editerName'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request['url']){
            $data['resourceUrl'] = $request['url'];
        }else{
            $data['resourceUrl'] = $request['organurl'];
        }
//        if($request->hasFile('resourceUrl')){ //判断文件是否存在
//            if($request->file('resourceUrl')->isValid()){ //判断文件在上传过程中是否出错
//                $name = $request->file('resourceUrl')->getClientOriginalName();//获取图片名
//                $entension = $request->file('resourceUrl')->getClientOriginalExtension();//上传文件的后缀
//                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
//                if($request->file('resourceUrl')->move('./video',$newname)){
//                    $data['resourceUrl'] = '/video/'.$newname;
//                }else{
//                    return redirect()->back()->withInput()->withErrors('文件保存失败');
//                }
//
//            }else{
//                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
//            }
//        }
        if(DB::table('lessonsubjects')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课共案修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课共案修改失败');
        }
    }

    /**
     * 删除协同备课共案
     */
    public function delLessonTotal($id){
        $data = DB::table('lessonsubjects')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协同备课共案删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课共案删除失败');
        }
    }





    //----------------------------------------------------------------------------
    //--------------------协同备课文章管理--------------------------
    //----------------------------------------------------------------------------
    /**
     *协同备课文章列表
     */
    public function lessonArticleList(Request $request){
        $query = DB::table('lessonsubject_article as a');
        if($request['type'] == 1){ //根据文章自增id查询
            $query = $query->where('a.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据文章标题查询
            $query = $query->where('a.title','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户名查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('lessonsubject as t','a.lessonId','=','t.id')
            ->select('a.*','t.lessonSubjectName','u.realname')
            ->orderBy('a.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonArticleList',['data'=>$data]);
    }

    /**
     * 协同备课文章编辑页
     */
    public function lessonArticleEdit($id){
        $data = DB::table('lessonsubject_article as a')
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('lessonsubject as t','a.lessonId','=','t.id')
            ->select('a.*','t.lessonSubjectName','u.realname')
            ->where('a.id',$id)
            ->first();
        $data->lessonSubjectName = DB::table('lessonsubject')->select('id','lessonSubjectName')->get();
        return view('qiyun.admin.lesson.editLessonArticle',['data'=>$data]);
    }

    /**
     * 协同备课文章编辑
     */
    public function doLessonArticleEdit(lessonArticleRequest $request){
        $data['lessonId'] = $request['lessonId'];
        $data['title'] = $request['title'];
        $data['content'] = $request['content'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('lessonsubject_article')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课文章修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课文章删除失败');
        }
    }

    /**
     * 删除协同备课文章
     */
    public function delLessonArticle($id){
        $data = DB::table('lessonsubject_article')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协同备课文章删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课文章删除失败');
        }
    }





    //----------------------------------------------------------------------------
    //--------------------协同备课图片管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 协同备课图片列表
     */
    public function lessonImageList(Request $request){
        $query = DB::table('lessonsubject_image as i');
        if($request['type'] == 1){ //根据图片自增id查询
            $query = $query->where('i.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据用户名查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftjoin('lessonsubject as t','i.lessonId','=','t.id')
            ->select('i.*','t.lessonSubjectName','u.realname')
            ->orderBy('i.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonImageList',['data'=>$data]);
    }

    /**
     * 协同备课图片编辑页
     */
    public function lessonImageEdit($id){
        $data = DB::table('lessonsubject_image as i')
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftjoin('lessonsubject as t','i.lessonId','=','t.id')
            ->select('i.*','t.lessonSubjectName','u.realname')
            ->where('i.id',$id)
            ->first();
        $data->lessonsubjectnames = DB::table('lessonsubject')->select('id','lessonSubjectName')->get();
        return view('qiyun.admin.lesson.editLessonImage',['data'=>$data]);
    }

    /**
     *协同备课图片编辑
     */
    public function doLessonImageEdit(Request $request){
        $data['lessonId'] = $request['lessonId'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('imgurl')){ //判断文件是否存在
            if($request->file('imgurl')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('imgurl')->getClientOriginalName();//获取图片名
                $entension = $request->file('imgurl')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('imgurl')->move('./image/qiyun/research/makeGroup',$newname)){
                    $data['imgurl'] = '/image/qiyun/research/makeGroup/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('lessonsubject_image')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课图片修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课图片修改失败');
        }
    }

    /**
     * 删除协同备课图片
     */
    public function delLessonImage($id){
        $data = DB::table('lessonsubject_image')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协同备课图片删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课图片删除失败');
        }
    }




    //----------------------------------------------------------------------------
    //--------------------协同备课音视频管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 协同备课音视频列表
     */
    public function lessonVideoList(Request $request){
        $query = DB::table('lessonsubject_video as v');
        if($request['type'] == 1){ //根据音视频id查询
            $query = $query->where('v.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据备课名称查询
            $query = $query->where('t.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据音视频名称查询
            $query = $query->where('v.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户名查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','v.userId','=','u.id')
            ->leftjoin('lessonsubject as t','v.lessonId','=','t.id')
            ->select('v.*','t.lessonSubjectName','u.realname')
            ->orderBy('v.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonVideoList',['data'=>$data]);
    }

    /**
     * 协同备课音视频编辑页
     */
    public function lessonVideoEdit($id){
        $data = DB::table('lessonsubject_video as v')
            ->leftJoin('users as u','v.userId','=','u.id')
            ->leftjoin('lessonsubject as t','v.lessonId','=','t.id')
            ->select('v.*','t.lessonSubjectName','u.realname')
            ->where('v.id',$id)
            ->first();
        $data->lessonSubjectnames = DB::table('lessonsubject')->select('id','lessonSubjectName')->get();
        return view('qiyun.admin.lesson.editLessonVideo',['data'=>$data]);
    }

    /**
     *协同备课音视频编辑
     */
    public function doLessonVideoEdit(Request $request){
        $data['lessonId'] = $request['lessonId'];
        $data['name'] = $request['name'];
        $data['describes'] = $request['describes'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if($request['url']){
            $data['url'] = $request['url'];
        }else{
            $data['url'] = $request['organurl'];
        }
//        if($request->hasFile('url')){ //判断文件是否存在
//            if($request->file('url')->isValid()){ //判断文件在上传过程中是否出错
//                $name = $request->file('url')->getClientOriginalName();//获取图片名
//                $entension = $request->file('url')->getClientOriginalExtension();//上传文件的后缀
//                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
//                if($request->file('url')->move('./video',$newname)){
//                    $data['url'] = '/video/'.$newname;
//                }else{
//                    return redirect()->back()->withInput()->withErrors('文件保存失败');
//                }
//
//            }else{
//                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
//            }
//        }
        if(DB::table('lessonsubject_video')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课音视频修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课音视频修改失败');
        }
    }

    /**
     * 删除协同备课音视频
     */
    public function delLessonVideo($id){
        $data = DB::table('lessonsubject_video')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协同备课音视频删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课音视频删除失败');
        }
    }




    //----------------------------------------------------------------------------
    //--------------------协同备课资源管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 协同备课资源列表
     */
    public function lessonResourceList(Request $request){
        $query = DB::table('lessonsubject_resource as r');
        if($request['type'] == 1){ //根据资源id查询
            $query = $query->where('r.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据备课名称查询
            $query = $query->where('t.lessonSubjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据资源名称查询
            $query = $query->where('r.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','r.userId','=','u.id')
            ->leftjoin('lessonsubject as t','r.lessonId','=','t.id')
            ->select('r.*','t.lessonSubjectName','u.realname')
            ->orderBy('r.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.lesson.lessonResourceList',['data'=>$data]);
    }

    /**
     * 协同备课资源编辑页
     */
    public function lessonResourceEdit($id){
        $data = DB::table('lessonsubject_resource as r')
            ->leftJoin('users as u','r.userId','=','u.id')
            ->leftjoin('lessonsubject as t','r.lessonId','=','t.id')
            ->select('r.*','t.lessonSubjectName','u.realname')
            ->where('r.id',$id)
            ->first();
        $data->lessonSubjectnames = DB::table('lessonsubject')->select('id','lessonSubjectName')->get();
        return view('qiyun.admin.lesson.editLessonResource',['data'=>$data]);
    }

    /**
     *协同备课资源编辑
     */
    public function doLessonResourceEdit(Request $request){
        $data['lessonId'] = $request['lessonId'];
        $data['name'] = $request['name'];
        $data['describes'] = $request['describes'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if($request['url']){
            $data['resourceUrl'] = $request['url'];
        }else{
            $data['resourceUrl'] = $request['organurl'];
        }
//        if($request->hasFile('resourceurl')){ //判断文件是否存在
//            if($request->file('resourceurl')->isValid()){ //判断文件在上传过程中是否出错
//                $name = $request->file('resourceurl')->getClientOriginalName();//获取图片名
//                $entension = $request->file('resourceurl')->getClientOriginalExtension();//上传文件的后缀
//                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
//                if($request->file('resourceurl')->move('./video',$newname)){
//                    $data['resourceurl'] = '/video/'.$newname;
//                }else{
//                    return redirect()->back()->withInput()->withErrors('文件保存失败');
//                }
//
//            }else{
//                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
//            }
//        }
        if(DB::table('lessonsubject_resource')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协同备课资源修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课资源修改失败');
        }
    }

    /**
     * 删除协同备课资源
     */
    public function delLessonResource($id){
        $data = DB::table('lessonsubject_resource')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协同备课资源删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协同备课资源删除失败');
        }
    }
}
