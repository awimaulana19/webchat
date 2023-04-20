<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix("/chat")->name("chat.")->group(function (){
//     Route::post("/", [ChatController::class, "saveMessage"])->name("save");
//     Route::get("/load/{roomId}", [ChatController::class, "loadMessage"])->name("load");
// });
// Route::post("/room", [RoomController::class, "create"]);

// Route::post("/chat", [ChatController::class, "saveMessage"]);
// Route::get("/load/{roomId}", [ChatController::class, "loadMessage"]);
// Route::post("/room", [RoomController::class, "create"]);
