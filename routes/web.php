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

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/home', 'FrontendController@index')->name('home');

Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/posts/{id}','FrontendController@getPost');
Route::get('/advertise', 'PostController@createAd')->name('advertise');
Route::post('/advertise', 'PostController@insertAd');


Route::get('/register', 'AuthController@registerShow')->name('register');
Route::get('/login', 'AuthController@loginShow')->name('login');

Route::post("/comments/{postId}", "CommentController@postComment")->name("postComment");


Auth::routes();

Route::get('/logout', 'AuthController@logout')->name('logout');

/*
    Admin rute

*/
Route::get("/admin/users", "Admin\UsersController@index")->name("users.index");
Route::get("/admin/users/create", "Admin\UsersController@create")->name("users.create");
Route::get("/admin/users/{id}", "Admin\UsersController@show")->name("users.show");
Route::post("/admin/users", "Admin\UsersController@store")->name("users.store");
Route::post("/admin/users/{id}/update", "Admin\UsersController@update")->name("users.update");
Route::get("/admin/users/{id}/delete", "Admin\UsersController@destroy")->name("users.delete");

Route::get("/admin/navigation", "Admin\NavigationController@index")->name("navigation.index");
Route::get("/admin/navigation/create", "Admin\NavigationController@create")->name("navigation.create");
Route::get("/admin/navigation/{id}", "Admin\NavigationController@show")->name("navigation.show");
Route::post("/admin/navigation", "Admin\NavigationController@store")->name("navigation.store");
Route::post("/admin/navigation/{id}/update", "Admin\NavigationController@update")->name("navigation.update");
Route::get("/admin/navigation/{id}/delete", "Admin\NavigationController@destroy")->name("navigation.delete");

Route::get("/admin/posts", "Admin\PostController@index")->name("posts.index");
Route::get("/admin/posts/create", "Admin\PostController@create")->name("posts.create");
Route::get("/admin/posts/{id}", "Admin\PostController@show")->name("posts.show");
Route::post("/admin/posts", "Admin\PostController@store")->name("posts.store");
Route::post("/admin/posts/{id}/update", "Admin\PostController@update")->name("posts.update");
Route::get("/admin/posts/{id}/delete", "Admin\PostController@destroy")->name("posts.delete");

Route::get("/admin/gallery", "Admin\GalleryController@index")->name("gallery.index");
Route::get("/admin/gallery/create", "Admin\GalleryController@create")->name("gallery.create");
Route::get("/admin/gallery/{id}", "Admin\GalleryController@show")->name("gallery.show");
Route::post("/admin/gallery", "Admin\GalleryController@store")->name("gallery.store");
Route::post("/admin/gallery/{id}/update", "Admin\GalleryController@update")->name("gallery.update");
Route::get("/admin/gallery/{id}/delete", "Admin\GalleryController@destroy")->name("gallery.delete");