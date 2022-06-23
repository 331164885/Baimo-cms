<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\SinglepageRepositoryInterface;
use Baimo\Cms\Services\Interfaces\SinglepageServiceInterface;
use Illuminate\Http\Request;

class SinglepageService implements SinglepageServiceInterface
{
    protected $singlepageRepository;

    public function __construct(SinglepageRepositoryInterface $singlepageRepository)
    {
        $this->singlepageRepository = $singlepageRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->singlepageRepository->repositoryIndex(function (){}, (int)$requestParams['size']);

        return $list;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->singlepageRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->singlepageRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->singlepageRepository->repositoryDestroy($requestParams);
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