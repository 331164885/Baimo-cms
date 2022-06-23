<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_tags';

    protected $datas = ['deleted_at'];

    protected $fillable = ['name', 'sort'];
}
