<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';

    public static function search($query)
    {
        return Self::select('villages.name', 'villages.id', 'subdistricts.name AS subdistrict_name', 'subdistricts.id AS subdistrict_id', 'districts.name AS district_name', 'districts.id AS district_id', 'provinces.name AS province_name', 'provinces.id AS province_id')
            ->join('subdistricts', 'subdistricts.id', '=', 'villages.subdistrict_id')
            ->join('districts', 'districts.id', '=', 'subdistricts.district_id')
            ->join('provinces', 'provinces.id', '=', 'districts.province_id')
            ->where('villages.name', 'like', "%{$query}%")
            ->orWhere('subdistricts.name', 'like', "%{$query}%")
            ->orWhere('districts.name', 'like', "%{$query}%")
            ->orWhere('provinces.name', 'like', "%{$query}%")
            ->get();
    }
}
