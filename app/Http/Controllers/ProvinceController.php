<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
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
            return response()->json(Province::where('name', 'like', "%{$query}%")->get());
        }
        return response()->json(Province::all());
    }

    public function getById($id)
    {
        return response()->json(Province::where('id', $id)->first());
    }
}
