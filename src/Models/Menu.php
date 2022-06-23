<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_menus';

    protected $datas = ['deleted_at'];

    protected $fillable = ['parent_id', 'name', 'sub_name', 'content_type', 'icon', 'url', 'sort', 'is_index', 'is_show'];

    public function contentType()
    {
        return $this->hasOne(ContentType::class, 'id', 'content_type');
    }

    public function parent()
    {
        return $this->hasOne(get_class($this), 'id', 'parent_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'menu_id', 'id');
    }
}
