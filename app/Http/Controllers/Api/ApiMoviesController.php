<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMoviesController extends ApiController
{
    /**
     * Create a new movie.
     *
     * @param Request $request
     * @return JsonResponse
     *
     * @bodyParam name string required The name of the movie. Example: Inception
     * @bodyParam description string required The description of the movie. Example: A mind-bending thriller.
     * @bodyParam age_limit int required The age limit of the movie. Example: 13
     * @bodyParam language string required The language of the movie. Example: English
     * @bodyParam cover_image file required The cover image of the movie. Example: (upload file)
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'age_limit'   => 'required|numeric',
            'language'    => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('cover_image');

        $destinationPath = public_path('images/movies/cover');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);
        }

        $fileName = $image->getClientOriginalName();

        $image->move($destinationPath, $fileName);

        $movie = Movie::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'age_limit'   => $request->input('age_limit'),
            'language'    => $request->input('language'),
            'cover_image' => $fileName
        ]);

        return response()->json(['message' => 'Movie created successfully', 'movie' => $movie], 201);
    }

    /**
     * Get a list of all movies.
     *
     * @return JsonResponse
     *
     * @response 200 {
     *   "movies": [
     *     {
     *       "id": 1,
     *       "name": "Inception",
     *       "description": "A mind-bending thriller.",
     *       "age_limit": 13,
     *       "language": "English",
     *       "cover_image": "inception.jpg",
     *       "created_at": "2025-03-16T14:27:28.000000Z",
     *       "updated_at": "2025-03-16T14:27:28.000000Z"
     *     }
     *   ]
     * }
     */
    public function movies(): JsonResponse
    {
        $movies = new Movie();

        if($movies->all()->count() === 0){
            return response()->json(['movies' => []], 200);
        }

        return response()->json(['movies' => $movies->all()], 200);
    }

    /**
     * Update a specific field of a movie.
     *
     * @param Request $request
     * @param int $id The ID of the movie.
     * @param string $field The field to be updated.
     * @return JsonResponse
     *
     * @bodyParam field string required The field to be updated. Example: name
     * @bodyParam value mixed required The value to update the field with. Example: New Movie Title
     * @response 204 No Content
     */
    public function update(Request $request, int $id, string $field): JsonResponse
    {
        $movie = Movie::find($id);

        if(is_null($movie)){
            return response()->json(null, 204);
        }

        $movie->makeHidden(["created_at", "updated_at"]);

        if(isset($movie->{$field})){
            $movie->update([
                $field => $request->input($field)
            ]);
        }

        return response()->json(null, 204);
    }

    /**
     * Delete a movie.
     *
     * @param int $id The ID of the movie.
     * @return JsonResponse
     *
     * @response 204 No Content
     */
    public function delete(int $id): JsonResponse
    {
        $movie = Movie::find($id);

        if(! is_null($movie)){
            $movie->delete();
        }

        return response()->json(null, 204);
    }
}
