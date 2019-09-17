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
        $this->explodeData();
        $this->processField();
    }

    public function getData()
    {
        return $this->data;
    }

    private function spiltFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->data);
    }

    private function explodeData()
    {

        $data = trim($this->data[1]);
        foreach (explode(PHP_EOL, $data) as $string) {
            $arr = explode(":", $string);
            $this->data[trim($arr[0])] = trim($arr[1]);
        }

        $this->data["body"] = trim($this->data[2]);

    }

    private function processField()
    {
        foreach ($this->data as $field => $value) {
            $class = "Siaoynli\\Press\\Fields\\" . ucfirst($field);
            if (class_exists($class) && method_exists($class, "process")) {
                $this->data = array_merge($this->data, $class::process($field, $value));
            }
        }
    }
}