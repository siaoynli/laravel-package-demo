<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 11:10
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press;


use Parsedown;

class MarkdownParser
{

    public static function parse($string)
    {
        return Parsedown::instance()->text($string);
    }


}