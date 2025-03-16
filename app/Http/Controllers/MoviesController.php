<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = new Movie();

        return $movies->all();
    }
}
