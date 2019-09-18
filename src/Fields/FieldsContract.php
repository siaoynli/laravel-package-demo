<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 16:37
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Fields;


abstract class FieldsContract
{
    public static function process($filed, $value, $data) : array
    {
        return [$filed=>$value];
    }

}