<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdistrict;

class SubdistrictController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/subdistrict/",
     *     operationId="/v1/subdistrict/",
     *     tags={"Get All Subdistrict"},
     *     description="Untuk mendapatkan semua data kecamatan. terdapat parameter query untuk melakukan pencarian data kecamatan.",
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         description="Optional parameter for search subdistrict",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample subdistrict",
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
            return response()->json(Subdistrict::search($query));
        }
        return response()->json(Subdistrict::all());
    }

    /**
     * @OA\Get(
     *     path="/v1/subdistrict/{subdistrict_id}",
     *     operationId="/v1/subdistrict/{subdistrict_id}",
     *     tags={"Get Subdistrict by Id"},
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample subdistrict",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    public function getById($id)
    {
        return response()->json(Subdistrict::where('id', $id)->first());
    }
}
