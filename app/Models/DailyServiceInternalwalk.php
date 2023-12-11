<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyServiceInternalwalk extends Model
{
    use HasFactory;
    public function dailyService(){
        return $this->belongsTo(DailyService::class,'daily_service_id','id');
    }
}
