<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Notice;
use Baimo\Cms\Repositories\Interfaces\NoticeRepositoryInterface;
use Illuminate\Http\Request;

class NoticeRepository implements NoticeRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        return (Notice::select('*')->orderBy('created_at', 'DESC')->paginate($perSize))->toArray();
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
        $delCount = Notice::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Notice::find($updateInfo['id']);

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
        return Notice::create($createInfo->toArray())->id;
    }

    /**
     * 获取指定通知ID的详细信息
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getNoticeDetail(Request $requestParams):array
    {
        $data = Notice::select('id','title','body','created_at')
            ->where('id', $requestParams->id)
            ->get();

        return $data->toArray();
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }
}