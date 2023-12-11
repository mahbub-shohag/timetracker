<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{

    use HasFactory;

    protected $fillable = [
        'client_id',
        'service_id',
        'rate'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function employees()
    {
        return $this->hasMany(ClientServiceEmployee::class);
    }

}
