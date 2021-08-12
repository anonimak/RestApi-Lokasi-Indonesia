<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;

class VillageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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

    public function getById($id)
    {
        return response()->json(Village::where('id', $id)->first());
    }
}
