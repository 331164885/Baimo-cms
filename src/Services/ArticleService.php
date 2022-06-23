<?php

namespace Baimo\Cms\Services;

use Baimo\Base\Traits\ToolsTrait;
use Baimo\Cms\Repositories\Interfaces\ArticleRepositoryInterface;
use Baimo\Cms\Services\Interfaces\ArticleServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleService implements ArticleServiceInterface
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->articleRepository->repositoryIndex(function () use ($requestParams) {
            return $requestParams;
        }, (int)$requestParams['size']);

        return $list;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->articleRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->articleRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->articleRepository->repositoryDestroy($requestParams);
    }

    /**
     * 前端Api
     * 通过菜单地址获取文章列表
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getArticleListByMenuType(Request $requestParams):array
    {
        return $this->articleRepository->getArticleListByMenuType($requestParams);
    }

    /**
     * 前端Api
     * 获取文章详细信息
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getAticleDetail(Request $requestParams):array
    {
        // 获取当前文章信息
        $data = $this->articleRepository->getAticleDetail($requestParams);

        // 获取当前文章的上一条信息
        $previousRecord = $this->articleRepository->getPreviousRecord($requestParams);
        // 获取当前文章的下一条信息
        $nextRecord = $this->articleRepository->getNextRecord($requestParams);

        // 当没有上一条记录时
        if(count($previousRecord['0']['article']) == 0) {
            $previousRecord['0']['article'][0]['id'] = $requestParams->id;
            $previousRecord['0']['article'][0]['subject'] = "没有啦！";
        }
        // 当没有下一条记录时
        if(count($nextRecord['0']['article']) == 0) {
            $nextRecord['0']['article'][0]['id'] = $requestParams->id;
            $nextRecord['0']['article'][0]['subject'] = "没有啦！";
        }

        $data[0]['previous'] = $previousRecord[0]['article'][0];
        $data[0]['next'] = $nextRecord[0]['article'][0];

        return $data;
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

    public function getTags(): array
    {
        return $this->articleRepository->getTags();
    }

}