Installation
-----------------
via composer
```
composer require "composer require lewisliang82/cngroupupload:dev-master"
```

config/app.php addServiceProvider: 
```
Lewisliang82\CNUpload\Upload\UploadServiceProvider::class,
```

publish resources
```
php artisan vendor:publis
```

ucloud config
file, src/uclod/conf.php
```text
$SDK_VER = '1.0.8';
$UCLOUD_PROXY_SUFFIX = '';
$UCLOUD_PUBLIC_KEY = '';
$UCLOUD_PRIVATE_KEY = '';
$UCLOUD_PUB_BUCKET = '';
$UCLOUD_PRI_BUCKET = '';
```
include js/css
```html
@include('cnupload::head');
```

demo file
demo/test.blade.php