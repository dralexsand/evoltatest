<?php

use App\Http\Procedures\ActivityProcedure;
use App\Http\Procedures\InfoProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::middleware('apiauth')->group(function () {
    Route::rpc('visits', [ActivityProcedure::class])->name('visits');
    Route::rpc('info', [InfoProcedure::class])->name('info');
});*/

/*Route::match(['get', 'post'], '*', function () {
    return 'Hello World';
});*/

/*Route::rpc('visits', [ActivityProcedure::class])->name('visits');
Route::rpc('info', [InfoProcedure::class])->name('info');*/

Route::rpc('visits', [ActivityProcedure::class]);
Route::rpc('info', [InfoProcedure::class]);


