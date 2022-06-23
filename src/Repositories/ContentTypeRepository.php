<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\ContentType;
use Baimo\Cms\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ContentTypeRepository implements TagRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (ContentType::select('*')->orderBy('sort', 'desc')->get())->toArray();
    }

    public function repositoryStore(Request $createInfo): int
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryDestroy($deleteWhere): int
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryCreate(Request $createInfo): int
    {
        // TODO: Implement repositoryCreate() method.
    }

    public function repositoryEdit(\Closure $closure): array
    {
        // TODO: Implement repositoryEdit() method.
    }
}