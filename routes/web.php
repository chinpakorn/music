<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Session\Store;
use App\Http\Controllers\BorrowController;
use App\Models\borrow;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
  
        //model User
    
        Route::get('/dashboard', function () {
        
        $users=User::all();
        return view('dashboard',compact('users'));})->name('dashboard');
});



//department
Route::middleware(['auth:sanctum','verified'])->group(function(){
Route::get('/department/all',[DepartmentController::class,'index'])->name('department');
Route::post('/department/add',[DepartmentController::class,'Store'])->name('addDepartment');
Route::get('/department/edit/{id}',[DepartmentController::class,'edit']);
Route::post('/department/update/{id}',[DepartmentController::class,'update']);
//delete&restore
Route::get('/department/softdelete/{id}',[DepartmentController::class,'softdelete']);
Route::get('/department/restore/{id}',[DepartmentController::class,'restore']);
Route::get('/department/delete/{id}',[DepartmentController::class,'delete']);
// back button
Route::get('/department/back',[DepartmentController::class,'back']);
//borrow
Route::get('/borrow/all',[BorrowController::class,'index'])->name('borrows');
Route::post('/borrow/add',[BorrowController::class,'store'])->name('addBorrow');
Route::get('/borrow/edit/{id}',[BorrowController::class,'edit']);
Route::post('/borrow/update/{id}',[BorrowController::class,'update']);
Route::get('/borrow/back',[BorrowController::class,'back']);
Route::get('/borrow/delete/{id}',[BorrowController::class,'delete']);
});
