<?php

use App\Http\Controllers\WebResourceController;
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

Route::get('/', function () {
    return view('create');
});

Route::prefix('web-resources')->group(function () {
    Route::post('', [WebResourceController::class, 'store'])->name('web-resources.store');
    Route::get('', [WebResourceController::class, 'index'])->name('web-resources.index');
    Route::get('logs', [WebResourceController::class, 'logs'])->name('web-resources.logs');
});
