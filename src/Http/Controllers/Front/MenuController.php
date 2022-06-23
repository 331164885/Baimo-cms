<?php

namespace Baimo\Cms\Http\Controllers\Front;

use Baimo\Cms\Services\Interfaces\MenuServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController;

class MenuController extends BaseApiController
{
    protected $menuService;

    public function __construct(MenuServiceInterface $menuService)
    {
        $this->menuService = $menuService;
    }

    public function menus()
    {
        return $this->success($this->menuService->allMenus());
    }
}