<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shopifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $shop= Auth::user();
    return view('welcome');

})->middleware(['verify.shopify'])->name('home');


Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->middleware(['verify.shopify'])->name('product.index');




Route::get('gql/users/{username}', [\App\Http\Controllers\GraphQLController::class, 'getUsers']);


Route::get('/groups', [\App\Http\Controllers\FaqController::class,'groupIndex'])->name('group.index');


//->middleware(['verify.shopify'])
