<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', [ListingController::class, 'index']);

// using route-model binding in controller
Route::get('/listing/{listing}', [ListingController::class, 'show']);

//show creat form
Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);
