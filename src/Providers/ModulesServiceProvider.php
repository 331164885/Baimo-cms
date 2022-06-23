<?php

namespace Baimo\Cms\Providers;

use Baimo\Cms\Commands\Install;
use Baimo\Cms\Commands\Publish;
use Baimo\Cms\Models\Setting;
use Baimo\Cms\Repositories\MenuRepository;
use Baimo\Cms\Services\MenuService;
use Baimo\Cms\Services\SlidershowService;
use Baimo\Core\Repositories\Interfaces\RepositoryInterface;
use Baimo\Core\Services\Interfaces\ServiceInterface;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(ServiceServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        $this->commands([
            Install::class,
            Publish::class
        ]);
    }

    public function boot()
    {
        /*
         * 从数据库获取站点设置,并保存到容器
         */
        $CMSConfig = (new Setting())->allToArray();

        // 合并配置信息
        $this->app['config']->set('baimocms', $CMSConfig);

        /*// 注册扩展包的视图
        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'core');

        // 发布视图
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/base')
        ], 'views');

        // 发布静态资源
        $this->publishes([
            __DIR__.'/../../resources/js' => resource_path('js'),
            __DIR__.'/../../resources/scss' => resource_path('scss')
        ], 'resources');

        // 发布public文件夹静态资源
        $this->publishes([
            __DIR__.'/../../public' => public_path()
        ], 'public');*/

        // 发布基础数据库文件
        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../../database/seeders' => database_path('seeders'),
        ], 'seeders');
    }


}