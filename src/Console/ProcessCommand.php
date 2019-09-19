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
use  Siaoynli\Press\Facades\Press;
use Siaoynli\Press\Repositories\PostRepository;


class ProcessCommand extends Command
{
    protected $signature = "press:process";


    protected $description = "Update blog posts";


    public function handle(PostRepository $postRepository)
    {

        if (Press::configNotPublish()) {
            return $this->warn("please publish the config file by runing 'php artisan vendor:publish --tag=press-config'");
        }

        try {

            $posts = Press::driver()->fetchPosts();
            $this->info("number of Posts:" . count($posts));
            foreach ($posts as $post) {
                $postRepository->save($post);
                $this->info("Post:" . $post['title']);
            }
        } catch (\Exception $e) {

            $this->error($e->getMessage());
        }
    }

}