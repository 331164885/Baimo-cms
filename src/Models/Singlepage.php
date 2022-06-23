<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Singlepage extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_singlepages';

    protected $datas = ['deleted_at'];

    protected $fillable = ['title', 'meta_keywords', 'meta_description', 'body', 'menu_id', 'css', 'javascript'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
