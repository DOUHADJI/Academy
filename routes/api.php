<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FacultyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



/** Authenticated routes */
Route::middleware("auth:sanctum")->group(function () {

    Route::get('/user', function (Request $request) {
        return new JsonResponse([
            "user" => new UserResource($request->user())
        ], Response::HTTP_OK);
    });


    Route::controller(UserController::class)->prefix("users")
    ->group(function () {
        Route::get("/", "index");
        Route::post("/", "store");
        Route::get("/{name}", "show");
        Route::put("/{id}", "update");
        Route::delete("/{id}", "destroy");
        Route::get("/teachers/get-all", "getTeachers");
    });


    /** Faculties routes */
    Route::controller(FacultyController::class)->prefix("faculties")
        ->group(function () {
            Route::get("/", "index");
            Route::post("/", "store");
            Route::get("/{name}", "show");
            Route::put("/{id}", "update");
            Route::delete("/{id}", "destroy");
        });

});
