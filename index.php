<?php

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
use Think\App;

define('APP_DEBUG', true);
//项目路径，不可更改
define('APP_PATH', __DIR__.'/Application/');

require __DIR__.'/vendor/autoload.php';
App::run();