<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_ads';

    protected $datas = ['deleted_at'];

    protected $fillable = ['name', 'image_link', 'url', 'is_show', 'position'];

    public function position_info()
    {
        return $this->hasOne(AdPosition::class, 'id', 'position');
    }
}
