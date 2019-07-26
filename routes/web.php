<?php
use App\Photo;
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

Route::get('/', 'PhotosController@index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/albums','AlbumsController@index');
Route::get('/albums/create','AlbumsController@create');
Route::post('/albums/store','AlbumsController@store')->name('albums/store');
Route::get('/albums/{album}','AlbumsController@show')->name('albums.show');
Route::get('/photos/create/{id}','PhotosController@create');
Route::post('/photos/store','PhotosController@store')->name('photos/store');
Route::get('/photos/{photo}','PhotosController@show')->name('photos.show');
Route::post('/photos/delete/{photo}','PhotosController@destroy')->name('photos.delete');



// For Events
Route::get('/events/pastevents','EventsController@index');
Route::get('/events/ongoingevents','EventsController@index');
Route::get('/events/upcomingevents','EventsController@index');
Route::get('/events/create','EventsController@create');
Route::post('/events/store','EventsController@store')->name('events/store');
Route::get('/events/{event}','EventsController@show')->name('events.show');

//For SAAKHI
Route::get('/saakhi','SaakhiController@index')->name('saakhi');

Route::get('/journals','SaakhiController@getJournals')->name('journals');
Route::get('/saakhi/create','SaakhiController@create');
Route::post('/saakhi/store','SaakhiController@store')->name('saakhi/store');
Route::get('/saakhi/{saakhi}','SaakhiController@show')->name('saakhi.show');
Route::post('/saakhi/delete/{saakhi}','SaakhiController@destroy')->name('saakhi.delete');

//Route::get('/comments',function(){
	//return view('comments.index');
//});
Route::get('/commentsonly/{id}','CommentController@index')->name('commentsonly');
Route::post('/comments/store','CommentController@store')->name('comments.store');;
Route::get('/comments/create/{saakhi_id}','CommentController@create');
Route::get('/comments/{id}','SaakhiController@comments')->name('comments');
Route::post('/reply/store','ReplyController@store')->name('reply.store');;


