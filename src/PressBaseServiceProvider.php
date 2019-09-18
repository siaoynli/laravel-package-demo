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


use Illuminate\Support\ServiceProvider;
use Siaoynli\Press\Console\ProcessCommand;

class PressBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if($this->app->runningInConsole()) {
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

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    }

    private function registerPublishing()
    {

        // press-config : vendor:publish   tag 名称
      $this->publishes([
          __DIR__.'/../config/press.php' => config_path("press.php")
      ],"press-config");

    }

}