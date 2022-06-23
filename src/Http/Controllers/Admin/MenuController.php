<?php

namespace Baimo\Cms\Http\Controllers\Admin;

use Baimo\Cms\Http\Requests\MenusStoreRequest;
use Baimo\Cms\Http\Requests\MenusUpdateRequest;
use Baimo\Cms\Services\Interfaces\MenuServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuServiceInterface $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * 获取菜单列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $list = $this->menuService->serviceIndex($request);

        return $this->success($list);
    }

    public function store(MenusStoreRequest $request)
    {
        if ($this->menuService->serviceStore($request)) {
            return $this->success([
                'msg' => "添加成功"
            ]);
        }
    }

    public function update(MenusUpdateRequest $request)
    {
        if ($this->menuService->serviceUpdate($request)) {
            return $this->success([
                'msg' => "更新成功"
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->menuService->serviceDestroy([$id])) {
            return $this->success([
                'msg' => "删除成功"
            ]);
        }
    }

    public function getMenusForContentTypeID(Request $request)
    {
        $list = $this->menuService->getMenusForContentTypeID($request);

        return $this->success($list);
    }

    public function allMenus()
    {
        $list = $this->menuService->allMenus();

        return response()->json([
            'code'=>200,
            'message'=>'success',
            'data'=>[
                'list'=>$list
            ]
        ]);
    }

    public function allContentTypes()
    {
        $list = $this->menuService->allContentTypes();

        return response()->json([
            'code'=>200,
            'message'=>'success',
            'data'=>[
                'list'=>$list
            ]
        ]);
    }
}
