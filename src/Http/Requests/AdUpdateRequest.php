<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class AdUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image_link' => 'required',
            'is_show' => 'required',
            'position' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标题不能为空',
            'image_link.required' => '图片不能为空',
            'is_show.required' => '是否显示',
            'position.required' => '显示位置不能为空',
        ];
    }
}
