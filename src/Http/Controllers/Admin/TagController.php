<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\TagsUpdateRequest;
use Baimo\Cms\Services\Interfaces\TagServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Baimo\Cms\Http\Requests\TagsStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * 获取标签列表
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $list = $this->tagService->serviceIndex($request);

        return $this->success($list);
    }

    /**
     * 新增标签
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TagsStoreRequest $request)
    {
        if ($this->tagService->serviceStore($request)) {
            return $this->success([
                'msg' => "保存成功"
            ]);
        }
    }

    /**
     * 更新标签
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TagsUpdateRequest $request)
    {
        if ($this->tagService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    /**
     * 删除标签
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->tagService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }
}
