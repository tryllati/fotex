<?php

namespace App\Http\Controllers\Api;

use App\Models\TestModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiTestController extends ApiController
{
    /**
     * Return a test record based on the provided number parameter.
     */
    public function fetch(Request $request): JsonResponse
    {
        $number = $request->input('number');

        if ($number === null) {
            return response()->json(['error' => 'number parameter is required'], 422);
        }

        $record = TestModel::find((int) $number);

        if ($record === null) {
            return response()->json(['test' => null], 200);
        }

        return response()->json(['test' => $record], 200);
    }
}
