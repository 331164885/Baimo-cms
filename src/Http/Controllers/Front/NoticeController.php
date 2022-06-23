<?php

namespace Baimo\Cms\Http\Controllers\Front;

use Baimo\Cms\Services\Interfaces\NoticeServiceInterface;
use Baimo\Core\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;

class NoticeController extends BaseApiController
{
    protected $noticeService;

    public function __construct(NoticeServiceInterface $noticeService)
    {
        $this->noticeService = $noticeService;
    }

    public function getNoticeDetail(Request $request)
    {
        return $this->success($this->noticeService->getNoticeDetail($request));
    }
}