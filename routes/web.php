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

Route::get('locale/{locale}', function($locale){
	if(\Session::has('locale')){
            \App::setLocale(\Session::get('locale'));
        }
	Session::put('locale',$locale);
	return redirect()->back();
});

Route::get('/slideshow/{album}','AlbumsController@slideshow')->name('album.slideshow');

/*Route::get('test',function($key=''){

	$row =['ma'=>"k",'hh'=>'j'];

	$row +=[$key=>'a'];
	
	
	
	return json_encode($row,JSON_PRETTY_PRINT);
});*/

//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/albums','AlbumsController@index');
Route::get('/albums/create','AlbumsController@create')->middleware('verified');
Route::post('/albums/store','AlbumsController@store')->name('albums/store')->middleware('verified');
Route::get('/albums/{album}','AlbumsController@show')->name('albums.show');
Route::post('/albums/delete/{album}','AlbumsController@destroy')->name('albums.delete')->middleware('verified');
Route::get('/photos/create/{id}','PhotosController@create')->middleware('verified');
Route::post('/photos/store','PhotosController@store')->name('photos/store')->middleware('verified');
Route::get('/photos/{photo}','PhotosController@show')->name('photos.show');
Route::post('/photos/delete/{photo}','PhotosController@destroy')->name('photos.delete')->middleware('verified');



// For Events
Route::get('/events/pastevents','EventsController@index');
Route::get('/events/ongoingevents','EventsController@index');
Route::get('/events/upcomingevents','EventsController@index');
Route::get('/events/create','EventsController@create')->middleware('verified');
Route::post('/events/store','EventsController@store')->name('events/store')->middleware('verified');
Route::get('/events/{event}','EventsController@show')->name('events.show');

//For SAAKHI
Route::get('/saakhi','SaakhiController@index')->name('saakhi');

Route::get('/journals','SaakhiController@getJournals')->name('journals')->middleware('verified');;
Route::get('/saakhi/create','SaakhiController@create')->middleware('verified')->middleware('verified');;
Route::post('/saakhi/store','SaakhiController@store')->name('saakhi/store')->middleware('verified');
Route::get('/saakhi/{saakhi}','SaakhiController@show')->name('saakhi.show');
Route::post('/saakhi/delete/{saakhi}','SaakhiController@destroy')->name('saakhi.delete')->middleware('verified');

//Route::get('/comments',function(){
	//return view('comments.index');
//});
Route::get('/commentsonly/{id}','CommentController@index')->name('commentsonly')->middleware('verified');;
Route::post('/comments/store','CommentController@store')->name('comments.store')->middleware('verified');;
Route::get('/comments/create/{saakhi_id}','CommentController@create')->middleware('verified');
Route::get('/comments/{id}','SaakhiController@comments')->name('comments')->middleware('verified');;
Route::post('/reply/store','ReplyController@store')->name('reply.store')->middleware('verified');


