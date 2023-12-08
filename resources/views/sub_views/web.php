<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
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

// Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login',[LoginController::class,'loginForm'])->name('loginForm');
Route::post('loginCheck', [LoginController::class,'loginCheck'])->name('loginCheck');
Route::post('logout', [LoginController::class,'logout'])->name('logout');
Route::get('/registration-form', [HomeController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [HomeController::class, 'registered'])->name('registered');

Route::middleware('admin')->group(function () {
  Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/all-client', [DashboardController::class, 'allClient'])->name('allClient');
});
