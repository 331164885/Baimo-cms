<?php

namespace Baimo\Cms\Services;

use Illuminate\Http\Request;
use Baimo\Core\Services\FileUploader;
use Illuminate\Support\Facades\Log;

class UploadService
{
    private $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function upload(Request $request, ?string $fieldName='file'): array
    {
        $file = $this->fileUploader->handle($request->file($fieldName));

        return $file;
    }
}