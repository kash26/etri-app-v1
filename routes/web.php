<?php

use Illuminate\Support\Facades\Route;

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
    
    // $user = \App\Models\User::first();

    // dd($user->roles);

    // dd($user->roles()->where('name', '=', 'admin')->get());

    // dd($user->roles()->where('name', 'admin')->exists());
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/private', function () {
        return 'Bonjour Admin';
    });
});

require __DIR__.'/auth.php';
