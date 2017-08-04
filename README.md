Installation
-----------------
via composer
```
composer require "lewisliang82/cngroupupload:dev-master"
```

config/app.php addServiceProvider: 
```
Lewisliang82\CNUpload\Upload\UploadServiceProvider::class,
```

publish resources
```
php artisan vendor:publish  --provider='Lewisliang82\CNUpload\Upload\UploadServiceProvider' --force
```

ucloud config
config/cnupload.php
```text
'ucloud' => [
    'bucketUrl'     => '',
    'buket'         => '',
    'proxy_suffix'  => '',
    'public_key'    => '',
    'private_key'   => ''
]
```
include js/css
```html
@include('cnupload::head');
```

demo file
demo/test.blade.php