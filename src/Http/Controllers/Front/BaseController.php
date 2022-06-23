<?php

namespace Baimo\Cms\Http\Controllers\Front;

use Baimo\Cms\Models\Ad;
use Baimo\Cms\Models\AdPosition;
use Baimo\Cms\Models\Article;
use Baimo\Cms\Models\Friendlink;
use Baimo\Cms\Models\Notice;
use Baimo\Cms\Models\Slideshow;
use Baimo\Core\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseController extends BaseApiController
{
    public function indexData()
    {
        //$image_news = Article::select('*')->where('menu_id', '55')->limit('6')->orderBy('created_at', 'DESC')->get();
        $text_news = Article::select('*')->where(['menu_id'=>'28','is_show'=>'1'])->limit('10')->orderBy('created_at', 'DESC')->get();
        $qiyedongtai = Article::select('*')->where(['menu_id'=>'38','is_show'=>'1'])->limit('10')->orderBy('created_at', 'DESC')->get();

        $anquanshengchan = Article::select('*')->where(['tag'=>'30','is_show'=>'1'])->limit('8')->orderBy('created_at', 'DESC')->get();
        $jingyingguanli  = Article::select('*')->where(['tag'=>'31','is_show'=>'1'])->limit('10')->orderBy('created_at', 'DESC')->get();
        $tongzhigonggao = Article::select('*')->where(['is_show'=>'1', 'menu_id'=>'55'])->limit('10')->orderBy('created_at', 'DESC')->get();
        $specials = Article::select('*')->where(['menu_id'=>'54','is_show'=>'1'])->limit('5')->orderBy('created_at', 'DESC')->get();
        $dangdejianshe = Article::select('*')->where(['menu_id'=>'47','is_show'=>'1'])->limit('5')->orderBy('created_at', 'DESC')->get();
        $sixiangxuanchuan = Article::select('*')->where(['menu_id'=>'48','is_show'=>'1'])->limit('5')->orderBy('created_at', 'DESC')->get();
        $dangyuanhuodong = Article::select('*')->where(['menu_id'=>'51','is_show'=>'1'])->limit('5')->orderBy('created_at', 'DESC')->get();
        $yuangongtiandi = Article::select('*')->where(['menu_id'=>['50', '51'],'is_show'=>'1'])->limit('5')->orderBy('created_at', 'DESC')->get();

        $ad = AdPosition::with(['ad'=>function($query){
            $query->select('id', 'position', 'name', 'image_link', 'url')->where('is_show', '1');
        }])->select('id', 'name', 'sign')
            ->where(['sign'=>'index'])
            ->get();

        $config = config('baimocms');

        $friend_links = Friendlink::select('*')->where('is_show', '1')->orderBy('sort', 'DESC')->get();
        $notice = Notice::select('*')->where(['is_show'=>'1', 'is_top'=>'1'])->limit('1')->orderBy('created_at', 'DESC')->get();

        return $this->success(compact('ad','config', 'notice', 'text_news', 'qiyedongtai',
            'anquanshengchan', 'jingyingguanli', 'tongzhigonggao', 'specials', 'dangdejianshe', 'sixiangxuanchuan', 'dangyuanhuodong',
            'yuangongtiandi', 'friend_links'));
    }

    public function logo()
    {
        return $this->success(config('baimocms.logo'));
    }

    public function imageNew() {
        $image_news = Article::select('*')->where([
            ['tag', '33'],
            ['front_cover', '!=', '']
        ])->limit('8')->orderBy('created_at', 'DESC')->get();

        return $this->success($image_news);
    }

    public function search(Request $request) {
        $keywords = (!empty($request->keywords) || isset($request->keywords)) ? $request->keywords : '';
        $result = Article::select('id', 'subject', 'menu_id', 'created_at')->where([['subject','like', "%$keywords%"]])->whereOr(['body','like', "%$keywords%"])->orderBy('created_at', 'DESC')->paginate();

        return $this->success($result->toArray());
    }

    public function sliders(Request $request)
    {
        //$config = config('baimocms');
        $slides = (Slideshow::select('*')->where('is_show', '1')->orderBy('sort', 'ASC')->get())->toArray();
        //$notice = (Notice::select('*')->where([['is_show', '1'],['is_top', '1']])->orderBy('sort', 'ASC')->get());

        //Log::info($notice);
        return $this->success($slides);
    }

    public function config(Request $request)
    {
        $config = config('baimocms');

        return $this->success($config);
    }

    public function ad(Request $request)
    {
        $ad = AdPosition::with(['ad'=>function($query){
            $query->select('id', 'position', 'name', 'image_link', 'url')->where('is_show', '1');
        }])->select('id', 'name', 'sign')
            ->where('sign', 'content_list')
            ->get();

        return $this->success($ad);
    }
}