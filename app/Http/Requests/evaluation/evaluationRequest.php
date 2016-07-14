<?php

namespace App\Http\Requests\evaluation;

use App\Http\Requests\Request;

class evaluationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'evaluatName'=>'required',
            'beginTime'=>'required',
            'endTime'=>'required',
            'evaluatSection'=>'required',
            'evaluatSubject'=>'required',
            'evaluatEdition'=>'required',
            'evaluatGrade'=>'required',
            'evaluatDirection'=>'required',
            'evaluatView'=>'integer',
            'evaluatFav'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'evaluatName.required' => '请填写评课名称',
            'beginTime.required' => '请填写开始时间',
            'endTime.required' => '请填写结束时间',
            'evaluatSection.required' => '请填写学段',
            'evaluatSubject.required' => '请填写学科',
            'evaluatEdition.required' => '请填写版本',
            'evaluatGrade.required' => '请填写年级册别',
            'evaluatView.integer' => '浏览次数必须为整型',
            'evaluatFav.integer' => '点赞次数必须为整型',
        ];
    }
}
