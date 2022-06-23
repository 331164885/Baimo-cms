<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\ArticleStoreRequest;
use Baimo\Cms\Http\Requests\ArticleUpdateRequest;
use Baimo\Cms\Services\Interfaces\ArticleServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * 获取文章列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->articleService->serviceIndex($request);

        return $this->success($list);
    }

    public function store(ArticleStoreRequest $request)
    {
        if ($this->articleService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    public function update(ArticleUpdateRequest $request)
    {
        if ($this->articleService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->articleService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

    public function getTags(Request $request)
    {
        $list = $this->articleService->getTags();

        return $this->success($list);
    }

}
