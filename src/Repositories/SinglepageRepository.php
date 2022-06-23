<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Singlepage;
use Baimo\Cms\Repositories\Interfaces\SinglepageRepositoryInterface;
use Illuminate\Http\Request;

class SinglepageRepository implements SinglepageRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (Singlepage::with('menu')->select('*')->paginate($perSize))->toArray();
    }

    public function repositoryCreate(Request $createInfo): int
    {
        // TODO: Implement repositoryIndex() method.
    }

    public function repositoryEdit(\Closure $closure): array
    {
        // TODO: Implement repositoryEdit() method.
    }

    public function repositoryDestroy(array $deleteWhere): int
    {
        $delCount = Singlepage::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Singlepage::find($updateInfo['id']);

        $tag->fill($updateInfo->toArray());

        if($tag->isDirty()) {
            foreach ($tag->getDirty() as $key=>$item) {
                $tag->$key = $item;
            }
        }
        $tag->save();

        return 1;
    }

    public function repositoryStore(Request $createInfo): int
    {
        return Singlepage::create($createInfo->toArray())->id;
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }
}