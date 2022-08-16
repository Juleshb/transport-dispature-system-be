<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogAPI;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\BussController;


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
Route::get("list",[BlogAPI::class,'list']);

//SUPER ADIMIN ROUTERS
Route::post("register",[UserController::class,'register']);
Route::post("login",[UserController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'user']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::POST('companyregister',[AgenceController::class,'store']);
    Route::GET('list-of-company',[AgenceController::class,'showAll']);
    Route::PATCH('updatecompany/{company}',[AgenceController::class,'update']);
});

// COMPANY ADIMIN
Route::post("AdminLogin",[AgenceController::class,'AdminLogin']);
Route::middleware('auth:sanctum')->group(function () {
   
    Route::post('logout', [UserController::class, 'logout']);
    Route::POST('companyregister',[AgenceController::class,'store']);
    Route::GET('list-of-company',[AgenceController::class,'showAll']);
    Route::PATCH('updatecompany/{company}',[AgenceController::class,'update']);
});

Route::post('addbuss', [BussController::class, 'store']);


//PASSENGERS ROUTERS
Route::get('/passenger', [PassengerController::class, 'Passenger']);
Route::post("/passengerregister",[PassengerController::class,'passengerregister']);
Route::get('/ticket', [TicketController::class, 'Ticket']);



 // protected route for creating a new post
 Route::post('/posts', [PostController::class, 'store']);

 // protected route for getting all posts
 Route::get('/posts', [PostController::class, 'index']);

 // protected route for getting a single post
 Route::get('/posts/{id}', [PostController::class, 'show']);

 // protected route for updating a post
 Route::put('/posts/{id}', [PostController::class, 'update']);

 // protected route for deleting a post
 Route::delete('/posts/{id}', [PostController::class, 'destroy']);

