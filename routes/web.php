 <?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
   Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});


 Route::group(['middleware' => 'role:editor'], function() {
     Route::get('/role', function() {

         return 'Welcome...!!';

     });
 });
 Route::group(['middleware' => 'role:author'], function() {
     //
 });







//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
