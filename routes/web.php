<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
  if(Auth::check()){
      $user=Auth::user();
      return $user;
  }
});*/

Route::get('/', function () {
  return view('users.login');
});
//Route::get('/home', function () {
//  return redirect()->route('adminLoginForm');
//});
 
Route::middleware('auth')->group(function(){

Route::get('/student',[StudentController::class,'create']);
Route::post('/student',[StudentController::class,'store']);
Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'update']);
Route::post('/students/{id}',[StudentController::class,'edit']);
Route::get('/students/{id}/delete',[StudentController::class,'delete']);

});

Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'store']);
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'check']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
