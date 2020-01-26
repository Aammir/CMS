<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use App\Http\Controllers\PostController;

Route::get('/', 'PageController@index');

Route::get('/page/about', 'PageController@about');
Route::get('/page/contact', 'PageController@contact');
Route::get('/page/blog', 'PageController@blog');
Route::get('/category', 'PageController@category');
Route::get('/post', 'PageController@post');

Route::get('/page/{slug}', 'PageController@dispage');

// Route::resource('/posts', 'PostController');
Route::get('/posts/{slug}', 'PostController@show');

//Route::resource('/admin/posts', 'PostController@getall');

Route::get('/popular', 'PostController@popular');

Route::resource('/categories', 'CategoryController');

Route::resource('/tags', 'TagController');

Route::resource('/subscribers',  'SubscriberController');
Route::resource('/contactform', 'ContactController');
Route::resource('/comment',     'CommentController');

Route::resource('/search', 'SearchController');


//Route::resource('/sm', 'SocialMediaController');
//Route::resource('/comments', 'CommentController');
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/admin/users', 'HomeController@users');

Route::get('/admin/user', 'HomeController@user');

Route::get('/authors/{user}', 'AuthorsController@show');

Route::group(['middleware' => ['auth']], function() {
    // uses 'auth' middleware
    //POSTS
    Route::get('/admin/posts', 'PostController@index');
    Route::get('/admin/add-post', 'PostController@create');
    //Route::post('/admin/save-post', 'HomeController@savepost');
    Route::post('/admin/store-post', 'PostController@store');
    Route::get('/admin/edit-post/{slug}', 'PostController@edit');
    Route::patch('/admin/update-post/{slug}', 'PostController@update');
    Route::delete('/admin/delete-post/{id}', 'PostController@destroy');
    //PAGES
    Route::get('/admin/pages', 'PageController@all');
    Route::get('/admin/add-page', 'PageController@create');
    Route::post('/admin/store-page', 'PageController@store');
    Route::get('/admin/edit-page/{slug}', 'PageController@edit');
    Route::patch('/admin/update-page/{slug}', 'PageController@update');
    Route::delete('/admin/delete-page/{id}', 'PageController@destroy');
    //WHOLE WEBSITE SETTINGS
    Route::get('/admin/settings', 'SiteController@index');
    Route::get('/admin/delogo', 'SiteController@delogo');
    Route::get('/admin/delfavico', 'SiteController@delfavico');
    Route::patch('/admin/settings/1', 'SiteController@update');


    //USERS
    Route::get('/admin/users', 'UsersController@index');
    Route::get('/admin/add-user', 'UsersController@create');
    Route::post('/admin/store-user', 'UsersController@store');
    Route::get('/admin/edit-user/{user}', 'UsersController@edit');
    Route::patch('/admin/update-user/{user}', 'UsersController@update');
    Route::delete('/admin/delete-user/{user}', 'UsersController@destroy');

    //CATEGORIES
    Route::get('/admin/categories', 'CategoryController@index');
    Route::post('/admin/store-category', 'CategoryController@store');
    Route::patch('/admin/update-category/{slug}', 'CategoryController@update');
    Route::delete('/admin/delete-category/{category}', 'CategoryController@destroy');

    //TAGS
    Route::get('/admin/tags', 'TagController@index');
    Route::post('/admin/store-tag', 'TagController@store');
    Route::patch('/admin/update-tag/{slug}', 'TagController@update');
    Route::delete('/admin/delete-tag/{category}', 'TagController@destroy');
	
    //SOCIAL MEDIA
    Route::get('/admin/sm', 'SocialMediaController@edit');
    // Route::get('/admin/sm', function(){return view('auth.social');});
    Route::patch('/admin/sm/1', 'SocialMediaController@update');
	
    //COMMENTS
    Route::get('/admin/comments', 'CommentController@index');
    Route::delete('/admin/delete-comment/{id}', 'CommentController@destroy');
	
    //CONTACT MESSAGES
    Route::get('/admin/contact-messages', 'ContactController@index');
    Route::delete('/admin/delete-cmessage/{id}', 'ContactController@destroy');
	
    //SUBSCRIBERS
    Route::get('/admin/subscribers', 'SubscriberController@index');
    Route::delete('/admin/del-subscriber/{id}', 'SubscriberController@destroy');
	
});


Route::get('/home','HomeController@index');
//TEMPORARY SOL
