<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Article extends BaseModel
{
    use SoftDeletes;
    //use DefaultDatetimeFormat;

    protected $table = 'baimo_articles';

    protected $datas = ['deleted_at'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = ['menu_id', 'subject', 'body', 'tag', 'author', 'source', 'front_cover', 'pageviews', 'meta_keywords', 'meta_description', 'is_top', 'is_recommend', 'is_show', 'created_at'];

    /*public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y/m/d');
    }*/

    public function menu()
    {
        //return $this->belongsTo(Menu::class, 'menu_id', 'id');
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

}
