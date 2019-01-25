<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
    //return "hi your";
});

/*Route::get('/about', function () {
    //return view('welcome');
    return "hi about";
});

Route::get('/contact', function () {
    //return view('welcome');
    return "its contact";
});

Route::get('/post/{id}/{name}', function ($id, $name){
        return "this is post number " . $id . $name;
});

// name an url:

Route::get('admin/post/example', array('as'=>'admin.home', function(){
    $url = route('admin.home');
    return $url;
}));*/

// commands to check route list: 'php artisan route:list'

/*Route::group(['middleware' => ['web']], function () {

});*/

Route::get('/post', 'PostsController2@index');