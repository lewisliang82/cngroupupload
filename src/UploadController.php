<?php
namespace CNUpload\Upload;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class UploadController extends BaseController{

    public function __construct(){
    }

    public function server(Request $request){

        return response()->json([], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
