<?php

use App\Http\Controllers\ItemApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource("item", ItemApiController::class)->middleware('cat');
Route::apiResource("item", ItemApiController::class);
