<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 17:03
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Repositories;


use Illuminate\Support\Str;
use Siaoynli\Press\Post;

class PostRepository
{
    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier'],
        ], [
            "slug" => Str::slug($post['title']),
            "title" => $post['title'],
            "body" => $post['body'],
            "extra" => $post['extra'] ?? json_encode(array())
        ]);
    }
}