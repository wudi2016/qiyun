<?php
//多条件筛选
if($request['organizeid']){
    $query = $query->where('s.organizeid',$request['organizeid']);
    $state['organizeid'] = $request['organizeid'];
    $state['cityall'] = DB::table('city')->where('parent_id',$request['organizeid'])->select('id','city_name')->get();
    $state['schoolall'] = DB::table('school')->where('organizeid',$request['organizeid'])->select('id','schoolName')->get();
}
if($request['cityId']){
    $query = $query->where('s.cityId',$request['cityId']);
    $state['cityId'] = $request['cityId'];
    $state['countryall'] = DB::table('county')->where('parent_id',$request['cityId'])->select('id','county_name')->get();
    $state['schoolall'] = DB::table('school')->where('cityId',$request['cityId'])->select('id','schoolName')->get();
}
if($request['countryId']){
    $query = $query->where('s.countryId',$request['countryId']);
    $state['countryId'] = $request['countryId'];
    $state['schoolall'] = DB::table('school')->where('countryId',$request['countryId'])->select('id','schoolName')->get();
}