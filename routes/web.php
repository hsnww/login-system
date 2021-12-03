<?php

use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Admin\NewsController;
use Admin\CategoryController;
use Admin\ArticleController;
use Admin\PostController;
use Admin\PageController;
use Admin\MediaController;
use User\Profile;
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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', 'Controller@homePage');
Route::resource('/post', PostController::class);
Route::get('dashboard', 'Controller@dashboard')->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('dashboard')->name('admin.')->middleware(['auth', 'auth.isAdmin', 'verified'])->group(function(){
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/pages', PageController::class);
    Route::resource('/media', MediaController::class);
});

Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function(){
    Route::resource('profile', UsersController::class);
    Route::get('/deleted', 'MessageController@deleted')->name('messaging.deleted');
    Route::get('/sent', 'MessageController@sent')->name('messaging.sent');
    Route::get('/starredMessage', 'MessageController@starredMessage')->name('messaging.starredMessage');
    Route::resource('/messaging', MessageController::class);
    Route::get('/notification', 'UserEmailController@notification')->name('messaging.notification');
    Route::get('/email/{id}', 'UserEmailController@email')->name('email');
    Route::get('/starred/{id}', 'UserEmailController@starred')->name('starred');
    Route::get('/unStarred/{id}', 'UserEmailController@unStarred')->name('unStarred');
    Route::get('/unRead/{id}', 'UserEmailController@unRead')->name('unRead');
    Route::get('/markRead/{id}', 'UserEmailController@markRead')->name('markRead');
    Route::get('/deleteMessage/{id}', 'UserEmailController@deleteMessage')->name('deleteMessage');
    Route::get('/unDeleteMessage/{id}', 'UserEmailController@unDeleteMessage')->name('unDeleteMessage');
    Route::resource('/users', UserEmailController::class);
});
