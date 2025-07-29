<?php


use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BranchController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MosquesController;
use App\Http\Controllers\UserController;

use App\Models\Mosque;


// Route::prefix('/users')
//     ->controller(UserController::class)
//     ->group(function () {

//         Route::post('/',  'store');
//         Route::get('/',  'index');
//         Route::get('/{id}',  'show');
//         Route::get('/{id}/addresses',  'addresses');
//         Route::get('/{id}/roles', 'roles');
//         Route::post('/{id}/roles', 'syncRoles');
//     });





Route::get('/profile', [UserController::class, 'profile']);

Route::prefix('/branches')
    ->controller(BranchController::class)
    ->group(function () {
        Route::get('/', 'index');
        // Route::post('/', 'store');
        // Route::get('/{id}', 'show');
        // Route::post('/{id}', 'update');
        // Route::delete('/{id}', 'destroy');
    });


Route::prefix('/districts')
    ->controller(DistrictController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::put('/{item}', 'update');
        Route::post('/', 'store');
        Route::delete('/{item}', 'destroy');
    });

Route::prefix('/mosques')
    ->controller(MosquesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::put('/{item}', 'update');
        Route::post('/', 'store');
        Route::delete('/{item}', 'destroy');

        Route::get('/enums/current-status', 'currentStatusEnum');
        Route::get('/enums/category', 'categoryEnum');
        Route::get('/enums/technical-status', 'technicalStatusEnum');
        Route::get('/enums/type', 'typeEnum');
    });


Route::prefix('/workers')
    ->controller(WorkerController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::post('/{item}', 'update');
        Route::post('/', 'store');
        Route::delete('/{item}', 'destroy');

        Route::get('/enums/job-titles', 'jobTitlesEnum');
        Route::get('/enums/job-status', 'jobStatusEnum');
    });
