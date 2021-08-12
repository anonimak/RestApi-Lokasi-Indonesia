<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
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
            return response()->json(District::search($query));
        }
        return response()->json(District::all());
    }

    public function getById($id)
    {
        return response()->json(District::where('id', $id)->first());
    }
}
