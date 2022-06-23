<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Ad;
use Baimo\Cms\Models\AdPosition;
use Baimo\Cms\Repositories\Interfaces\AdRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdRepository implements AdRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (Ad::with('position_info')->select('*')->paginate($perSize))->toArray();
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
        $delCount = Ad::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Ad::find($updateInfo['id']);

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
        return Ad::create($createInfo->toArray())->id;
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    public function allPositions(Request $request) {
        return (AdPosition::all())->toArray();
    }
}