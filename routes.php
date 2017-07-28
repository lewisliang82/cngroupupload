<?php

/**
 * Your package routes would go here
 */

$uploadRoutes=$routeName=config('cnupload.routes_map');

foreach($uploadRoutes as $routeName=>$configName){
    // Route::any($routeName,['middleware'=> $middleware,'uses'=>'Ender\UEditor\UEditorController@server']);
    Route::any($routeName, ['uses'=>'CNUpload\Upload\UploadController@server']);
}