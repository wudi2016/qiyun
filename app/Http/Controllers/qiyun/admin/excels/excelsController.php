<?php

namespace App\Http\Controllers\qiyun\admin\excels;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Excel;

class excelsController extends Controller{

	public function departmentExport(){
			$info = DB::table('schooldepartment as sp')
					->join('school as s','s.id','=','sp.parent_id')
					->select('sp.*','s.schoolName')
					->get();
	        $cellData[] = array(
	            'A'=>'id',
	            'B'=>'对应学校',
	            'C'=>'部门名称',
	            'J'=>'创建时间',
	            'K'=>'更新时间',
	        );
	        foreach($info as $val){
	            $cellData[] = array(
	                'A'=>$val->id,
	                'B'=>$val->schoolName,
	                'C'=>$val->departName,
	                'J'=>$val->created_at,
	                'K'=>$val->updated_at,
	            );
	        }
	        Excel::create(iconv('UTF-8', 'GBK', '部门设置表'),function($excel) use($cellData){
	 		$excel->sheet('score',function($sheet) use($cellData){
					$sheet->rows($cellData);
		 		});
		 	})->store('xls')->export('xls');
	}




}