<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;

class VillageController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/village/",
     *     operationId="/v1/village/",
     *     tags={"Get All Village"},
     *     description="Untuk mendapatkan semua data desa. terdapat parameter query untuk melakukan pencarian data desa.",
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         description="Optional parameter for search village",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample village",
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
            return response()->json(Village::search($query));
        }
        return response()->json(Village::all());
    }

    /**
     * @OA\Get(
     *     path="/v1/village/{village_id}",
     *     operationId="/v1/village/{village_id}",
     *     tags={"Get Village by Id"},
     *     @OA\Response(
     *         response="200",
     *         description="Returns some sample village",
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */
    public function getById($id)
    {
        return response()->json(Village::where('id', $id)->first());
    }
}
