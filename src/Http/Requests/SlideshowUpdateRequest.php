<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class SlideshowUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'url' => 'required',
            'sort' => 'required',
            'is_show' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'image.required' => '图片不能为空',
            'sort.required' => '排序不能为空',
            'is_show.required' => '幻灯是否显示',
        ];
    }
}
