<?php

namespace Baimo\Cms\Http\Controllers\Admin;


use Baimo\Cms\Services\UploadService;
use Baimo\Core\Http\Controllers\BaseApiController as Controller;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function upload(Request $request)
    {

        $file_info = $this->uploadService->upload($request);

        return response()->json([
            'location'    => $file_info['location']
        ], 200);
    }
}
