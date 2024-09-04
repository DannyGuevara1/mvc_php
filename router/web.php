<?php
require_once '../core/Route.php';
require_once '../app/Controller/MaterialsController.php';
require_once '../app/Controller/PagesController.php';

Route::get('/', [MaterialsController::class, 'getAllMaterials']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/updateMaterialPage/{id}', [MaterialsController::class, 'showUpdateMaterial']);
Route::post('/createMaterial', [MaterialsController::class, 'createMaterial']);
Route::post('/deleteMaterial/{id}', [MaterialsController::class, 'deleteMaterial']);
Route::post('/updateMaterial/{id}', [MaterialsController::class, 'updateMaterial']);

Route::dispatch();
?>
