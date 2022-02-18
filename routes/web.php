<?php

use Illuminate\Support\Facades\Route;

route::get('/', [\App\Http\Controllers\MoviesController::class, 'index'])->name('movies.index');
route::get('/movies/{movie}', [\App\Http\Controllers\MoviesController::class, 'show'])->name('movies.show');

