<?php

 
use Illuminate\Support\Facades\Route;
 
 
use App\Http\Controllers\BranchController;

use App\Http\Controllers\UserController ;

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

