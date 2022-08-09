<?php

use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ManagementMemberController;
use App\Http\Controllers\Admin\VerfikasiMemberController;
use App\Models\Event;

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



// Route::get('register', function () {
//     return view('auth.register');
// });

Route::middleware(['ifauth'])->group(function () {
    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'authenticate']);
    Route::resource('register',RegisterController::class)->except('update');
});

Route::get('logout', [LoginController::class,'logout']);



Route::get('register-parent',function (){
    return view('auth.registerParent');
});

Route::post('add-parent',[RegisterController::class,'AddParent']);

Route::middleware(['auth.register'])->group(function(){
    Route::get('about_us', function () {
        return view('user.about_us');
    });
    
    Route::get('activity', function () {
        $event = Event::paginate(15);
        return view('user.activity',compact('event'));
    });

    Route::get('activity/{activity}',[EventController::class,'show']);

    Route::get('/',[DashboardController::class,'index'])->name('home');
});

//route untuk admin access
Route::middleware(['auth.admin'])->group(function(){
    Route::get('admin_dashboard',function () { 
       return view('admin.dashboard_admin'); 
    })->name('admin');
    Route::resource('verifikasi-member',VerfikasiMemberController::class);
    Route::resource('management-member',ManagementMemberController::class);
    Route::get('management-member-reverse/{id}',[ManagementMemberController::class,'reverse']);
    Route::post('event-update',[EventController::class,'update']);
    Route::resource('management-event',EventController::class)->except(['update']);
});





