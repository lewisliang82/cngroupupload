<?php
namespace Lewisliang82\CNUpload\Upload;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Lewisliang82\CNUpload\Upload\Ucloud\proxy;


class UploadController extends BaseController{

    public function __construct(){}

    public function server(Request $request){

        if (!$request->hasFile('file')) {
            return response()->json(['status'=>false, 'msg'=>'上传文件为空'], 503, [], JSON_UNESCAPED_UNICODE);
        }

        $file = $request->file('file');
        if(!$file->isValid()){
            return response()->json(['status'=>false, 'msg'=>'文件上传出错'], 503, [], JSON_UNESCAPED_UNICODE);
        }

        $config_upload = config('cnupload.upload');
        $allowed_extensions = $config_upload['imageAllowFiles'];
        if ($file->getClientOriginalExtension() && !in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions)) {
            return response()->json(['status'=>false, 'msg'=>'请上传图片文件'], 200, [], JSON_UNESCAPED_UNICODE);
        }
        $md5_file = md5_file($file->getPathname());
        $image_name = "{$md5_file}.".$file->getClientOriginalExtension();

        $proxy = new proxy();
        $key = "upload/{$image_name}";
        $ret = $proxy->UCloud_PutFile('XXXXX', $key, $file->getPathname());

        if(null == $ret[1]){
            return response()->json(['status'=>true, 'host'=>"http://cngroup-img.ufile.ucloud.com.cn/{$key}", 'ext'=>$file->getClientOriginalExtension()], 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['status'=>false, 'msg'=>'上传异常'], 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
}
