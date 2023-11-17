<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ViewController;
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
    return redirect("http://localhost:5174/");
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
    ->prefix("admin") //Path prefix
    ->name("admin.") //Name prefix
    ->group(function () {
        Route::resource("apartments", ApartmentController::class);
        Route::get("messages", [MessageController::class, "index"])->name("messages");
        Route::get("statistics/{slug}", [ViewController::class, "show"])->name("statistics.show");
    });

Route::middleware('auth')->group(function () {
    Route::get("/payment/{slug}", [PaymentController::class, "show"])->name('payment.show');
    Route::post('/payment/success', [PaymentController::class, "success"])->name('payment.success');
});


require __DIR__ . '/auth.php';
