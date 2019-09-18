<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 15:50
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Drivers;


use Illuminate\Support\Facades\File;
use Siaoynli\Press\Exceptions\FileDriverDirectoryNotFoundException;


class FileDriver extends Driver
{


    public function fetchPosts()
    {
        $files = File::files($this->config['path']);

        foreach ($files as $file) {
           $this->parse($file->getPathname(),$file->getFilename());

        }

        return $this->posts;
    }

    protected function validateSource()
    {

        if (!File::exists($this->config['path'])) {
            throw  new  FileDriverDirectoryNotFoundException(
               "Director: at ".$this->config['path']." does not exist"
            );
        }
    }


}