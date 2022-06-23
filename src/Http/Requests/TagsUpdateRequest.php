<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;

class TagsUpdateRequest extends BaseRequest
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
            'name' => 'required|max:50',
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
