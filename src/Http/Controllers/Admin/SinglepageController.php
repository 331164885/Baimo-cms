<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\FriendlinkStoreRequest;
use Baimo\Cms\Http\Requests\FriendlinkUpdateRequest;
use Baimo\Cms\Http\Requests\SinglepageStoreRequest;
use Baimo\Cms\Http\Requests\SinglepageUpdateRequest;
use Baimo\Cms\Services\Interfaces\SinglepageServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SinglepageController extends Controller
{
    protected $singlepageService;

    public function __construct(SinglepageServiceInterface $singlepageService)
    {
        $this->singlepageService = $singlepageService;
    }

    /**
     * 获取单页列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->singlepageService->serviceIndex($request);

        return $this->success($list);
    }

    /**
     * 添加单页
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SinglepageStoreRequest $request)
    {
        if ($this->singlepageService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    /**
     * 更新单页
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SinglepageUpdateRequest $request)
    {
        if ($this->singlepageService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    /**
     * 删除单页
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->singlepageService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

}
