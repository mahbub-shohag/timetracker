<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DailyService;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all()->count();
        $employees = User::where('role','=','user')->get()->count();
        $dailyServices = DailyService::all()->count();
        return view('admin.home.index',['clients'=>$clients,'employees'=>$employees,'dailyServices'=>$dailyServices]);
    }
}
