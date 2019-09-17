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


use Carbon\Carbon;
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


    /** @test */
    public function a_date_field_gets_parsed(){

        $pressFileParser=new PressFileParser("---\ndate: May 14, 1988\n---\n");

        $data=$pressFileParser->getData();

        $this->assertInstanceOf(Carbon::class,$data['date']);
        $this->assertEquals("05/14/1988",$data["date"]->format("m/d/Y"));
    }

}