<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 16:02
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Fields;


use Siaoynli\Press\MarkdownParser;

class Body extends  FieldsContract
{

    public static function process($field,$value, $data) : array
    {
        return [
            $field=>MarkdownParser::parse($value),
        ];

    }

}