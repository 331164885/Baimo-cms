<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Tag;
use Baimo\Cms\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TagRepository implements TagRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (Tag::select('*')->orderBy('sort', 'desc')->paginate($perSize))->toArray();
    }

    public function repositoryStore(Request $createInfo): int
    {
        return Tag::create($createInfo->toArray())->id;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Tag::find($updateInfo['id']);

        $tag->fill($updateInfo->toArray());

        if($tag->isDirty()) {
            foreach ($tag->getDirty() as $key=>$item) {
                $tag->$key = $item;
            }
        }
        $tag->save();

        return 1;
    }

    public function repositoryDestroy($deleteWhere): int
    {
        $delCount = Tag::destroy($deleteWhere);

        return $delCount;
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