<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 10:49
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Tests;


use Orchestra\Testbench\TestCase;

use Siaoynli\Press\MarkdownParser;

class MarkdownTest extends TestCase
{
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $this->assertEquals(MarkdownParser::parse("# hello"),"<h1>hello</h1>");

    }

}