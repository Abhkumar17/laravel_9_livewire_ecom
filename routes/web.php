<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

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
Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shope',HomeComponent::class)->name('shope');
Route::get('/cart',CartComponent::class)->name('cart');
Route::get('/check',CheckComponent::class)->name('check');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::get('/userdashboard',UserDashboardComponent::class)->name('user.dashboard');
    });

    Route::middleware(['auth','authadmin'])->group(function () {
        Route::get('/admindashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    });
require __DIR__.'/auth.php';
