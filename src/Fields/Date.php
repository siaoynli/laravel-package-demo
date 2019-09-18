<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 15:44
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Fields;


use Carbon\Carbon;

class Date extends  FieldsContract
{

    public static function process($field, $value, $data) :array
    {
        return [
            $field => Carbon::parse($value),
        ];
    }

}