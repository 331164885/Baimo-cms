<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\FriendlinkStoreRequest;
use Baimo\Cms\Http\Requests\FriendlinkUpdateRequest;
use Baimo\Cms\Services\Interfaces\FriendlinkServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FriendlinkController extends Controller
{
    protected $friendlinkService;

    public function __construct(FriendlinkServiceInterface $friendlinkService)
    {
        $this->friendlinkService = $friendlinkService;
    }

    /**
     * 获取文章列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->friendlinkService->serviceIndex($request);

        return $this->success($list);
    }

    public function store(FriendlinkStoreRequest $request)
    {
        if ($this->friendlinkService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    public function update(FriendlinkUpdateRequest $request)
    {
        if ($this->friendlinkService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->friendlinkService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

}
