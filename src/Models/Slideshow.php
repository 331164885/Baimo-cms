<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slideshow extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_slideshows';

    protected $datas = ['deleted_at'];

    protected $fillable = ['title', 'description', 'image', 'url', 'sort', 'is_show'];
}