<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

$idRedex = '[0-9]+';
$slugRegex = '[a-z0-9-]+';

Route::get('/',[HomeController::class,'index'])->name('home');  
Route::get('/products/{slug}-{product}',[HomeController::class,'show'])->name('products.show')->where([
    'slug' => $slugRegex,
    'product' => $idRedex,
]);  

// Route::resources([
//     'roles' => RoleController::class,
//     'users' => UserController::class,
//     'products' => ProductController::class,
// ]);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    ]);
    Route::put('products/{product}/update-slug', [ProductController::class, 'updateSlug'])->name('products.updateSlug');
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
