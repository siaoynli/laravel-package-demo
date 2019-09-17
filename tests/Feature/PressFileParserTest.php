<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 11:30
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Tests;


use Orchestra\Testbench\TestCase;
use Siaoynli\Press\PressFileParser;

class PressFileParserTest extends  TestCase
{
    /** @test */
    public function the_head_and_body_spilt(){
         $pressFileParser=new PressFileParser(__DIR__.'/../blogs/MarkFile1.md');

         $data=$pressFileParser->getData();

         $this->assertStringContainsString('title: My Title',$data[1]);
         $this->assertStringContainsString('description: Description here',$data[1]);
         $this->assertStringContainsString('Blog post body here',$data[2]);
    }

}