<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\SettingStoreRequest;
use Baimo\Cms\Http\Requests\SettingUpdateRequest;
use Baimo\Cms\Services\Interfaces\SettingServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * 获取设置列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->settingService->serviceIndex($request);

        return $this->success([
            'list'=>$list
        ]);
    }

    public function store(SettingStoreRequest $request)
    {
        if ($this->settingService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    public function update(SettingUpdateRequest $request)
    {
        if ($this->settingService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->settingService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

}
