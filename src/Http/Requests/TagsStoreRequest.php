<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class TagsStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:50',
                Rule::unique('baimo_tags')->where(function ($query){
                    $query->where('deleted_at', NULL);
                })
            ],
            'sort'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '标签不能为空',
            'name.max' => '标签不能大于50位数',
            'name.unique' => '该标签已存在',
            'sort.required' => '排序不能为空',
        ];
    }
}
