<?php

namespace Lewisliang82\CNUpload\Upload;


class Upload {

    public function __construct(){}

    public static function content() {}

    /**
     *	加载CSS资源
     */
    public static function css() {
        echo '<link rel="stylesheet" type="text/css" href="'.asset('/cnupload/webuploader.css').'">'.PHP_EOL;
    }

    /**
     *	加载JS资源
     */
    public static function js() {
        echo '<script src="'.asset('/cnupload/webuploader.js').'"></script>'.PHP_EOL;
    }
}