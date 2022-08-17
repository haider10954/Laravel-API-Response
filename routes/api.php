<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Models\User;

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

Route::get('/tasks', function () {
    $tasks = Task::with('user')->get();
    return TaskResource::collection($tasks);
});

Route::get('/tasks/{id}', function ($id) {
    $task = Task::with('user')->findOrFail($id);
    return new TaskResource($task);
});

Route::get('/user/{id}', function ($id) {
    $user = User::with('tasks')->findOrFail($id);
    return new UserResource($user);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('get/orders', [OrderController::class,'index']);

// Route::get('get/orders/{id}', [OrderController::class,'index']);