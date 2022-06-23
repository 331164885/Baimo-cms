<?php

namespace Baimo\Cms\Services;

use Baimo\Base\Traits\ToolsTrait;
use Baimo\Cms\Repositories\Interfaces\MenuRepositoryInterface;
use Baimo\Cms\Repositories\MenuRepository;
use Baimo\Cms\Services\Interfaces\MenuServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuService implements MenuServiceInterface
{
    use ToolsTrait;

    protected $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->menuRepository->repositoryIndex(function (){}, 1000);

        $list['data'] = $this->get_tree($list['data'], 'id', 'parent_id');

        return $list;
    }

    public function allMenus(): array
    {
        $list = $this->menuRepository->all();

        return $this->menuTreeNode($list);
    }

    public function getMenusForContentTypeID($content_type_ids): array
    {
        $list = $this->menuRepository->getMenusForContentTypeID($content_type_ids);

        return $list;
    }

    public function allContentTypes(): array
    {
        return $this->menuRepository->allContentTypes();
    }

    protected function menuTreeNode(array $list, $pid='parent_id'): array
    {
        $data = $this->get_tree($list, $pk = 'id', $pid);

        foreach ($data as &$item) {
            if($item[$pid]==0){
                $item['root'] = true;
            }else{
                $item['root'] = false;
            }
        }

        return $data;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->menuRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->menuRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->menuRepository->repositoryDestroy($requestParams);
    }

    public function serviceCreate(Request $requestParams): bool
    {
        // TODO: Implement serviceCreate() method.
    }

    public function serviceEdit(Request $requestParams): int
    {
        // TODO: Implement serviceEdit() method.
    }

    public function serviceShow(Request $requestParams): array
    {
        // TODO: Implement serviceShow() method.
    }

}