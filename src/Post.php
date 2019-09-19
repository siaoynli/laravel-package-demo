<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 9:55
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press;


use Illuminate\Database\Eloquent\Model;

class Post extends  Model
{
    protected $guarded=[];


    public  function  extra($field){
        //optional 如果键不存在返回null，不会报错
        return optional(json_decode($this->extra))->$field;
    }
}