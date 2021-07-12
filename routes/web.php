<?php

use App\Events\ChatMessage;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('send', 'MessageController@send')->name('send');
Route::get('chat/{id?}', 'MessageController@chat')->name('chat');
Route::get('join/{group_id}/{user_id}', 'GroupController@join')->name('join');
Route::get('room/{id}', 'GroupController@index')->name('room');
Route::post('chat-room', 'Conversation@chatRoom')->name('chat-room');
Route::get('leave/{user_id}/{group_id}', 'GroupController@leave')->name('leave');

//Login fb
Route::get('login/facebook', 'SocialController@facebookRedirect')->name('fb-index');
Route::get('login/facebook/callback', 'SocialController@loginWithFacebook')->name('fb-login');

//Login google
Route::get('login/google', 'SocialController@googleRedirect')->name('gg-index');
Route::get('login/google/callback', 'SocialController@loginWithGoogle')->name('gg-login');

Route::get('test', function () {
//    $mess = '{"message":"sdfdfjhdskjfhdjsf"}';
//    broadcast(new ChatMessage($mess, 1))->toOthers();
//    return 'ok';
})->name('test');
