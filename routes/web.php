<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PlacesController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [PlacesController::class, 'index'])->name('places.index');
Route::get('rating', [PlacesController::class, 'ratingIndex'])->name('rating.index');
Route::get('images/{image}/download', [ImagesController::class, 'download'])->name('images.download');

Route::resource('images', ImagesController::class)->except('index', 'edit', 'update');

Route::view('form', 'form')->name('form');

Route::group([
    'prefix' => 'photos/',
    'as' => 'photos.'
], function(){
    Route::get('add', [PlacesController::class, 'addPhotoForm'])->name('add');
    Route::post('add/add', [PlacesController::class, 'sendPhoto'])->name('send');
});

Route::group([
    'prefix' => 'places/',
    'as' => 'places.'
], function(){
    Route::post('rate', [PlacesController::class, 'rate'])->name('rate');

    Route::group([
        'prefix' => 'create/',
        'as' => 'create',
    ], function(){
    Route::get('', [PlacesController::class, 'showForm']);
    Route::post('add', [PlacesController::class, 'addPlace'])->name('.add');
    });

    Route::get('{id}', [PlacesController::class, 'place'])->name('id');
});

require __DIR__.'/auth.php';