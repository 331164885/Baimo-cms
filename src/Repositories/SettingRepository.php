<?php

namespace Baimo\Cms\Repositories;

use Baimo\Cms\Models\Friendlink;
use Baimo\Cms\Models\Setting;
use Baimo\Cms\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use stdClass;

class SettingRepository implements SettingRepositoryInterface
{
    public function repositoryIndex(\Closure $closure, int $perSize): array
    {
        $data = new stdClass();
        foreach (Setting::get() as $model) {
            $value = is_numeric($model->value) ? (int) $model->value : $model->value;
            $group_name = $model->group_name;
            $key_name = $model->key_name;
            if ($group_name != 'config') {
                if (!isset($data->{$group_name})) {
                    $data->{$group_name} = new stdClass();
                }
                $data->{$group_name}->{$key_name} = $value;
            } else {
                $data->{$key_name} = $value;
            }
        }

        return json_decode(json_encode($data, true), true);
    }

    public function repositoryStore(Request $createInfo): int
    {
        $data = $createInfo->except('_token', 'image');

        if ($createInfo->hasFile('image')) {
            $fileUploader = $createInfo->image;

            $validator = Validator::make($createInfo->all(), [
                'image' => 'image',
            ]);

            if ($validator->passes()) {
                $file = $fileUploader->handle($createInfo->file('image'), 'settings');
                $data['image'] = $file['filename'];
            }
        }

        foreach ($data as $group_name => $array) {
            if (!is_array($array)) {
                $array = [$group_name => $array];
                $group_name = 'config';
            }
            foreach ($array as $key_name => $value) {
                $model = Setting::firstOrCreate(['key_name' => $key_name, 'group_name' => $group_name]);
                $model->value = $value;
                $model->save();
            }
        }

        return 1;
    }

    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryDestroy($deleteWhere): int
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryShow(\Closure $closure): array
    {
        // TODO: Implement repositoryShow() method.
    }

    public function repositoryCreate(Request $createInfo): int
    {
        // TODO: Implement repositoryCreate() method.
    }

    public function repositoryEdit(\Closure $closure): array
    {
        // TODO: Implement repositoryEdit() method.
    }
}