<?php

namespace Baimo\Cms\Models;

use Baimo\Core\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Setting extends BaseModel
{
    use SoftDeletes;

    protected $table = 'baimo_settings';

    protected $datas = ['deleted_at'];

    protected $fillable = ['group_name', 'key_name', 'value'];

    public function allToArray(): array
    {
        $config = [];

        try {
            foreach ($this->get() as $object) {
                $key = $object->key_name;
                if ($object->group_name != 'config') {
                    $config[$object->group_name][$key] = $object->value;
                } else {
                    $config[$key] = $object->value;
                }
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }

        return $config;
    }
}
