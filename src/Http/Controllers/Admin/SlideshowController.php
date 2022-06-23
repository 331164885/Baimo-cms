<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\SlideshowStoreRequest;
use Baimo\Cms\Http\Requests\SlideshowUpdateRequest;
use Baimo\Cms\Services\Interfaces\SlideshowServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SlideshowController extends Controller
{
    protected $slideshowService;

    public function __construct(SlideshowServiceInterface $slideshowService)
    {
        $this->slideshowService = $slideshowService;
    }

    /**
     * 获取文章列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->slideshowService->serviceIndex($request);

        return $this->success($list);
    }

    public function store(SlideshowStoreRequest $request)
    {
        if ($this->slideshowService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    public function update(SlideshowUpdateRequest $request)
    {
        if ($this->slideshowService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->slideshowService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

}
