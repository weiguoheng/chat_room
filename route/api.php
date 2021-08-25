<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST,GET');
if(request()->isOptions()){
    exit();
}
Route::rule('chat/:id', 'api/chat/send');
Route::rule('api/user/login', 'api/user/login');