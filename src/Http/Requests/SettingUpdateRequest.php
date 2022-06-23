<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class SettingUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /*'group_name' => 'required',
            'key_name' => 'required',
            'value' => 'required',*/
        ];
    }

    public function messages()
    {
        return [
            /*'group_name.required' => '分组不能为空',
            'key_name.required' => '设置键名不能为空',
            'value.required' => '设置键值不能为空',*/
        ];
    }
}
