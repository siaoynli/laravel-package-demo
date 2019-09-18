<?php
/*
* @Author: hzwlxy
* @Email: 120235331@qq.com
* @Github: http：//www.github.com/siaoynli
* @Date: 2019/9/18 9:39
* @Version: 
* @Description:  
*/

namespace Siaoynli\Press\Tests;


use Siaoynli\Press\PressBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__ . '/../database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            PressBaseServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

        //自定义数据库链接
//        $app["config"]->set("database.default", "testdb");
//        $app["config"]->set("database.connections.mysql",
//            [
//                "driver" => "mysql",
//                "database" => ":memory:"
//            ]
//        );

        $app["config"]->set("database.connections.mysql",
            [
                "driver" => "mysql",
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'testdb',
                'username' => 'root',
                'password' => 'root',
            ]
        );
    }

}