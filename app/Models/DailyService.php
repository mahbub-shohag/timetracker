<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyService extends Model
{
    use HasFactory;
    public function materials(){
        return $this->hasOne(DailyServiceMaterials::class);
    }

    public function cityWalk(){
        return $this->hasOne(DailyServiceCitywalk::class);
    }

    public function internalWalk(){
        return $this->hasOne(DailyServiceInternalwalk::class);
    }

    public function lots(){
        return $this->hasOne(DailyServiceLot::class);
    }

    public function pavementcondition(){
        return $this->hasOne(DailyServicePavementcondition::class);
    }

    public function weatherobservation(){
        return $this->hasOne(DailyServiceWeatherobservation::class);
    }

    public function employees(){
        return $this->hasMany(DailyServiceEmployees::class);
    }

    public function carriedMaterial(){
        return $this->hasOne(DailyServiceCarriedMaterial::class);
    }
    public function location(){
        return $this->hasOne(Client::class,'id','locationId');
    }
    public function service(){
        return $this->hasOne(Service::class,'id','serviceId');
    }
}
