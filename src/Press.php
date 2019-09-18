<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 15:44
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press;


class Press
{
    public static function configNotPublish()
    {
        return is_null(config("press"));
    }

    public static function driver()
    {
        $driver = config("press.driver");
        $class="Siaoynli\Press\Drivers\\".ucfirst($driver).'Driver';
        return new $class;
    }
}