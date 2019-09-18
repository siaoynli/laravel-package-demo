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
    public  function configNotPublish()
    {
        return is_null(config("press"));
    }

    public  function driver()
    {
        $driver = config("press.driver");
        $class="Siaoynli\Press\Drivers\\".ucfirst($driver).'Driver';
        return new $class;
    }

    public  function path()
    {
        return config("press.path","press");
    }
}