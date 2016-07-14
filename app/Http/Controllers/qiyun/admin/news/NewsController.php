<?php

namespace App\Http\Controllers\qiyun\admin\news;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\newsRequest;
use App\Http\Requests\newsTypeRequest;

class NewsController extends Controller
{
    /**
     * 资讯列表
     */
    public function newsList(Request $request){
        $query = DB::table('news as n');
        if($request['type'] == 1){ //根据新闻自增id查询
            $query = $query->where('n.id',trim($request['search']));
        }
        if($request['type'] == 2){ //根据新闻标题查询
            $query = $query->where('n.title','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据作者查询
            $query = $query->where('n.author','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据新闻分类查询
            $query = $query->where('t.typeName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftjoin('newstype as t','n.typeId','=','t.id')
            ->select('n.*','t.typeName')
            ->orderBy('n.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.news.newsList',['data'=>$data]);
    }

    /**
     *资讯详情
     */
    public function newsDetail($id){
        $data = DB::table('news as n')
            ->leftjoin('newstype as t','n.typeId','=','t.id')
            ->select('n.*','t.typeName')
            ->where('n.id',$id)
            ->first();
        return view('qiyun.admin.news.newsDetails',['data'=>$data]);
    }

    /**
     *添加资讯
     */
    public function addNews(){
        $data = DB::table('newstype')->where('status',0)->select('id','typeName')->get();
        return view('qiyun.admin.news.addNews',['data'=>$data]);
    }

    /**
     *执行添加资讯
     */
    public function doAddNews(newsRequest $request){
        $data = $request->except('_token');
        if($request->hasFile('pic')){ //判断文件是否存在
            if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('pic')->getClientOriginalName();//获取图片名
                $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('pic')->move('./image/qiyun/resource/microLesson',$newname)){
                    $data['pic'] = '/image/qiyun/resource/microLesson/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        echo '11';
        if(DB::table('news')->insert($data)){
            return redirect('admin/message')->with(['status'=>'资讯添加成功','redirect'=>'news/newsList']);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯添加失败');
        }
    }

    /**
     *资讯编辑页
     */
    public function newsEdit($id){
        $data = DB::table('news as n')
            ->leftjoin('newstype as t','n.typeId','=','t.id')
            ->select('n.*','t.typeName')
            ->where('n.id',$id)
            ->first();
        $data->typeNames = DB::table('newstype')->where('status',0)->select('id','typeName')->get();
        return view('qiyun.admin.news.editNews',['data'=>$data]);
    }

    /**
     *资讯编辑
     */
    public function doNewsEdit(newsRequest $request){
        $data['title'] = $request['title'];
        $data['description'] = $request['description'];
        $data['source'] = $request['source'];
        $data['author'] = $request['author'];
        $data['typeId'] = $request['typeId'];
        $data['content'] = $request['content'];
        $data['clickNum'] = $request['clickNum'];
        $data['favNum'] = $request['favNum'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('pic')){ //判断文件是否存在
            if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('pic')->getClientOriginalName();//获取图片名
                $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('pic')->move('./image/qiyun/resource/microLesson',$newname)){
                    $data['pic'] = '/image/qiyun/resource/microLesson/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('news')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'资讯修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯修改失败');
        }
    }

    /**
     * 删除资讯
     */
    public function delNews($id){
        $data = DB::table('news')->where('id',$id)->delete();
        $datas = DB::table('newsinformant')->where('newsId',$id)->delete();

        if($data){
            return redirect('admin/message')->with(['status'=>'资讯删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯删除失败');
        }
    }



    /*
||--------------------------------------------------------------------------------------
||     -------------------------- 资讯分类表编辑、删除 ----------------------------
||--------------------------------------------------------------------------------------
 */
    /**
     *资讯分类列表
     */
    public function newsTypeList(Request $request){
        $query = DB::table('newstype');
        if($request['type'] == 1){ //根据新闻分类自增id查询
            $query = $query->where('id',trim($request['search']));
        }
        if($request['type'] == 2){ //根据新闻类名查询
            $query = $query->where('typeName','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->orderBy('id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.news.newsTypeList',['data'=>$data]);
    }

    /**
     *添加新闻资讯分类
     */
    public function addNewsType(){
        return view('qiyun.admin.news.addNewsType');
    }

    /**
     *执行添加分类
     */
    public function doAddNewsType(newsTypeRequest $request){
        $data = $request->except('_token');
        $data['crated_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('newstype')->insert($data)){
            return redirect('admin/message')->with(['status'=>'资讯分类添加成功','redirect'=>'news/newsTypeList']);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯分类添加失败');
        }
    }

    /**
     * 资讯分类编辑页
     */
    public function newsTypeEdit($id){
        $data = DB::table('newstype')->where('id',$id)->first();
        return view('qiyun.admin.news.editNewsType',['data'=>$data]);
    }

    /**
     *资讯分类编辑
     */
    public function doNewsTypeEdit(newsTypeRequest $request){
        $data['typeName'] = $request['typeName'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('newstype')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'资讯分类修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯分类修改失败');
        }

    }
    public function delNewsType($id){
        $data = DB::table('newstype')->where('id',$id)->delete();
        if($data){
            DB::table('news')->where('typeId',$id)->delete();
            return redirect('admin/message')->with(['status'=>'资讯分类删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯分类删除失败');
        }
    }



    //=======================================================
    //=========================资讯举报表=====================
    //=======================================================
    public function newsReportList(Request $request){
        $query = DB::table('newsinformant as i');
        if($request['type'] == 1){
            $query = $query->where('i.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //根据新闻标题查询
            $query = $query->where('n.title','like','%'.trim($request['search']).'%');
        }
        $data = $query
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftJoin('news as n','i.newsId','=','n.id')
            ->select('i.*','n.title','u.realname')
            ->orderBy('i.id','desc')
            ->paginate(15);
        foreach($data as &$val){
            switch($val->type){
                case 0:
                    $val->types = '抄袭内容';
                    break;
                case 1:
                    $val->types = '分类错误';
                    break;
                case 2:
                    $val->types = '暴力色情';
                    break;
                case 3:
                    $val->types = '政治敏感';
                    break;
                default:
                    $val->types = '其他';
                    break;
            }
        }
        $data->type = $request['type'];
        return view('qiyun.admin.news.newsReportList',['data'=>$data]);
    }

    /**
     *编辑举报
     */
    public function editNewsReport($id){
        $data = DB::table('newsinformant as i')
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftJoin('news as n','i.newsId','=','n.id')
            ->select('i.*','n.title','u.realname')
            ->where('i.id',$id)
            ->first();
        switch($data->type){
            case 0:
                $data->types = '抄袭内容';
                break;
            case 1:
                $data->types = '分类错误';
                break;
            case 2:
                $data->types = '暴力色情';
                break;
            case 3:
                $data->types = '政治敏感';
                break;
            default:
                $data->types = '其他';
                break;
        }
        return view('qiyun.admin.news.editNewsReport',['data'=>$data]);
    }

    /**
     *执行编辑
     */
    public function doEditNewsReport(Request $request){
        $data = $request->except('_token','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('newsinformant')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'资讯举报修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯举报修改失败');
        }
    }

    /**
     *删除资讯举报
     */
    public function delNewsReport($id){
        $data = DB::table('newsinformant')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'资讯举报删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('资讯举报删除失败');
        }
    }
}
