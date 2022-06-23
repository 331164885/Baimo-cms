<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\AdStoreRequest;
use Baimo\Cms\Http\Requests\AdUpdateRequest;
use Baimo\Cms\Services\Interfaces\AdServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    protected $adService;

    public function __construct(AdServiceInterface $adService)
    {
        $this->adService = $adService;
    }

    /**
     * 获取通知列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $list = $this->adService->serviceIndex($request);

        return $this->success($list);
    }

    /**
     * 添加通知
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdStoreRequest $request)
    {
        if ($this->adService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    /**
     * 更新通知
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdUpdateRequest $request)
    {
        if ($this->adService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    /**
     * 删除通知
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->adService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

    /**
     * 删除通知
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function allPositions(Request $request)
    {
        $position_list = $this->adService->allPositions($request);

        return $this->success($position_list);
    }

}
