<?php

namespace Baimo\Cms\Providers;

use Baimo\Cms\Http\Controllers\Admin\AdController;
use Baimo\Cms\Http\Controllers\Admin\ArticleController;
use Baimo\Cms\Http\Controllers\Admin\FriendlinkController;
use Baimo\Cms\Http\Controllers\Admin\MenuController;
use Baimo\Cms\Http\Controllers\Admin\NoticeController;
use Baimo\Cms\Http\Controllers\Admin\SettingController;
use Baimo\Cms\Http\Controllers\Admin\SinglepageController;
use Baimo\Cms\Http\Controllers\Admin\SlideshowController;
use Baimo\Cms\Http\Controllers\Admin\TagController;
use Baimo\Cms\Http\Controllers\Admin\UploadController;
use Baimo\Cms\Http\Controllers\Front\BaseController as FrontBaseController;
use Baimo\Cms\Http\Controllers\Front\MenuController as FrontMenuController;
use Baimo\Cms\Http\Controllers\Front\NoticeController as FrontNoticeController;
use Baimo\Cms\Http\Controllers\Front\ArticleController as FrontArticleController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        /**
         * Core admin routes
         **/
        Route::prefix('api')->group(function (Router $router) {
            Route::middleware(['jwt.auth', 'baimo.base-log'])->group(function (Router $router) {
                // 需要检查权限
                Route::middleware(['baimo.base-permission'])->prefix('admin')->group(function (Router $router) {

                    $router->get('/menus',[MenuController::class, 'index']);            // 菜单列表
                    $router->post('/menus', [MenuController::class, 'store']);          // 添加菜单
                    $router->put('/menus/{id}',[MenuController::class, 'update']);      // 更新菜单
                    $router->delete('/menus/{id}',[MenuController::class, 'destroy']);  // 删除菜单

                    $router->get('/tags',[TagController::class, 'index']);            // 标签列表
                    $router->post('/tags', [TagController::class, 'store']);          // 添加标签
                    $router->put('/tags/{id}',[TagController::class, 'update']);      // 更新标签
                    $router->delete('/tags/{id}',[TagController::class, 'destroy']);  // 删除标签

                    $router->get('/posts',[ArticleController::class, 'index']);            // 内容列表
                    $router->post('/posts', [ArticleController::class, 'store']);          // 添加内容
                    $router->put('/posts/{id}',[ArticleController::class, 'update']);      // 更新内容
                    $router->delete('/posts/{id}',[ArticleController::class, 'destroy']);  // 删除内容

                    $router->get('/slides',[SlideshowController::class, 'index']);            // 幻灯列表
                    $router->post('/slides', [SlideshowController::class, 'store']);          // 添加幻灯
                    $router->put('/slides/{id}',[SlideshowController::class, 'update']);      // 更新幻灯
                    $router->delete('/slides/{id}',[SlideshowController::class, 'destroy']);  // 删除幻灯

                    $router->get('/friendlinks',[FriendlinkController::class, 'index']);            // 友情链接列表
                    $router->post('/friendlinks', [FriendlinkController::class, 'store']);          // 添加友情链接
                    $router->put('/friendlinks/{id}',[FriendlinkController::class, 'update']);      // 更新友情链接
                    $router->delete('/friendlinks/{id}',[FriendlinkController::class, 'destroy']);  // 删除友情链接

                    $router->get('/singlepages',[SinglepageController::class, 'index']);            // 单页列表
                    $router->post('/singlepages', [SinglepageController::class, 'store']);          // 添加单页
                    $router->put('/singlepages/{id}',[SinglepageController::class, 'update']);      // 更新单页
                    $router->delete('/singlepages/{id}',[SinglepageController::class, 'destroy']);  // 删除单页

                    $router->get('/notices',[NoticeController::class, 'index']);            // 通知列表
                    $router->post('/notices', [NoticeController::class, 'store']);          // 添加通知
                    $router->put('/notices/{id}',[NoticeController::class, 'update']);      // 更新通知
                    $router->delete('/notices/{id}',[NoticeController::class, 'destroy']);  // 删除通知

                    $router->get('/ads',[AdController::class, 'index']);            // 广告列表
                    $router->post('/ads', [AdController::class, 'store']);          // 添加广告
                    $router->put('/ads/{id}',[AdController::class, 'update']);      // 更新广告
                    $router->delete('/ads/{id}',[AdController::class, 'destroy']);  // 删除广告

                    $router->get('/settings', [SettingController::class, 'index']);      // 设置列表
                    $router->post('/settings', [SettingController::class, 'store']);      // 保存设置
                });

                // 不需要检查权限
                Route::prefix('admin')->group(function (Router $router) {
                    $router->get('/taglist', [ArticleController::class, 'getTags']);      // 内容类型列表
                });

                $router->post('/admin/get_menus_for_content_type_id',[MenuController::class, 'getMenusForContentTypeID']); //获取所有菜单
                $router->get('/admin/all_menus',[MenuController::class, 'allMenus']);                   //获取所有菜单
                $router->post('/admin/get_position_list',[AdController::class, 'allPositions']);           //获取广告位置列表
                $router->get('/admin/all_content_types',[MenuController::class, 'allContentTypes']);    //获取所有菜单

            });

            $router->post('/admin/cms/upload',[UploadController::class, 'upload']); // 文件上传


        });

        /**
         * Front api routes
         **/
        Route::prefix('api')->group(function (Router $router) {
            $router->get('/index_data',[FrontBaseController::class, 'indexData']);                              // 首页信息
            $router->get('/sliders',[FrontBaseController::class, 'sliders']);                                   // 基本信息
            $router->get('/image_news',[FrontBaseController::class, 'imageNew']);                               // 图片新闻
            $router->get('/config',[FrontBaseController::class, 'config']);                                     // 基本信息
            $router->get('/menus',[FrontMenuController::class, 'menus']);                                       // 菜单列表
            $router->get('/logo',[FrontBaseController::class, 'logo']);                                         // 获取Logo
            $router->get('/article',[FrontArticleController::class, 'getAticleList']);                          // 文章列表
            $router->get('/article/{page_name}/{id}',[FrontArticleController::class, 'getAticleDetail']);       // 文章详细
            $router->get('/notice',[FrontNoticeController::class, 'getNoticeList']);                            // 文章列表
            $router->get('/notice/{id}',[FrontNoticeController::class, 'getNoticeDetail']);                     // 文章详细
            $router->get('/search',[FrontBaseController::class, 'search']);                                     // 文章详细
            $router->post('/ad',[FrontBaseController::class, 'ad']);                                            // 文章详细


        });
    }
}