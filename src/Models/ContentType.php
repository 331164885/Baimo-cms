<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentType extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_content_types';

    protected $datas = ['deleted_at'];
}
