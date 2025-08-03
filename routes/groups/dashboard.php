<?php

use App\Enums\RoleEnum;
use App\Helpers\RoleMiddleware;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BranchController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MosquesController;
use App\Http\Controllers\UserController;

Route::get('/profile', [UserController::class, 'profile']);

Route::get('roles-enum', [UserController::class, 'rolesEnum']);

Route::prefix('/users')
    ->middleware([RoleMiddleware::append()])
    ->controller(UserController::class)
    ->group(function () {
        Route::post('/',  'store');
        Route::get('/',  'index');
        Route::get('/{item}',  'show');
        Route::put('/{item}',  'update');
        // Route::delete('/{item}',  'destroy');
        // Route::get('/{id}/roles', 'roles');
        // Route::post('/{id}/roles', 'syncRoles');
    });







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
        Route::post('/', 'store');
        Route::put('/{item}', 'update')
            ->middleware([RoleMiddleware::append(RoleEnum::SUPERVISOR)]);
        Route::delete('/{item}', 'destroy')
            ->middleware([RoleMiddleware::append()]);
    });

Route::prefix('/mosques')
    ->controller(MosquesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::post('/', 'store');
        Route::put('/{item}', 'update')->middleware([RoleMiddleware::append(RoleEnum::SUPERVISOR)]);
        Route::delete('/{item}', 'destroy')->middleware([RoleMiddleware::append(RoleEnum::SUPERVISOR)]);

        Route::get('/enums/current-status', 'currentStatusEnum');
        Route::get('/enums/category', 'categoryEnum');
        Route::get('/enums/technical-status', 'technicalStatusEnum');
        Route::get('/enums/type', 'typeEnum');
        Route::get('/enums/mosque-attachments', 'buildAttachmentsEnum');
        Route::get('/enums/demolition-percentage', 'demolitionPercentageEnum');
        Route::get('/enums/destruction-status', 'destructionStatusEnum');
    });


Route::prefix('/workers')
    ->controller(WorkerController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::post('/', 'store');
        Route::post('/{item}', 'update')->middleware([RoleMiddleware::append(RoleEnum::SUPERVISOR)]);
        Route::delete('/{item}', 'destroy')->middleware([RoleMiddleware::append(RoleEnum::SUPERVISOR)]);

        Route::get('/enums/job-titles', 'jobTitlesEnum');
        Route::get('/enums/job-status', 'jobStatusEnum');
        Route::get('/enums/quran-levels', 'quranLevelEnum');
        Route::get('/enums/sponsorship-types', 'sponsorshipTypeEnum');
        Route::get('/enums/educational-level', 'educationalLevelEnum');
    });
