<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 10:03
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Siaoynli\Press\Post;

//注意:这里的TestCase是自己重写的,否则不会执行数据库初始化之类的操作
class SavePostTest extends  TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_post_can_be_created_with_factory()
    {
        $post = factory(Post::class,10)->create();
        $this->assertCount(10, Post::all());
   }
}