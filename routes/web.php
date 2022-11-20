<?php
use App\Exceptions\URL;
namespace App\Exceptions;
use App\Models\Profile;
use App\Models\Transit_review;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

session_start();



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


Route::get('/changepass', function () {
    return view('changepass/change_pass');
});
Route::get('/changepass_otp', function () {
    return view('changepass/changepass_otp');
});
Route::get('/changepass_now', function () {
    return view('changepass/changepass_now');
});
Route::get('/changepass_success', function () {
    return view('changepass/changepass_success');
});


Route::get('/register', function () {
    return view('register/register');
});
Route::get('/register_2', function () {
    return view('register/register_2');
});
Route::get('/register_3', function () {
    return view('register/register_3');
});
Route::get('/register_otp', function () {
    return view('register/register_otp');
});
Route::get('/successpage', function () {
    return view('register/successpage');
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

Route::get('/submit_comment', function () {
    $comment = $_SESSION['comment'];
    $terminal_id = $_SESSION['terminal_id'];
    $commented_by = $_SESSION['fullname'];
    DB::insert('insert into transit_reviews (commented_by, title, terminal_id, body, star_ratings) values (?, ?, ?, ?, ?)', [$commented_by,'dummy title',$terminal_id, $comment, '5']);
    echo'<script>window.location="reviews/'.$_SESSION['terminal_id'].'"</script>';
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
    $_SESSION['terminal_id'] = $terminal_id;

    return view('reviews/terminal_reviews',[
        'terminalData' => $results,
        'terminalName' => $terminal_name
        
    ]);
});
