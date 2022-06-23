<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\AdRepositoryInterface;
use Baimo\Cms\Services\Interfaces\AdServiceInterface;
use Illuminate\Http\Request;

class AdService implements AdServiceInterface
{
    protected $adRepository;

    public function __construct(AdRepositoryInterface $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->adRepository->repositoryIndex(function (){}, (int)$requestParams['size']);

        return $list;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->adRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->adRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->adRepository->repositoryDestroy($requestParams);
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
    public function allPositions(Request $request):array
    {
        return $this->adRepository->allPositions($request);
    }
}