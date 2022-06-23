<?php

namespace Baimo\Cms\Providers;

use Baimo\Cms\Repositories\Interfaces\AdRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\ArticleRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\FriendlinkRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\MenuRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\NoticeRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\SettingRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\SinglepageRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\SlideshowRepositoryInterface;
use Baimo\Cms\Repositories\Interfaces\TagRepositoryInterface;
use Baimo\Cms\Repositories\MenuRepository;
use Baimo\Cms\Repositories\ArticleRepository;
use Baimo\Cms\Repositories\NoticeRepository;
use Baimo\Cms\Repositories\AdRepository;
use Baimo\Cms\Repositories\SettingRepository;
use Baimo\Cms\Repositories\SinglepageRepository;
use Baimo\Cms\Repositories\SlideshowRepository;
use Baimo\Cms\Repositories\FriendlinkRepository;
use Baimo\Cms\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
        $this->app->bind(SlideshowRepositoryInterface::class, SlideshowRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(FriendlinkRepositoryInterface::class, FriendlinkRepository::class);
        $this->app->bind(SinglepageRepositoryInterface::class, SinglepageRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(NoticeRepositoryInterface::class, NoticeRepository::class);
        $this->app->bind(AdRepositoryInterface::class, AdRepository::class);
    }
}