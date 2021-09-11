<?php

use App\Http\Controllers\PlacesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::view('form', 'form')->name('form');

Route::post('form', [UsersController::class, 'sendForm'])->name('form_send');

Route::get('users', [UsersController::class, 'index'])->name('users_index');

Route::get('places', [PlacesController::class, 'index'])->name('places_index');

Route::group([
    'prefix' => 'photos/',
    'as' => 'photos_'
], function(){
    Route::get('add', [PlacesController::class, 'addPhotoForm'])->name('add');

    Route::post('add/add', [PlacesController::class, 'sendPhoto'])->name('send');
});

Route::group([
    'prefix' => 'places/',
    'as' => 'places'
], function(){

    Route::group([
        'prefix' => 'create/',
        'as' => '_create',
    ], function(){
    Route::get('', [PlacesController::class, 'showForm']);

    Route::post('add', [PlacesController::class, 'addPlace'])->name('_add');
    });

    Route::group([
        'prefix' => '{id}/',
        'as' => '_id',
    ], function(){
        Route::get('', [PlacesController::class, 'place']);
    
        Route::get('photos', [PlacesController::class, 'showAddPhoto'])->name('_photos');
        
        Route::post('photos/add', [PlacesController::class, 'addPhoto'])->name('_photos_add');
    });
});

