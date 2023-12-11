<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientServiceEmployee extends Model
{
    use HasFactory;
    public function clientService()
    {
        return $this->belongsTo(ClientService::class,'client_service_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
