<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DailyServiceLot extends Model
{
    use HasFactory;
    public function service(): HasOne
    {
        return $this->hasOne(\App\Models\Service::class);
    }

    public function client(): HasOne
    {
        return $this->hasOne(\App\Models\Client::class);
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DailyServiceEmployees::class);
    }

    public function materials(): HasOne
    {
        return $this->hasOne(DailyServiceMaterials::class);
    }

    public function lots(): HasOne
    {
        return $this->hasOne(DailyServiceLot::class);
    }

    public function citywalks(): HasOne
    {
        return $this->hasOne(DailyServiceCitywalk::class);
    }

    public function internalWalks(): HasOne
    {
        return $this->hasOne(DailyServiceInternalwalk::class);
    }

    public function pavementCondition(): HasOne
    {
        return $this->hasOne(DailyServicePavementcondition::class);
    }

    public function weatherObservation(): HasOne
    {
        return $this->hasOne(DailyServiceWeatherobservation::class);
    }
}
