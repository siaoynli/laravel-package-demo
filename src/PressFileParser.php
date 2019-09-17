<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/17 11:28
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press;


use Illuminate\Support\Facades\File;

class PressFileParser
{
    private $filename;
    private $data;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->spiltFile();
    }

    public function getData()
    {
        return $this->data;
    }

    private function spiltFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s',
            File::get($this->filename),
            $this->data);
    }
}