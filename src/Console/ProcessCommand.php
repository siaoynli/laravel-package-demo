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
use Siaoynli\Press\Press;
use Siaoynli\Press\PressFileParser;

class ProcessCommand extends Command
{
    protected $signature = "press:process";


    protected $description = "Update blog posts";


    public function handle()
    {

        if (Press::configNotPublish()) {
            return $this->warn("please publish the config file by runing 'php artisan vendor:publish --tag=press-config'");
        }

        try{

            $posts = Press::driver()->fetchPosts();
            foreach ($posts as $post) {
                Post::create([
                    'identifier' => $post['identifier'],
                    "slug" => Str::slug($post['title']),
                    "title" => $post['title'],
                    "body" => $post['body'],
                    "extra" => $post['extra'] ?? ''
                ]);
            }
        }catch (\Exception $e) {

            $this->error($e->getMessage());
        }
    }

}