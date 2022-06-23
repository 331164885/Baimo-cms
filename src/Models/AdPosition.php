<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdPosition extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_ad_position';

    protected $datas = ['deleted_at'];

    protected $fillable = ['name', 'sign'];

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'id', 'position');
    }
}
