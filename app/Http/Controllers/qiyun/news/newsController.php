<?php

namespace App\Http\Controllers\qiyun\news;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class newsController extends Controller
{
    /**
     * 新闻资讯页
     *
     */
    public function index()
    {
        // $arr = array();
        // $resa = DB::select('select id,title,created_at from news where typeId = 1 order By created_at desc limit 13');
        // $resb = DB::select('select id,title,created_at from news where typeId = 2 order By created_at desc limit 13');
        // $arr['zixuns'] = $resa;
        // $arr['zhengces'] = $resb;

        // return view('qiyun/news/news',['res'=>$arr]);
        return view('qiyun/news/news');
    }

    public function indexTwo()
    {
        return view('qiyun/news/newsTwo');
    }


    //获取教育资讯接口
    public function getZixun(){
        $arr = json_decode(file_get_contents('php://input'),true);   

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('news') -> where('typeId',1) ->where('status',0) -> count();  //总记录数

        if ($resa = DB::select("select id,title,created_at from news where typeId = 1 and status = 0 order By created_at desc limit $passNUm,$perPageNum ")) {
            $arr = array('status' => true,'count'=>$sum,'zixuns' => $resa);
        }else{
            $arr = array('status' => false);
        }
        echo json_encode($arr);
    }
    //获取教育政策接口
    public function getZhengce(){
        $arr = json_decode(file_get_contents('php://input'),true);   

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('news') -> where('typeId',2) ->where('status',0) -> count();  //总记录数

        if ($resa = DB::select("select id,title,created_at from news where typeId = 2 and status = 0 order By created_at desc limit $passNUm,$perPageNum ")) {
            $arr = array('status' => true,'count'=>$sum,'zhengces' => $resa);
        }else{
            $arr = array('status' => false);
        }
        echo json_encode($arr);
    }

    /**
     * 资讯详细页
     *
     */
    public function newsDetail($id=1)
    {
        //浏览数加一
        DB::table('news')->where('id',$id)->increment('clickNum',1);
        
        //获取上下篇
        $resa = DB::select("select id,title from news where id<$id order by id DESC limit 1");
        $resb = DB::select("select id,title from news where id>$id order by id ASC limit 1");


        if($resa){
            $arr['prev'] = $resa[0];
        }else{
            $arr['prev'] = false;
        }
        if($resb){
            $arr['next'] = $resb[0];
        }else{
            $arr['next'] = false;
        }
        return view('qiyun/news/newsDetail',['datas' => $arr,'id'=>$id]);
    }

    /**
     * 资讯详细内容 接口
     *
     */
    public function getContent($id)
    {    

        if($res = DB::select('select title,typeId,source,created_at,content,clickNum from news where id = ?',[$id])){

           $arra = array();
           foreach ($res as $key => $val) {
                if ($type=DB::select("select typeName from newstype where id = ".$val -> typeId)) {
                   $arra['type'] = $type[0]->typeName;
                }else{
                   $arra['type'] = '教育资讯';
                }
                   $arra['id'] = $id;
                   $arra['title'] = $val -> title;
                   $arra['resource'] = $val -> source;
                   $arra['time'] = $val -> created_at;
                   $arra['content'] = $val -> content;
                   $arra['clickNum'] = $val -> clickNum;
           }
           $arr = array('type'=>true,'content'=>$arra);
        }

        echo json_encode($arr);
    }

    /**
     * 图片新闻
     *
     */
    public function getImageNews()
    {   
        if($res = DB::select("select id,pic,title from news where pic <> '' and status = 0 order By id desc limit 6")){
            $arra = array();
            foreach($res as $v){
                $arra[] = array('id'=>$v->id,'image'=>$v->pic,'title'=>$v->title);
            }
            
            $arr = ['type' => true,'imageNews' => $arra];
        }else{
            $arr = ["type" => false];
        }

        echo json_encode($arr);
    }

    /**
     * 最热新闻
     *
     */
    public function getHotNews()
    {
        if($res = DB::select('select id,title from news where status = 0 order By clickNum desc limit 8')){
            $arra = array();
            foreach($res as $v){
                $arra[] = array('id'=>$v->id,'title'=>$v->title);
            }
            
            $arr = ['type' => true,'hotNews' => $arra];
        }else{
            $arr = ["type" => false];
    }
        echo json_encode($arr);
    }

    /**
     * 举报
     *
     */
    public function doinformant()
    {
        $arr = json_decode(file_get_contents('php://input'),true);   
        if (Auth::user()) {
            if(DB::table('newsinformant')->where(['userId'=>Auth::user()->id,'newsId'=>$arr['newsId']])->first()){  
                echo 4; //已举报过
            }else{
                $arr['userId'] = Auth::user()->id;
                $arr['created_at'] = date("Y-m-d H:i:s",time());
                $arr['updated_at'] = date("Y-m-d H:i:s",time());
                if(DB::table('newsinformant')->insertGetId($arr)){
                    echo 2;  //举报成功
                }else{
                    echo 3;  //失败
                }
            }
        }else{
            echo 1; //未登录
        }       
    }


}
