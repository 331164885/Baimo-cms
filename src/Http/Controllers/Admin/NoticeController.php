<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\NoticeStoreRequest;
use Baimo\Cms\Http\Requests\NoticeUpdateRequest;
use Baimo\Cms\Services\Interfaces\NoticeServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NoticeController extends Controller
{
    protected $noticeService;

    public function __construct(NoticeServiceInterface $noticeService)
    {
        $this->noticeService = $noticeService;
    }

    /**
     * 获取通知列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->noticeService->serviceIndex($request);

        return $this->success($list);
    }

    /**
     * 添加通知
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NoticeStoreRequest $request)
    {
        if ($this->noticeService->serviceStore($request)) {
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
    public function update(NoticeUpdateRequest $request)
    {
        if ($this->noticeService->serviceUpdate($request)) {
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
        if ($this->noticeService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

}
