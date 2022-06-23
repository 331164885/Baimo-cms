<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\ContentType;
use Baimo\Cms\Models\Menu;
use Baimo\Cms\Repositories\Interfaces\MenuRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuRepository implements MenuRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        //Log::info($perSize);
        //Log::info((Menu::select('*')->paginate($perSize))->toArray());
        return (Menu::select('*')->paginate($perSize))->toArray();
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
        $delCount = Menu::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Menu::find($updateInfo['id']);

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
        return Menu::create($createInfo->toArray())->id;
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    /**
     * 获取全部菜单记录
     *
     * @return array
     **/
    public function all(): array
    {
        return (Menu::with('contentType')->where('is_show', '1')->get())->toArray();
    }

    public function getMenusForContentTypeID($content_type_ids): array
    {
        return (Menu::select('*')->whereIn('content_type', $content_type_ids)->get())->toArray();
    }

    /**
     * 获取全部内容类型记录
     *
     * @return array
     **/
    public function allContentTypes(): array
    {
        return (ContentType::all())->toArray();
    }
}