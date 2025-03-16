<?php

namespace App\Http\Controllers\Api;

use App\Models\Projection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiProjectionController extends ApiController
{
    /**
     * Create a new projection.
     *
     * @param Request $request The HTTP request containing projection data.
     *
     * @bodyParam date string required The date and time of the projection in format `Y-m-d H:i:s`. Example: "2025-12-23 21:00:00"
     * @bodyParam empty_place integer required The number of available seats. Example: 50
     * @bodyParam movie_id integer required The ID of the related movie. Example: 1
     *
     * @return JsonResponse
     *
     * @response 201 {
     *   "message": "Projection created successfully",
     *   "projection": {
     *     "id": 1,
     *     "date": "2025-12-23 21:00:00",
     *     "empty_place": 50,
     *     "movie_id": 1
     *   }
     * }
     * @response 422 {
     *   "date": ["The date field is required."],
     *   "empty_place": ["The empty place field is required."],
     *   "movie_id": ["The selected movie_id is invalid."]
     * }
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'date'        => 'required|date_format:Y-m-d H:i:s',
            'empty_place' => 'required|numeric',
            'movie_id'    => 'required|numeric|exists:movies,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $projection = Projection::create([
            'date'        => $request->input('date'),
            'empty_place' => $request->input('empty_place'),
            'movie_id'    => $request->input('movie_id')
        ]);

        return response()->json(['message' => 'Projection created successfully', 'projection' => $projection], 201);
    }

    /**
     * Retrieve all projections.
     *
     * @return JsonResponse
     *
     * @response 200 {
     *   "projections": [
     *     {
     *       "id": 1,
     *       "date": "2025-12-23 21:00:00",
     *       "empty_place": 50,
     *       "movie_id": 1,
     *       "created_at": "2025-03-16T15:05:52.000000Z",
     *       "updated_at": "2025-03-16T15:05:52.000000Z"
     *     }
     *   ]
     * }
     */
    public function projections(): JsonResponse
    {
        $projection = new Projection();

        if($projection->all()->count() === 0){
            return response()->json(['projection' => []], 200);
        }

        return response()->json(['projections' => $projection->all()], 200);
    }

    /**
     * Update a specific field of a projection.
     *
     * @param Request $request The HTTP request containing updated data.
     * @param int $id The ID of the projection.
     * @param string $field The field to be updated.
     *
     * @bodyParam {field} mixed required The new value for the specified field.
     *
     * @return JsonResponse
     *
     * @response 204 No Content
     */
    public function update(Request $request, int $id, string $field): JsonResponse
    {
        $projection = Projection::find($id);

        if(is_null($projection)){
            return response()->json(null, 204);
        }

        $projection->makeHidden(["id","created_at", "updated_at"]);

        if(isset($projection->{$field})){
            $projection->update([
                $field => $request->input($field)
            ]);
        }

        return response()->json(null, 204);
    }

    /**
     * Delete a projection.
     *
     * @param int $id The ID of the projection.
     * @return JsonResponse
     *
     * @response 204 No Content
     */
    public function delete(int $id): JsonResponse
    {
        $projection = Projection::find($id);

        if(! is_null($projection)){
            $projection->delete();
        }

        return response()->json(null, 204);
    }
}
