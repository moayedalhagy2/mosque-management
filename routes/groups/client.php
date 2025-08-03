<?php



use App\Http\Controllers\Client\DisrtictsController as ClientDisrtictsController;
use App\Http\Controllers\Client\MosquesController as ClientMosquesController;
use App\Http\Controllers\MosquesController as DashboardMosqueController;
use App\Http\Controllers\Client\WorkerController as ClientWorkerController;
use App\Http\Controllers\WorkerController as DashboardWorkerController;
use Illuminate\Support\Facades\Route;




Route::get('/districts', ClientDisrtictsController::class);



Route::prefix('/mosques')
    ->controller(ClientMosquesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        // Route::put('/{item}', 'update');
        Route::post('/', 'store');
    });



Route::prefix('/mosques/enums')
    ->controller(DashboardMosqueController::class)
    ->group(function () {
        Route::get('/current-status', 'currentStatusEnum');
        Route::get('/category', 'categoryEnum');
        Route::get('/technical-status', 'technicalStatusEnum');
        Route::get('/type', 'typeEnum');
        Route::get('/mosque-attachments', 'buildAttachmentsEnum');
        Route::get('/demolition-percentage', 'demolitionPercentageEnum');
        Route::get('/destruction-status', 'destructionStatusEnum');
    });



Route::prefix('/workers')
    ->controller(ClientWorkerController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{item}', 'show');
        // Route::post('/{item}', 'update');
        Route::post('/', 'store');
        // Route::delete('/{item}', 'destroy');
    });





Route::prefix('/workers/enums')
    ->controller(DashboardWorkerController::class)
    ->group(function () {
        Route::get('/job-titles', 'jobTitlesEnum');
        Route::get('/job-status', 'jobStatusEnum');
        Route::get('/quran-levels', 'quranLevelEnum');
        Route::get('/sponsorship-types', 'sponsorshipTypeEnum');
        Route::get('/educational-level', 'educationalLevelEnum');
    });
