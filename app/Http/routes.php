<?php

use App\Post;

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

Route::get('/insert', function () {

    DB::insert('insert into posts(title, content) values (?, ?)', ['Laravel', 'php with laravel']);
});

Route::get('/read', function () {

    $result = DB::select('select * from posts where id = ?', [1]);

    foreach ($result as $res) {
        return $res->content . "<br>" . $res->title . "<br>" ;
    }

});

Route::get('/update', function () {
    DB::update('update posts set title = "Laravel 7" where id = ?', [1]);
});

Route::get('/delete', function (){
    //DB::delete('delete from posts where id= "2" ');
    DB::delete('delete from posts');
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

/*Route::get('/post/{id}', 'PostsController2@index');*/
/*Route::resource('posts', 'PostsController2');
Route::get('/contact', 'PostsController2@contact');
Route::get('post/{id}/{name}/{password}', 'PostsController2@show_post');*/

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/

Route::get('/find', function () {

    /*$posts = Post::all();

    foreach ($posts as $post) {
        return $post->title;
    }*/

    $post2 = Post::find(6);
    return $post2->title;
});