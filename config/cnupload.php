<?php

/**
 * Your package config would go here
 */

/* 前后端通信相关的配置,注释只允许使用多行方式 */
return [

    'routes_map'=>[
        'lewisliang82/cnupload/server'=>'upload', //default route
        'lewisliang82/cnupload/test' =>'upload',
    ],
    /*
    |--------------------------------------------------------------------------
    | 新增配置,route
    |--------------------------------------------------------------------------
    |
    |注意权限验证,请自行添加middleware
    |
    |如 'middleware' => 'auth',
    */
    'core' => [
        'route' => [
            'middleware' => 'auth',
        ],
        'mode'=>'local',//上传方式,local 为本地   qiniu 为七牛
        //七牛配置,若mode='qiniu',以下为必填.
        'qiniu' => [
            'accessKey'=>'',
            'secretKey'=>'',
            'bucket'=>'',
            'url'=>'http://xxx.clouddn.com',//七牛分配的CDN域名,注意带上http://
        ],
        'uclod' => [

        ]
    ],
    /**
     * 和原 UEditor /php/config.json 配置完全相同
     *
     */
    /* 上传图片配置项 */
    'upload' => [
        'storage' => true,
        "imageActionName" => "uploadimage", /* 执行上传图片的action名称 */
        "imageFieldName" => "upfile", /* 提交的图片表单名称 */
        "imageMaxSize" => 2048000, /* 上传大小限制，单位B */
        "imageAllowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"], /* 上传图片格式显示 */
        "imageCompressEnable" => true, /* 是否压缩图片,默认是true */
        "imageCompressBorder" => 1600, /* 图片压缩最长边限制 */
        "imageInsertAlign" => "none", /* 插入的图片浮动方式 */
        "imageUrlPrefix" => "", /* 图片访问路径前缀 */
        "imagePathFormat" => "/uploads/ueditor/image/{yyyy}{mm}{dd}{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
    ], /* 列出的文件类型 */
];
