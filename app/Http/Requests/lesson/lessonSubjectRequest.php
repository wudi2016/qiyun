<?php

namespace App\Http\Requests\lesson;

use App\Http\Requests\Request;

class lessonSubjectRequest extends Request
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
            'lessonSubjectName'=>'required',
            'beginTime'=>'required',
            'endTime'=>'required',
            'lessonSubjectTarget'=>'required',
            'lessonSection'=>'required',
            'lessonSubject'=>'required',
            'lessonEdition'=>'required',
            'lessonGrade'=>'required',
            'lessonView'=>'integer',
            'lessonFav'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'lessonSubjectName.required' => '请填写名称',
            'beginTime.required' => '请填写开始时间',
            'endTime.required' => '请填写结束时间',
            'lessonSubjectTarget.required' => '请填写目标名称',
            'lessonSection.required' => '请填写学段',
            'lessonSubject.required' => '请填写学科',
            'lessonEdition.required' => '请填写版本',
            'lessonGrade.required' => '请填写年级册别',
            'lessonView.integer' => '浏览次数必须为整型',
            'lessonFav.integer' => '点赞次数必须为整型',
        ];
    }
}
