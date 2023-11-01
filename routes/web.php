<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ApartmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

//Mi crea la rotta con nome admin.apartments + tutte le rotte sottostanti ad essa (ex. admin.apartments.edit)
Route::middleware('auth')
    ->prefix("admin")//Path prefix
    ->name("admin.")//Name prefix
    ->group(function() {
    Route::resource("apartments", ApartmentController::class);
});
    

require __DIR__.'/auth.php';
