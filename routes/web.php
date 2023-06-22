<?php

use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Livewire\Cliniques;

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
Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'register'])->name('post.register');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('post.login');

Route::get('logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/',[HomeController::class,'index'])->name('home');

Route::group([
    "middleware" =>["auth","auth.admin"],
    "prefix" => "admin",'as' => 'admin.'
],function(){
    Route::group(
        ["prefix" => "gestcomptes","as" => "gestcomptes."],function(){
            Route::get("/users",Users::class)->name("users.index");
        }
    );
});

Route::group([
    "middleware" =>["auth","auth.docteur"],
    "prefix" => "docteur",'as' => 'docteur.'
],function(){
    Route::group(
        ["prefix" => "gestcliniques","as" => "gestcliniques."],function(){
            Route::get("/cliniques",Cliniques::class)->name("clinique.index");
        }
    );
});


