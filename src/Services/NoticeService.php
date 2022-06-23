<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\NoticeRepositoryInterface;
use Baimo\Cms\Services\Interfaces\NoticeServiceInterface;
use Illuminate\Http\Request;

class NoticeService implements NoticeServiceInterface
{
    protected $noticeRepository;

    public function __construct(NoticeRepositoryInterface $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        $list = $this->noticeRepository->repositoryIndex(function (){}, (int)$requestParams['size']);

        return $list;
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->noticeRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->noticeRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($requestParams): int
    {
        return $this->noticeRepository->repositoryDestroy($requestParams);
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

    /**
     * 前端Api
     * 获取文章详细信息
     *
     * @param Request $requestParams
     *
     * @return array
     **/
    public function getNoticeDetail(Request $requestParams):array
    {
        // 获取当前通知信息
        $data = $this->noticeRepository->getNoticeDetail($requestParams);

        return $data;
    }

}