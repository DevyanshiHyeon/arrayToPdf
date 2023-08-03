<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SpatieController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome1');
    // return view('layout.dashboard');
});
Route::get('command', function () {
    \Artisan::call('optimize:clear');
    return ("Done");
});
Route::post('form-submit',[MainController::class,'store'])->name('filter.excel');

Route::get('GnhYuS/WFgVLd/upload-excel',[DataController::class,'index']);
Route::post('merge-data',[DataController::class,'merge_data']);

// Route::get('spatie-upload',[SpatieController::class,'index']);
// Route::post('spatie-table',[SpatieController::class,'table']);
