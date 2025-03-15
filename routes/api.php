<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function ()
{

    Route::post('movies', function () {
        return 'view';
    });

});
