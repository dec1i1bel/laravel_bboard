<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\HomeController;

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

// Route::get('/create', function() {
//     return view('/create');
// });

Route::get('/', [BbsController::class, 'index'])->name('index');
// Route::post('/store' , [BbsController::class, 'store']);

/**
 * метод создаёт маршруты на действия контроллеров, созданных через php artisan ui:auth
 * также здесь создаются настройки безопасности
 */
Auth::routes();

/**
 * /home - раздела пользователя
 * 
 * name('home') - имя маршрута
 */
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/home/add', [HomeController::class, 'showAddBbform'])    
    ->name('bb.add');

Route::post('/home', [HomeController::class, 'storeBb'])
    ->name('bb.store');

Route::get('/{bb}', [BbsController::class, 'detail'])->name('detail'); // bb - url-параметр с именем bb
