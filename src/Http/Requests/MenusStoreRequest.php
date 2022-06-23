<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class MenusStoreRequest extends BaseRequest
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
                Rule::unique('baimo_menus')->where(function ($query){
                    $query->where('deleted_at', NULL);
                })
            ],
            'sort'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '菜单名称不能为空',
            'name.max' => '菜单不能大于50位数',
            'name.unique' => '该菜单已存在',
            'sort.required' => '排序不能为空',
            'parent_id.required' => '所属菜单不能为空',
            'content_type.required' => '所属类型不能为空',
            'url.required' => '链接不能为空',
            'is_index.required' => '菜单是否是首页',
            'is_show.required' => '菜单是否显示',
        ];
    }
}
