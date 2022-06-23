<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Slideshow;
use Baimo\Cms\Repositories\Interfaces\SlideshowRepositoryInterface;
use Illuminate\Http\Request;

class SlideshowRepository implements SlideshowRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSiz): array
    {
        return (Slideshow::select('*')->paginate($perSiz))->toArray();
    }

    public function repositoryStore(Request $createInfo): int
    {
        return Slideshow::create($createInfo->toArray())->id;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Slideshow::find($updateInfo['id']);

        $tag->fill($updateInfo->toArray());

        if($tag->isDirty()) {
            foreach ($tag->getDirty() as $key=>$item) {
                $tag->$key = $item;
            }
        }
        $tag->save();

        return 1;
    }

    public function repositoryDestroy(array $deleteWhere): int
    {
        $delCount = Slideshow::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryEdit(\Closure $closure): array
    {
        // TODO: Implement repositoryEdit() method.
    }

    public function repositoryCreate(Request $createInfo): int
    {
        // TODO: Implement repositoryCreate() method.
    }
}