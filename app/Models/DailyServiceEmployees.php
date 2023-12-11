<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyServiceEmployees extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function dailyService(){
        return $this->belongsTo(DailyService::class,'daily_service_id');
    }
}
