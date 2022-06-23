<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Article;
use Baimo\Cms\Models\ContentType;
use Baimo\Cms\Models\Menu;
use Baimo\Cms\Models\Tag;
use Baimo\Cms\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        $where = [];
        if ($closure()->menu !== 'all') {
            $where = ['menu_id'=>$closure()->menu];
        }
        return (Article::with('menu')->select('*')->where($where)->orderBy('created_at', 'DESC')->paginate($perSize))->toArray();
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
        $delCount = Article::destroy($deleteWhere);

        return $delCount;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        $tag = Article::find($updateInfo['id']);

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
        return Article::create($createInfo->toArray())->id;
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    public function getArticleListByMenuType(Request $requestParams)
    {
        $data = Article::with(['menu:id,parent_id,name,url', 'menu.parent:id,name,url'])
            ->whereHas('menu',function($query) use ($requestParams){
                $query->where('url', $requestParams->page_name);
            })
            ->where(['is_show'=>'1'])
            ->select('id', 'menu_id','author','subject','created_at')
            ->orderBy('created_at', 'DESC')
            ->paginate($requestParams->size);

        return $data->toArray();
    }

    /**
     * 获取指定文章ID的详细信息
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getAticleDetail(Request $requestParams):array
    {
        $data = Article::select('id', 'menu_id','author','source','subject','body','created_at')
            ->where('id', $requestParams->id)
            ->get();

        return $data->toArray();
    }

    /**
     * 获取指定文章ID的上一条记录
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getPreviousRecord(Request $requestParams): array
    {
        $url = '/'.$requestParams->page_name;

        $previousRecord = Menu::with(['article'=>function($query) use($requestParams) {
            $query->select('id', 'menu_id', 'subject')->where('id', '<', $requestParams->id)->limit(1)->orderBy('id', 'DESC');
        }])->select('id','name')
            ->where('url', 'like', "%".$url."%")
            ->get();
        return $previousRecord->toArray();
    }

    /**
     * 获取指定文章ID的下一条记录
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getNextRecord(Request $requestParams): array
    {
        $url = '/'.$requestParams->page_name;
        $previousRecord = Menu::with(['article'=>function($query) use($requestParams) {
            $query->select('id', 'menu_id', 'subject')->where('id', '>', $requestParams->id)->limit(1)->orderBy('id', 'ASC');
        }])->select('id','name')
            ->where('url', '=', $url)
            ->get();

        return $previousRecord->toArray();
    }

    /**
     * 获取全部记录
     *
     * @return array
     **/
    public function all(): array
    {
        return (Article::orderBy('created_at', 'DESC')->get())->toArray();
    }

    public function getTags(): array
    {
        return (Tag::select('*')->get())->toArray();
    }
}
