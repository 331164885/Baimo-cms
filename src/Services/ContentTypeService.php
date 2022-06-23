<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\ContentTypeRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\TagRepositoryInterface;
use Baimo\Cms\Services\Interfaces\TagServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContentTypeService implements TagServiceInterface
{
    protected $contentTypeRepository;

    public function __construct(ContentTypeRepositoryInterface $contentTypeRepository)
    {
        $this->contentTypeRepository = $contentTypeRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        return $this->contentTypeRepository->repositoryIndex(function (){}, (int)$requestParams['size']);
    }

    public function serviceStore(Request $requestParams): bool
    {
        // TODO: Implement serviceCreate() method.
    }

    public function serviceUpdate(Request $requestParams): int
    {
        // TODO: Implement serviceCreate() method.
    }

    public function serviceDestroy($deleteWhere): int
    {
        // TODO: Implement serviceCreate() method.
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