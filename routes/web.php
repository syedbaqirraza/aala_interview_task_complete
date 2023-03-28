<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileuploadController;
use App\Services\SetBooleanValueService;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('files', 'FileuploadController');
Route::get('find-meeting-time','FindMeetingTime@index');
Route::post('ajax-upload-file','FileuploadController@store');
Route::get('change-water-mark','FileuploadController@edit');
Route::post('update-water-mark','FileuploadController@update');


//vue axios route
Route::get('get/files','FileUploadController@getAllImages');
Route::post('delete/files/{id}','FileUploadController@deleteImages');
