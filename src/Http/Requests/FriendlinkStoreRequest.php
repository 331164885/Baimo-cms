<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class FriendlinkStoreRequest extends BaseRequest
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
            'link' => 'required',
            'sort' => 'required',
            'is_show' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '友情链接标题不能为空',
            'link.required' => '友情链接地址不能为空',
            'sort.required' => '排序不能为空',
            'is_show.required' => '友情链接是否显示',
        ];
    }
}
