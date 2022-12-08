<?php
namespace App\Exceptions;
use App\Exceptions\URL;
use App\Models\Profile;
use App\Models\Transit_review;
use App\Models\Predefined_route;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
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
    return view('register/register',[
        'proshit' => Profile::all('uname')
    ]);
});
Route::get('/register_2', function () {
    return view('register/register_2',[
        'proemail' => Profile::all('email')
    ]);
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

// Route::get('/direction_info', function () {
//     return view('direction_info',[
//         'logged_in' => 'true',
//         'heading' => 'Profile'
//     ]);
// });

//ROUTE DISPLAY
Route::get('/direction_info/{id}/{id2}', function($id, $id2){
    $predef_route = DB::select('SELECT id FROM predefined_routes WHERE direction_from = :direction_from AND direction_to = :direction_to', ['direction_from' => $id, 'direction_to' => $id2]);
    // ddd(json_encode($predef_route[0]->id));
    return view('direction_info',[
        'logged_in' => 'true',
        'heading' => 'ROUTES',
        'p_route' => Predefined_route::find($predef_route[0]->id)
    ]);
});

//SINGLE PROFILE
Route::get('/profile/{id}', function($id){
    $_SESSION['profile_id'] = $id;
    if($_SESSION['id'] == $id){
        return view('auth/profile',[
            'logged_in' => 'true',
            'heading' => 'Profile',
            
            'profile' => Profile::find($id)

        ]);
    }else{
        return view('auth/login');
    }

});

Route::get('/submit_comment', function () {
    $comment = $_SESSION['comment'];
    $terminal_id = $_SESSION['terminal_id'];
    $commented_by = $_SESSION['fullname'];
    $star = $_SESSION['star_val'];
    DB::insert('insert into transit_reviews (commented_by, title, terminal_id, body, star_ratings) values (?, ?, ?, ?, ?)', [$commented_by,'dummy title',$terminal_id, $comment, $star]);
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

Route::get('/update_profile', function () {
    $id = $_SESSION['profile_id'];
    $fname = $_SESSION['profile_fname'];
    $phonenum = $_SESSION['profile_phonenum'];
    $address = $_SESSION['profile_address'];
    $email = $_SESSION['profile_email'];
    //$country = $_SESSION['profile_country'];
    $city = $_SESSION['profile_city'];

    $affected = DB::table('profiles')
              ->where('id', $id)
              ->update(['fullname' => $fname, 'contact_no' => $phonenum, 'email' => $email, 'city' => $city, 'address' => $address]);

    echo '<script>window.location="../profile/'.$id.'"</script>';
});