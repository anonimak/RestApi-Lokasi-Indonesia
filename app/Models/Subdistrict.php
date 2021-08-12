<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $table = 'subdistricts';

    public static function search($query)
    {
        return Self::select('subdistricts.name', 'subdistricts.id', 'districts.name AS district_name', 'districts.id AS district_id', 'provinces.name AS province_name', 'provinces.id AS province_id')
            ->join('districts', 'districts.id', '=', 'subdistricts.district_id')
            ->join('provinces', 'provinces.id', '=', 'districts.province_id')
            ->where('subdistricts.name', 'like', "%{$query}%")
            ->orWhere('districts.name', 'like', "%{$query}%")
            ->orWhere('provinces.name', 'like', "%{$query}%")
            ->get();
    }
}
