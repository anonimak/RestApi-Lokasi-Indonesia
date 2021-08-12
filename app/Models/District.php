<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public static function search($query)
    {
        return Self::select('districts.name', 'districts.id', 'provinces.name AS province_name', 'provinces.id AS province_id')
            ->join('provinces', 'provinces.id', '=', 'districts.province_id')
            ->where('districts.name', 'like', "%{$query}%")
            ->orWhere('provinces.name', 'like', "%{$query}%")
            ->get();
    }
}
