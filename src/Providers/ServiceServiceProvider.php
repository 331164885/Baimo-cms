<?php

namespace Baimo\Cms\Providers;

use Baimo\Cms\Services\FriendlinkService;
use Baimo\Cms\Services\Interfaces\AdServiceInterface;
use Baimo\Cms\Services\Interfaces\ArticleServiceInterface;
use Baimo\Cms\Services\Interfaces\FriendlinkServiceInterface;
use Baimo\Cms\Services\Interfaces\MenuServiceInterface;
use Baimo\Cms\Services\Interfaces\NoticeServiceInterface;
use Baimo\Cms\Services\Interfaces\SettingServiceInterface;
use Baimo\Cms\Services\Interfaces\SinglepageServiceInterface;
use Baimo\Cms\Services\Interfaces\SlideshowServiceInterface;
use Baimo\Cms\Services\Interfaces\TagServiceInterface;
use Baimo\Cms\Services\MenuService;
use Baimo\Cms\Services\ArticleService;
use Baimo\Cms\Services\NoticeService;
use Baimo\Cms\Services\AdService;
use Baimo\Cms\Services\SettingService;
use Baimo\Cms\Services\SinglepageService;
use Baimo\Cms\Services\SlideshowService;
use Baimo\Cms\Services\TagService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
        $this->app->bind(SlideshowServiceInterface::class, SlideshowService::class);
        $this->app->bind(TagServiceInterface::class, TagService::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(FriendlinkServiceInterface::class, FriendlinkService::class);
        $this->app->bind(SinglepageServiceInterface::class, SinglepageService::class);
        $this->app->bind(SettingServiceInterface::class, SettingService::class);
        $this->app->bind(NoticeServiceInterface::class, NoticeService::class);
        $this->app->bind(AdServiceInterface::class, AdService::class);
    }
}