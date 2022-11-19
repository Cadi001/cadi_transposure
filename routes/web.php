<?php
use App\Exceptions\URL;
namespace App\Exceptions;
use App\Models\Profile;
use App\Models\Transit_review;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;




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
Route::get('/logout', function () {
    return view('auth/logout');
});

// Route::get('/checkAuth/{$id}', function ($id) {
//     return view('auth/login',[
//         'logged_in' => 'true',
//         'profile' => User::find($id)
//     ]);
// });
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

//SINGLE PROFILE
Route::get('/profile/{id}', function($id){
    return view('auth/profile',[
        'logged_in' => 'true',
        'heading' => 'Profile',
        'profile' => Profile::find($id)
    ]);
});

//SAME SINGLE PROFILE BUT WITH 404 ERROR
// Route::get('/profile/{id}', function(Profile $id){
//     return view('auth/profile',[
//         'logged_in' => 'true',
//         'heading' => 'Profile',
//         'profile' => $id
//     ]);
// });
// Route::get('/reviews/{terminal_id}', function ($terminal_id) {
//     return view('reviews/terminal_reviews',[
//         'terminalData' => Transit_review::find($terminal_id)
//     ]);
// });

Route::get('/reviews/{terminal_id}', function ($terminal_id) {
    $results = DB::select('SELECT * FROM transit_reviews WHERE terminal_id   = :terminal_id', ['terminal_id' => $terminal_id]);
    $terminal_name = DB::select('select * from transits where id = :id', ['id' => $terminal_id]);

    return view('reviews/terminal_reviews',[
        'terminalData' => $results,
        'terminalName' => $terminal_name
        
    ]);
});
