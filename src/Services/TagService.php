<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\TagRepositoryInterface;
use Baimo\Cms\Services\Interfaces\TagServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagService implements TagServiceInterface
{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        return $this->tagRepository->repositoryIndex(function (){}, (int)$requestParams['size']);
    }

    public function serviceStore(Request $requestParams): bool
    {
        // Log::info($requestParams);
        return $this->tagRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->tagRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($deleteWhere): int
    {
        return $this->tagRepository->repositoryDestroy($deleteWhere);
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