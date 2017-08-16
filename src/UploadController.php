<?php
namespace Lewisliang82\CNUpload\Upload;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Lewisliang82\CNUpload\Upload\Ucloud\proxy;
use Illuminate\Support\Facades\Crypt;

class UploadController extends BaseController{

    public function __construct(){}

    public function server(Request $request){
        $act = trim($request->input ('act'));
        $arr_act = [];
        if($act){
            $arr_act = unserialize (Crypt::decrypt ($act));
        }

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

        $buket = config('cnupload.core.ucloud.buket');
        $buketUrl = config('cnupload.core.ucloud.bucketUrl');

        /**
         * 判断是否有自定义key
         */
        $key = config('cnupload.core.ucloud.key');
        if($arr_act && isset($arr_act[$key]) && $arr_act[$key]){
            $key = $arr_act[$key] . ".". $file->getClientOriginalExtension();
        }else{
            $key = "upload/{$image_name}";
        }

        $proxy = new proxy();
        $ret = $proxy->UCloud_PutFile($buket, $key, $file->getPathname());

        if(null == $ret[1]){
            return response()->json(['status'=>true, 'host'=>"http://{$buket}{$buketUrl}/{$key}", 'filename'=>$key, 'ext'=>$file->getClientOriginalExtension()], 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json(['status'=>false, 'msg'=>'上传异常'], 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
}
