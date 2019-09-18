<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 15:58
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Drivers;


use Siaoynli\Press\PressFileParser;

abstract  class Driver
{
     protected  $posts=[];
     protected  $config;

     public function __construct()
     {
         $this->setConfig();
         $this->validateSource();
     }

    private function setConfig()
    {
        $this->config=config("press.".config("press.driver"));
    }

    protected function validateSource()
    {
        return true;
    }

    protected function parse($getPathname,  $identifier)
    {
        $this->posts[]= array_merge(
            (new PressFileParser($getPathname))->getData(),
            ["identifier"=>$identifier]
        );
    }
}