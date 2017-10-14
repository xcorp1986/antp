<?php

require __DIR__.'/define.php';

return [
    // 显示错误信息
    'SHOW_ERROR_MSG'       => true,
    // 关闭页面Trace功能
    'SHOW_PAGE_TRACE'      => false,
    // 是否去除模板文件里面的html空格与换行
    'TMPL_STRIP_SPACE'     => true,
    // 允许访问的模块列表，多个模块用逗号分隔
    'MODULE_ALLOW_LIST'    => ['Admin'],
    // 自动侦测模板主题
    'TMPL_DETECT_THEME'    => false,
    // 默认模板文件后缀
    'TMPL_TEMPLATE_SUFFIX' => '.html',
    // 默认模块
    'DEFAULT_MODULE'       => 'Admin',
    // 默认控制器名称
    'DEFAULT_CONTROLLER'   => 'Index',
    // 默认操作名称
    'DEFAULT_ACTION'       => 'index',

    // 默认错误跳转对应的模板文件,注：相对于前台模板路径
    'TMPL_ACTION_ERROR'    => 'Public:error',
    // 默认成功跳转对应的模板文件,注：相对于前台模板路径
    'TMPL_ACTION_SUCCESS'  => 'Public:success',
    //程序异常页面
    'TMPL_EXCEPTION_FILE'  => '/public/exception.html',

    /* URL设置 */
    // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_CASE_INSENSITIVE' => true,
    // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'URL_MODEL'            => 1,
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)
    // 默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    // PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_DEPR'    => '/',
    // URL伪静态后缀设置
    'URL_HTML_SUFFIX'      => '',

    // 分页参数
    'VAR_PAGE'             => 'p',

    'URL_ROUTER_ON'     => true,

    // 设置静态缓存文件后缀
    'HTML_FILE_SUFFIX'  => '.html',
    'TMPL_PARSE_STRING' => [
        '__PUBLIC__' => '/public',
        '__CSS__'    => '/public/css',
        '__JS__'     => '/public/js',
    ],
    // 上传目录
    'UPLOAD_DIR'        => __DIR__.'/../../../upload/',
    // 上传文件的命名规则
    'UPLOAD_FILE_RULE'  => 'uniqid',
    'LOAD_EXT_CONFIG'   => 'database,mail,router',
];