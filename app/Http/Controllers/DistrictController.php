<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/district/",
     *     operationId="/v1/district/",
     *     tags={"Get All District"},
     *     description="Untuk mendapatkan semua data kabupaten. terdapat parameter query untuk melakukan pencarian data kabupaten.",
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         description="Optional parameter for search district",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample district",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            return response()->json(District::search($query));
        }
        return response()->json(District::all());
    }

    /**
     * @OA\Get(
     *     path="/v1/district/{district_id}",
     *     operationId="/v1/district/{district_id}",
     *     tags={"Get District by Id"},
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample district",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    public function getById($id)
    {
        return response()->json(District::where('id', $id)->first());
    }
}
