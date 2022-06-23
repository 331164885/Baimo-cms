<?php

namespace Baimo\Cms\Http\Controllers\Front;

use Baimo\Cms\Services\Interfaces\ArticleServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends BaseApiController
{
    protected $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getAticleList(Request $request)
    {
        return $this->success($this->articleService->getArticleListByMenuType($request));
    }

    public function getAticleDetail(Request $request, $page, $id)
    {
        $request->merge(['page_name'=>$page, 'id'=>$id]);

        return $this->success($this->articleService->getAticleDetail($request));
    }
}