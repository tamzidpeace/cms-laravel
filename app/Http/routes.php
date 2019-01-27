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
    echo "data inserted";
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

Route::get('/findwhere', function (){

    $post = Post::where('id', 6)->orderBy('id', 'desc')->take(1)->get();
    return $post;
});

Route::get('/basicInsert', function () {
    $post = new Post;
    $post->title = 'php';
    $post->content = 'php is awesome';
    $post->save();

    echo 'data updated';

});

Route::get('/basicInsert2', function () {
    $post =  Post::find(8);
    $post->title = 'php';
    $post->content = 'php is awesome';
    $post->save();

    echo 'data updated';

});

Route::get('/create', function () {

    Post::create(['title'=>'the create method', 'content'=>'real content']);
});

Route::get('/update', function () {
    Post::where('id', 6)->update(['title'=>'new title', 'content'=>'new content']);
});

Route::get('/delete', function () {

    //$post = Post::find(8);
    //$post->delete();
    //Post::destroy([8,9]);
    //Post::find(12)->delete();

    echo "data deleted";
});

Route::get('/softdelete', function () {

    Post::find(7)->delete();

    echo "soft deleted";
});

Route::get('/findsoftdelete', function () {

    /*$post = Post::find(6);
    return $post;*/
    //echo "soft deleted";

    /*$post = Post::withTrashed()->where('id', 6)->get();
    return $post;*/

    $post = Post::onlyTrashed()->where('id', 6)->get();
    return $post;
});

Route::get('/restore', function () {

    Post::withTrashed()->where('id', 6)->restore();

    echo "restored";
});

Route::get('/forceDelete', function () {

    Post::withTrashed()->where('id', 6)->forceDelete();

    echo "forced deleted";
});

