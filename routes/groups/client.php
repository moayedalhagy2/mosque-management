<?php



use App\Http\Controllers\Client\DisrtictsController as ClientDisrtictsController;
use App\Http\Controllers\Client\MosquesController as ClientMosquesController;
use App\Http\Controllers\Client\WorkerController as ClientWorkerController;
use Illuminate\Support\Facades\Route;




Route::get('/districts', ClientDisrtictsController::class);



Route::prefix('/mosques')
    ->controller(ClientMosquesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::put('/{item}', 'update');
        Route::post('/', 'store');

        //enums
        Route::get('/enums/current-status', 'currentStatusEnum');
        Route::get('/enums/category', 'categoryEnum');
        Route::get('/enums/technical-status', 'technicalStatusEnum');
        Route::get('/enums/type', 'typeEnum');
    });


Route::prefix('/workers')
    ->controller(ClientWorkerController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        Route::post('/{item}', 'update');
        Route::post('/', 'store');
        Route::delete('/{item}', 'destroy');

        Route::get('/enums/job-titles', 'jobTitlesEnum');
        Route::get('/enums/job-status', 'jobStatusEnum');
    });
