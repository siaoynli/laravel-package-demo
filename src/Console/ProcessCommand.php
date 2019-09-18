<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 13:54
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Console;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Siaoynli\Press\Post;
use Siaoynli\Press\PressFileParser;

class ProcessCommand extends  Command
{
    protected $signature="press:process";


    protected $description="Update blog posts";


    public  function  handle(){
         $files=File::files('blogs');

          foreach ($files as $file){
               $post=(new PressFileParser($file->getPathname()))->getData();
               break;
          }



          Post::create([
              'identifier' => Str::random(),
              "slug" => Str::slug($post['title']),
              "title" => $post['title'],
              "body" => $post['body'],
              "extra" => $post['extra']??''
          ]);
    }

}