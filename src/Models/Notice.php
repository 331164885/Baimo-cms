<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Notice extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_notices';

    protected $datas = ['deleted_at'];

    protected $fillable = ['title', 'description', 'body', 'sort', 'is_top', 'is_show'];

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y/m/d');
    }
}
