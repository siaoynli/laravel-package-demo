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

class PressBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->registerResources();

    }

    public function register()
    {

    }

    private function registerResources()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    }

}