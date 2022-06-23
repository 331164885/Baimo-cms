<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friendlink extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_friendlinks';

    protected $datas = ['deleted_at'];

    protected $fillable = ['name', 'link', 'icon', 'sort', 'is_show'];
}
