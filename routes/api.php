<?php

use App\Http\Controllers\Api\NotificationTestController;
use App\Http\Controllers\CotationController;
use App\Http\Controllers\FaceEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/webhook/face-event', action: [FaceEventController::class, 'handleWebhook']);
Route::post('/face-event/create-faltas', action: [FaceEventController::class, 'createFaltas']);
Route::get('/crawler/user-face', action: [FaceEventController::class, 'getUsers']);
Route::post('/test-notification', [NotificationTestController::class, 'sendTestNotification']);
Route::get('/modelos', [CotationController::class, 'getBrands']);
Route::get('/lista-modelos', [CotationController::class, 'getModels']);
Route::get('/versoes', [CotationController::class, 'getVersions']);
Route::get('/coverage/{id}', [CotationController::class, 'getCoveragePage'])->name('coverage');
Route::post('/realizar-cotacao', [CotationController::class, 'getFipeValue']);
Route::post('/contratar', [CotationController::class, 'getContractPage'])->name('contract');
Route::get('/checkout/{id}', [CotationController::class, 'getCheckout'])->name('checkout');
