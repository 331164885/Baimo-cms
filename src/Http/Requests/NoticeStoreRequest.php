<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class NoticeStoreRequest extends BaseRequest
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
            'body' => 'required',
            'is_show' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'body.required' => '通知内容不能为空',
            'is_show.required' => '是否显示',
        ];
    }
}
