<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $with = ['clientServices'];
    protected $fillable = [
      'client_id',
      'service_id'
    ];
    public function clientServices()
    {
        return $this->hasMany(ClientService::class,'client_id','id');
    }

}
