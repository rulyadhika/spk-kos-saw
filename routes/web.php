<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Kost;
use App\Http\Livewire\Frontend\ExploreKost;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/kost');
Route::get('/kost', ExploreKost::class)->name('explore-kost');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', Dashboard::class);
        Route::get('/kost', Kost::class)->name('admin.kost');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/login', Login::class)->name('login')->middleware('guest');

