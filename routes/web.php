<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Resources\TaskResource;

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
    return view('welcome');
});

Route::get('/tasks', function () {
    $task = Task::findOrFail(1);
    return new TaskResource($task);
});
