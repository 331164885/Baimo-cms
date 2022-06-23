<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\SettingRepositoryInterface;
use Baimo\Cms\Services\Interfaces\SettingServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingService implements SettingServiceInterface
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function serviceIndex($request = ''): array
    {
        return $this->settingRepository->repositoryIndex(function (){}, (int)$request['size']);
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->settingRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->settingRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($deleteWhere): int
    {
        return $this->settingRepository->repositoryDestroy($deleteWhere);
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