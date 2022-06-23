<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Friendlink;
use Baimo\Cms\Repositories\Interfaces\FriendlinkRepositoryInterface;
use Illuminate\Http\Request;

class FriendlinkRepository implements FriendlinkRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (Friendlink::select('*')->orderBy('sort', 'desc')->paginate($perSize))->toArray();
    }

    public function repositoryStore(Request $createInfo): int
    {
        return Friendlink::create($createInfo->toArray())->id;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Friendlink::find($updateInfo['id']);

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
        $delCount = Friendlink::destroy($deleteWhere);

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