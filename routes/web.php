<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/
Route::get('/help' , function(){
    return view('pages.help');
})->middleware('auth')->name('help');


Route::redirect('/' , 'registerForm');
Route::get('/loginForm', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout' , [LogoutController::class, 'logout'])->name('logout');
Route::get('registerForm' ,  [RegisterController::class, 'registerForm'])->name('registerForm');
Route::post('registerDemand' , [RegisterController::class, 'registerDemand'])->name('registerDemand');

Route::get('users/trashedUsers', [UserController::class, 'trashedUsers'])->middleware(['auth' , 'isAdmin'])->name('trashedUsers');
Route::post('users/acceptUser/{id}' , [UserController::class, 'acceptUser'])->middleware(['auth' , 'isAdmin'])->name('acceptUser');
Route::get('users/restoreUser/{id}', [UserController::class, 'restoreUser'])->middleware(['auth' , 'isAdmin'])->name('restoreUser');
Route::get('users/restoreAllUsers', [UserController::class, 'restoreAllUsers'])->middleware(['auth' , 'isAdmin'])->name('restoreAllUsers');
Route::resource('users' , UserController::class)->middleware(['auth' , 'isAdmin']);

Route::resource('competitions' , CompetitionController::class);

Route::get( 'profile' , [userDashboardController::class , 'profile'] )->middleware('auth')->name('profile');


// Route::prefix('search')->middleware(['auth' , 'isAdmin'])->group(function(){
//     Route::get('users',[SearchController::class, 'searchUsers']);
//     Route::get('trashedUsers' , [SearchController::class, 'searchTrashedUsers']);
//     Route::get('competitions' , [SearchController::class, 'searchCompetitions']);
//     Route::get('thoseUsers/{id}' , [SearchController::class, 'searchThoseUsers']);
//     Route::get('thoseCompetitions/{id}' , [SearchController::class, 'searchThoseCompetitions']);
// });