<?php
use App\Exceptions\URL;
namespace App\Exceptions;
use App\Models\Profile;
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
    return view('dashboard/maps');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

Route::get('/profile', function (profile $profile) {
    return view('auth/profile', [
        'logged_in'  => 'true',
        'heading' => 'My Profile',
        'profile' => Profile::find(9)
    ]);
});
