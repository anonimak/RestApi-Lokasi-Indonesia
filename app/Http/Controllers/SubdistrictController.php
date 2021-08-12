<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdistrict;

class SubdistrictController extends Controller
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
            return response()->json(Subdistrict::search($query));
        }
        return response()->json(Subdistrict::all());
    }

    public function getById($id)
    {
        return response()->json(Subdistrict::where('id', $id)->first());
    }
}
