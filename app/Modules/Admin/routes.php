<?php

use App\Modules\Categories\Models\Category;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Controllers\AdminController;
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

Route::get('/admin/admin-test', [AdminController ::class, 'index']);
//CREATE Category
Route::post('admin/create', [AdminController::class, 'create']);
//UPDATE Category
Route::get('admin/categories/{id}', [AdminController::class, 'edit']);
Route::put('admin/categories/{id}', [AdminController::class, 'update']);
//DELETE Category
Route::delete('admin/categories/{id}', [AdminController::class, 'destroy']);
