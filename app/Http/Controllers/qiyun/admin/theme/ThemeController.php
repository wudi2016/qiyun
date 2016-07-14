<?php

namespace App\Http\Controllers\qiyun\admin\theme;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\theme\themeRequest;
use App\Http\Requests\theme\articleRequest;

class ThemeController extends Controller
{
    /**
     *主题列表
     */
    public function themeList(Request $request){
        $query = DB::table('department_theme as t');
        if($request['type'] == 1){ //根据自增id查询
            $query = $query->where('t.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据创建人查询
            $query = $query->where('users.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users','t.userId','=','users.id')
            ->orderBy('t.id','desc')
            ->select('t.*','users.realname')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.themeList',['data'=>$data]);
    }

    /**
     * 主题编辑页
     */
    public function themeEdit($id){
        $data = DB::table('department_theme as t')
            ->leftJoin('users','t.userId','=','users.id')
            ->where('t.id',$id)
            ->select('t.*','users.realname')
            ->first();
        return view('qiyun.admin.themes.editTheme',['data'=>$data]);
    }

    /**
     * 主题编辑
     */
    public function doThemeEdit(themeRequest $request){
        $data['name'] = $request['name'];
        $data['describe'] = $request['describe'];
        $data['peoplenum'] = $request['peoplenum'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
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
        if(DB::table('department_theme')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题修改失败');
        }
    }

    /**
     * 删除主题
     */
    public function delTheme($id){
        $data = DB::table('department_theme')->where('id',$id)->delete();
        if($data){
            DB::table('department_article')->where('themeId',$id)->delete();
            DB::table('department_images')->where('themeId',$id)->delete();
            DB::table('department_videos')->where('themeId',$id)->delete();
            DB::table('department_resource')->where('themeId',$id)->delete();
            DB::table('department_topic')->where('themeId',$id)->delete();
            return redirect('admin/message')->with(['status'=>'教研主题删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题删除失败');
        }
    }




    //----------------------------------------------------------------------------
    //--------------------教研主题文章管理--------------------------
    //----------------------------------------------------------------------------
    /**
     *文章列表
     */
    public function articleList(Request $request){
        $query = DB::table('department_article as a');
        if($request['type'] == 1){ //根据文章自增id查询
            $query = $query->where('a.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据文章标题查询
            $query = $query->where('a.title','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户ID查询
            $query = $query->where('u.realname',$request['search']);
        }
        $data = $query
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('department_theme as t','a.themeId','=','t.id')
            ->select('a.*','t.name','u.realname')
            ->orderBy('a.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.articleList',['data'=>$data]);
    }

    /**
     * 文章编辑页
     */
    public function articleEdit($id){
        $data = DB::table('department_article as a')
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('department_theme as t','a.themeId','=','t.id')
            ->select('a.*','t.name','u.realname')
            ->where('a.id',$id)
            ->first();
        $data->themenames = DB::table('department_theme')->select('id','name')->get();
        return view('qiyun.admin.themes.editArticle',['data'=>$data]);
    }

    /**
     * 文章编辑
     */
    public function doArticleEdit(articleRequest $request){
        $data['themeId'] = $request['themeId'];
        $data['title'] = $request['title'];
        $data['content'] = $request['content'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('department_article')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题文章修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题文章删除失败');
        }
    }

    /**
     * 删除文章
     */
    public function delArticle($id){
        $data = DB::table('department_article')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研主题文章删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题文章删除失败');
        }
    }



    //----------------------------------------------------------------------------
    //--------------------教研主题图片管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 图片列表
     */
    public function imageList(Request $request){
        $query = DB::table('department_images as i');
        if($request['type'] == 1){ //根据图片自增id查询
            $query = $query->where('i.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据用户查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftjoin('department_theme as t','i.themeId','=','t.id')
            ->select('i.*','t.name','u.realname')
            ->orderBy('i.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.imageList',['data'=>$data]);
    }

    /**
     * 图片编辑页
     */
    public function imageEdit($id){
        $data = DB::table('department_images as i')
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftjoin('department_theme as t','i.themeId','=','t.id')
            ->select('i.*','t.name','u.realname')
            ->where('i.id',$id)
            ->first();
        $data->themenames = DB::table('department_theme')->select('id','name')->get();
        return view('qiyun.admin.themes.editImage',['data'=>$data]);
    }

    /**
     *图片编辑
     */
    public function doImageEdit(Request $request){
        $data['themeId'] = $request['themeId'];
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
        if(DB::table('department_images')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题图片修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题图片修改失败');
        }
    }

    /**
     * 删除图片
     */
    public function delImage($id){
        $data = DB::table('department_images')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研主题图片删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题图片删除失败');
        }
    }



    //----------------------------------------------------------------------------
    //--------------------教研主题音视频管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 音视频列表
     */
    public function videoList(Request $request){
        $query = DB::table('department_videos as v');
        if($request['type'] == 1){ //根据音视频id查询
            $query = $query->where('v.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据音视频名称查询
            $query = $query->where('v.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户ID查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','v.userId','=','u.id')
            ->leftjoin('department_theme as t','v.themeId','=','t.id')
            ->select('v.*','t.name as tname','u.realname')
            ->orderBy('v.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.videoList',['data'=>$data]);
    }

    /**
     * 音视频编辑页
     */
    public function videoEdit($id){
        $data = DB::table('department_videos as v')
            ->leftJoin('users as u','v.userId','=','u.id')
            ->leftjoin('department_theme as t','v.themeId','=','t.id')
            ->select('v.*','t.name as tname','u.realname')
            ->where('v.id',$id)
            ->first();
        $data->themenames = DB::table('department_theme')->select('id','name as tname')->get();
        return view('qiyun.admin.themes.editVideo',['data'=>$data]);
    }

    /**
     * @param Request $request
     */
    public function doUploadpic(Request $request)
    {
        if($request->hasFile('Filedata')){ //判断文件是否存在
            if($request->file('Filedata')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('Filedata')->getClientOriginalName();//获取图片名
                $entension = $request->file('Filedata')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('Filedata')->move('./video',$newname)){
                    echo '/video/'.$newname;
                }else{
                    echo '文件保存失败';
                }
            }else{
                echo '文件上传出错';
            }
        }
    }

    /**
     *音视频编辑
     */
    public function doVideoEdit(Request $request){
        $data['id'] = $request['id'];
        $data['themeId'] = $request['themeId'];
        $data['name'] = $request['name'];
        $data['describe'] = $request['describe'];
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
        if(DB::table('department_videos')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题音视频修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题音视频修改失败');
        }
    }

    /**
     * 删除音视频
     */
    public function delVideo($id){
        $data = DB::table('department_videos')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研主题音视频删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题音视频删除失败');
        }
    }




    //----------------------------------------------------------------------------
    //--------------------教研主题资源管理--------------------------
    //----------------------------------------------------------------------------
    /**
     * 资源列表
     */
    public function resourceList(Request $request){
        $query = DB::table('department_resource as r');
        if($request['type'] == 1){ //根据资源id查询
            $query = $query->where('r.id',trim($request['search']));
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据资源名称查询
            $query = $query->where('r.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户名查询
            $query = $query->where('u.realname',trim($request['search']));
        }
        $data = $query
            ->leftJoin('users as u','r.userId','=','u.id')
            ->leftjoin('department_theme as t','r.themeId','=','t.id')
            ->select('r.*','t.name as tname','u.realname')
            ->orderBy('r.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.resourceList',['data'=>$data]);
    }

    /**
     * 资源编辑页
     */
    public function resourceEdit($id){
        $data = DB::table('department_resource as r')
            ->leftJoin('users as u','r.userId','=','u.id')
            ->leftjoin('department_theme as t','r.themeId','=','t.id')
            ->select('r.*','t.name as tname','u.realname')
            ->where('r.id',$id)
            ->first();
        $data->themenames = DB::table('department_theme')->select('id','name as tname')->get();
        return view('qiyun.admin.themes.editResource',['data'=>$data]);
    }

    /**
     *资源编辑
     */
    public function doResourceEdit(Request $request){
//        dd($request->all());
        $data['id'] = $request['id'];
        $data['themeId'] = $request['themeId'];
        $data['name'] = $request['name'];
        $data['describe'] = $request['describe'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
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
        if(DB::table('department_resource')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题资源修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题资源修改失败');
        }
    }

    /**
     * 删除资源
     */
    public function delResource($id){
        $data = DB::table('department_resource')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研主题资源删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题资源删除失败');
        }
    }



    //----------------------------------------------------------------------------
    //--------------------教研主题话题管理--------------------------
    //----------------------------------------------------------------------------
    /**
     *话题列表
     */
    public function topicList(Request $request){
        $query = DB::table('department_topic as a');
        if($request['type'] == 1){ //根据文章自增id查询
            $query = $query->where('a.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据主题名称查询
            $query = $query->where('t.name','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据文章标题查询
            $query = $query->where('a.title','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据用户ID查询
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('department_theme as t','a.themeId','=','t.id')
            ->select('a.*','t.name','u.realname')
            ->orderBy('a.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.themes.topicList',['data'=>$data]);
    }

    /**
     * 话题编辑页
     */
    public function editTopic($id){
        $data = DB::table('department_topic as a')
            ->leftJoin('users as u','a.userId','=','u.id')
            ->leftjoin('department_theme as t','a.themeId','=','t.id')
            ->select('a.*','t.name','u.realname')
            ->where('a.id',$id)
            ->first();
        $data->themenames = DB::table('department_theme')->select('id','name')->get();
        return view('qiyun.admin.themes.editTopic',['data'=>$data]);
    }

    /**
     * 话题编辑
     */
    public function doTopicEdit(Request $request){
        $data['themeId'] = $request['themeId'];
        $data['title'] = $request['title'];
        $data['content'] = $request['content'];
        $data['userId'] = $request['userId'];
        $data['update_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('department_topic')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研主题话题修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题话题删除失败');
        }
    }

    /**
     * 删除话题
     */
    public function delTopic($id){
        $data = DB::table('department_topic')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研主题话题删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研主题话题删除失败');
        }
    }
}
