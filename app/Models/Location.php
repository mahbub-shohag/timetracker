<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public static $location;

    public static function newLocatoin($request)
    {
        self::$location = new Location();
        self::$location->field_area = $request->field_area;
        self::$location->working_area = $request->working_area;
        self::$location->address = $request->address;
        self::$location->area_name = $request->area_name;
        self::$location->save();
    }

    public static function updateLocation($request, $id)
    {
        self::$location = Location::find($id);
        self::$location->field_area = $request->field_area;
        self::$location->working_area = $request->working_area;
        self::$location->address = $request->address;
        self::$location->area_name = $request->area_name;
        self::$location->save();
    }

    public static function deleteLocation($id)
    {
        self::$location = Location::find($id);
        self::$location->delete();
    }
}
