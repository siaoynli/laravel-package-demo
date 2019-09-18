##  说明
这是一个laravel 包开发实例

+ composer init
+ composer require --dev orchestra/testbench
+ touch .gitignore
+ touch phpunit.xml
+ 创建 tests 目录,并在tests下创建 Feature 和 Unit目录
+  composer.json 添加
```
"autoload": {
        "psr-4": {
            "Siaoynli\\Press\\": "src/"
        }
    },
    "autoload-dev": {
         "psr-4": {
             "Siaoynli\\Press\\Tests\\": "tests/"
         }
    }
```
+ phpunit目录下文件放到window path环境变量下
+ 在Feature目录创建测试类
+ 执行 phpunit
+ 包自动发现,composer加入
``` 
"extra": {
        "laravel": {
            "providers": [
                    "Siaoynli\\Press\\PressBaseServiceProvider"
            ]
        }
    }
```
+ 其他项目本地引入包
```
 "repositories": {
        "dev-package": {
            "type": "path",
            "url": "../laravel-packages/press",
            "options": {
                "symlink": true
            }
        }
    }
```
执行 composer require   Siaoynli/Press