<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\SlideshowRepositoryInterface;
use Baimo\Cms\Services\Interfaces\SlideshowServiceInterface;
use Illuminate\Http\Request;

class SlideshowService implements SlideshowServiceInterface
{
    protected $slideshowRepository;

    public function __construct(SlideshowRepositoryInterface $slideshowRepository)
    {
        $this->slideshowRepository = $slideshowRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->slideshowRepository->repositoryIndex(function (){}, (int)$requestParams['size']);

        return $list;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->slideshowRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->slideshowRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->slideshowRepository->repositoryDestroy($requestParams);
    }

    public function serviceShow(Request $requestParams): array
    {
        // TODO: Implement serviceShow() method.
    }

    public function serviceEdit(Request $requestParams): int
    {
        // TODO: Implement serviceEdit() method.
    }

    public function serviceCreate(Request $requestParams): bool
    {
        // TODO: Implement serviceCreate() method.
    }
}