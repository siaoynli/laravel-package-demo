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
use Illuminate\Support\Arr;

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
            "extra" => $this->extra($post)
        ]);
    }

    private function extra($post)
    {

        $extra = json_decode($post["extra"] ?? '[]');

        $attributes= Arr::except($post,['title','body','extra']);


        return json_encode(array_merge($extra,$attributes));

    }
}