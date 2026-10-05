<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('weight_logs.index');
    }

    return redirect()->route('login');
});

Route::get('/register/step1', [RegisterController::class, 'step1'])
    ->name('register.step1');

Route::post('/register/step1', [RegisterController::class, 'step1Store'])
    ->name('register.step1.store');

Route::get('/register/step2', [RegisterController::class, 'step2'])
    ->name('register.step2');

Route::post('register/step2', [RegisterController::class, 'store'])
    ->name('register.step2.store');

Route::middleware('auth')->group(function () {
    
    Route::get('/weight_logs', [WeightController::class, 'index'])
    ->name('weight_logs.index');

    /*PG02*/
    Route::get('/weight_logs/create', [WeightController::class, 'create'])
        ->name('weight_logs.create');
    Route::post('weight_logs', [WeightController::class, 'store'])
        ->name('weight_logs.store');

    /*PG03*/
    Route::get('/weight_logs/search', [WeightController::class, 'search'])
    ->name('weight_logs.search');

    /*PG07*/
    Route::get('/weight_logs/goal_setting', [WeightController::class, 'goalSetting'])
        ->name('weight_logs.goal_setting');
    Route::put('/weight_logs/goal_setting', [WeightController::class, 'updateGoal'])
        ->name('weight_logs.update_goal');

    /*PG04*/
    Route::get('weight_logs/{weightLogId}', [WeightController::class, 'show'])
        ->name('weight_logs.show');

    /*PG05*/
    Route::get('weight_logs/{weightLogId}/update', [WeightController::class, 'edit'])
        ->name('weight_logs.edit');
    Route::put('weight_logs/{weightLogId}/update', [WeightController::class, 'update'])
        ->name('weight_logs.update');

    /*PG06*/
    Route::delete('weight_logs/{weightLogId}/delete', [WeightController::class, 'destroy'])
        ->name('weight_logs.destroy');

});