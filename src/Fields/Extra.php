<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 16:21
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Fields;


class Extra
{
    public static function process($filed, $value, $data) : array
    {
        $extra = isset($data['extra']) ? (array)json_decode($data['extra']) : [];

        return ["extra" => json_encode(array_merge($extra, [$filed => $value]))];
    }

}