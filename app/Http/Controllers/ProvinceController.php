<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/province/",
     *     operationId="/v1/province/",
     *     tags={"Get All Province"},
     *     description="Untuk mendapatkan semua data provinsi. terdapat parameter query untuk melakukan pencarian data provinsi.",
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         description="Optional parameter for search province",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample province",
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
            return response()->json(Province::where('name', 'like', "%{$query}%")->get());
        }
        return response()->json(Province::all());
    }

    /**
     * @OA\Get(
     *     path="/v1/province/{province_id}",
     *     operationId="/v1/province/{province_id}",
     *     tags={"Get Province by Id"},
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample province",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    public function getById($id)
    {
        return response()->json(Province::where('id', $id)->first());
    }
}
