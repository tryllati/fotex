<?php

use App\Http\Controllers\Api\ApiMovieController;
use App\Http\Controllers\Api\ApiProjectionController;
use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {

        /**
         * Movies
         */
        Route::get('/movies', [ApiMovieController::class, 'movies']);
        Route::post('/movies/create', [ApiMovieController::class, 'create']);
        Route::post('/movies/update/{id}/field/{field}', [ApiMovieController::class, 'update']);
        Route::delete('/movies/delete/{id}', [ApiMovieController::class, 'delete']);

        /**
         * Projections
         */
        Route::get('/projections', [ApiProjectionController::class, 'projections']);
        Route::post('/projection/create', [ApiProjectionController::class, 'create']);
        Route::post('/projection/update/{id}/field/{field}', [ApiProjectionController::class, 'update']);
        Route::delete('/projection/delete/{id}', [ApiProjectionController::class, 'delete']);
});
