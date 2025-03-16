<?php

use App\Http\Controllers\Api\ApiMoviesController;
use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {

        /**
         * Movies
         */
        Route::get('/movies', [ApiMoviesController::class, 'movies']);
        Route::post('/movies/create', [ApiMoviesController::class, 'create']);
        Route::post('/movies/update/{id}/field/{field}', [ApiMoviesController::class, 'update']);
        Route::delete('/movies/delete/{id}', [ApiMoviesController::class, 'delete']);

        /**
         * Projection
         */

});
