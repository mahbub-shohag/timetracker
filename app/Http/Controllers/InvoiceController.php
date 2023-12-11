<?php

namespace App\Http\Controllers;

use App\Models\DailyService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    private $pdf;
    public function index()
    {
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date = Carbon::now()->endOfMonth()->toDateString();
        $invoices = DailyService::with('location','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->whereBetween(DB::raw('created_at'),[$start_date." 00:00:00",$end_date." 23:59:59"])->get()->unique('locationId');
        //$invoices = DailyService::with('location','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->get();//->unique('locationId');
        //dd($invoices);
        return view('invoice.index',['invoices'=>$invoices]);
    }
    public function show(Request $request)
    {
        $ds = DailyService::find($request->id);
        //echo "<pre>";print_r($ds);exit;
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date = Carbon::now()->endOfMonth()->toDateString();
        $dss = DailyService::with('location.clientServices','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->where('locationId',$ds->locationId)->whereBetween(DB::raw('created_at'),[$start_date." 00:00:00",$end_date." 23:59:59"])->get();
        //echo "<pre>";print_r($dss[0]->location->clientServices[0]->rate);exit;
        $total_time = 0;
        foreach ($dss as $service){
            $clcokOut = \Carbon\Carbon::parse($service->clockOut);
            $clcokIn = \Carbon\Carbon::parse($service->clockIn);
            $minutes = $clcokOut->diffInMinutes($clcokIn);
            $total_time+=$minutes;
        }
        //echo $total_time;exit;
        $total_working_hour = $total_time/60;
        $rate = $dss[0]->location->clientServices[0]->rate;
        //echo "<pre>";print_r($invoices);exit;
        return view('invoice.show',['dss'=>$dss,'total_working_hour'=>$total_working_hour,'rate'=>$rate]);
    }
    public function downloadInvoice(Request $request)
    {
        $ds = DailyService::find($request->id);
        //echo "<pre>";print_r($ds);exit;
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date = Carbon::now()->endOfMonth()->toDateString();
        $dss = DailyService::with('location.clientServices','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->where('locationId',$ds->locationId)->whereBetween(DB::raw('created_at'),[$start_date." 00:00:00",$end_date." 23:59:59"])->get();
        //echo "<pre>";print_r($dss[0]->location->clientServices[0]->rate);exit;
        $total_time = 0;
        foreach ($dss as $service){
            $clcokOut = \Carbon\Carbon::parse($service->clockOut);
            $clcokIn = \Carbon\Carbon::parse($service->clockIn);
            $minutes = $clcokOut->diffInMinutes($clcokIn);
            $total_time+=$minutes;
        }
        //echo $total_time;exit;
        $total_working_hour = $total_time/60;
        $rate = $dss[0]->location->clientServices[0]->rate;
        $this->pdf = Pdf::loadView('invoice.downloadinvoice',['dss'=>$dss,'total_working_hour'=>$total_working_hour,'rate'=>$rate]);
        return $this->pdf->stream('invoice.pdf');
    }
}
