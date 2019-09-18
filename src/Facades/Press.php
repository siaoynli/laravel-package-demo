<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 16:55
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Facades;


use Illuminate\Support\Facades\Facade;

class Press extends  Facade
{
      protected static function getFacadeAccessor()
      {
          return "Press";
      }
}