<?php


return [

    'routes_map'=>[
        'lewisliangg82/cnupload/server'=>'cnupload', //default route
        'lewisliangg82/cnupload/test' =>'cnupload',
    ],

    'core' => [
        'route' => [
            'middleware' => 'auth',
        ],
        'mode'=>'local',
        'qiniu' => [
            'accessKey'=>'',
            'secretKey'=>'',
            'bucket'=>'',
            'url'=>'http://xxx.clouddn.com',//七牛分配的CDN域名,注意带上http://
        ],
        'ucloud' => [
            'bucketUrl'     => '.ufile.ucloud.com.cn',
            'buket'         => '',
            'proxy_suffix'  => '',
            'public_key'    => '',
            'private_key'   => ''
        ]
    ],

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
    ]
];