<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs/api-docs.json', function () {
    $file = storage_path('api-docs/api-docs.json');
    abort_unless(file_exists($file), 404, 'Arquivo não encontrado');
    return Response::file($file, ['Content-Type' => 'application/json']);
})->name('openapi.json');


