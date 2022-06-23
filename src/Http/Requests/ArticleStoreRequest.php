<?php

namespace Baimo\Cms\Http\Requests;

use Baimo\Core\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ArticleStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required',
            'body' => 'required',
            'author' => 'required',
            'is_top' => 'required',
            'is_recommend' => 'required',
            'is_show' => 'required',
            'menu_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'subject.required' => '文章标题不能为空',
            'body.required' => '文章内容不能为空',
            'author.required' => '文章作者不能为空',
            'is_top.required' => '文章是否置顶',
            'is_recommend.required' => '文章是否推荐',
            'is_show.required' => '文章是否显示',
            'menu_id.required' => '请选择所属菜单',
        ];
    }
}
