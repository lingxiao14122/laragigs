<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Models\User;

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

// Route::get('/hello', function() {
//     return response('<h1>Hello world</h1>', 200)
//         ->header('Content-Type', 'text/plain')
//         ->header("foo", 'bar');
// });

// Route::get('/post/{id}', function($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return $request->name . $request->city;
// });

//public
Route::get('/', [ListingController::class, 'index']);
Route::get('/listing/{listing}', [ListingController::class, 'show']);

Route::group(['middleware' => ['guest']], function () {
    //create
    Route::get('/register', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    
    //login
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/users/login', [UserController::class, 'authenticate']);
    
});

Route::group(['middleware' => ['auth']], function () {
    //create
    Route::get('/listings/create', [ListingController::class, 'create']);
    Route::post('/listings', [ListingController::class, 'store']);
    
    //update
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
    Route::put('/listings/{listing}', [ListingController::class, 'update']);
    Route::get('/listings/manage', [ListingController::class, 'manage']);

    
    //delete
    Route::delete('/listings/{listing}', [ListingController::class, 'delete']);
    
    Route::post('/logout', [UserController::class, 'logout']);
});
