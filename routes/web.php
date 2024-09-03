<?php

use App\Helpers\PdfDocsHelper;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintPdfDocsController;
use App\Http\Resources\ReportResource;
use App\Models\Center;
use App\Models\Invoice;
use App\Models\Report;
use Illuminate\Foundation\Application;
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

    if (env("APP_ENV") == "local") {
        return view('app');
    }

    if (env("APP_ENV") == "production") {
        return view('app-prod');
    }
})->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::fallback(function () {

    if (env("APP_ENV") === "local") {
        return view('app');
    }

    if (env("APP_ENV") === "production") {
        return view('app-prod');
    }
})->middleware('auth');
