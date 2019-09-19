<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 16:47
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Siaoynli\Press\Console\ProcessCommand;
use \Siaoynli\Press\Facades\Press;
use Siaoynli\Press\Fields\Body;
use Siaoynli\Press\Fields\Date;
use Siaoynli\Press\Fields\Description;
use Siaoynli\Press\Fields\Extra;
use Siaoynli\Press\Fields\Title;

class PressBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();

    }

    public function register()
    {

        $this->commands([
            ProcessCommand::class,
        ]);

    }

    private function registerResources()
    {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', "press");
        $this->registerFacades();
        $this->registerRoutes();
        $this->registerFields();
    }

    private function registerPublishing()
    {

        // press-config : vendor:publish   tag 名称
        $this->publishes([
            __DIR__ . '/../config/press.php' => config_path("press.php")
        ], "press-config");

    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {

        return [
            "prefix" => Press::path(),
            "namespace" => "Siaoynli\Press\Http\Controllers",
        ];
    }

    private function registerFacades()
    {
        $this->app->singleton("Press", function ($app) {
            return new \Siaoynli\Press\Press();
        });
    }

    private function registerFields()
    {
        Press::fields([
            Body::class,
            Date::class,
            Description::class,
            Extra::class,
            Title::class,
        ]);
    }

}