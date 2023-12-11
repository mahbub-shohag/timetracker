<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DailyService;
use App\Models\DailyServiceCarriedMaterial;
use App\Models\DailyServiceCitywalk;
use App\Models\DailyServiceEmployees;
use App\Models\DailyServiceInternalwalk;
use App\Models\DailyServiceLot;
use App\Models\DailyServiceMaterials;
use App\Models\DailyServicePavementcondition;
use App\Models\DailyServiceWeatherobservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
class DailyServiceController extends Controller
{
    private $dsl, $data, $show;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $start_date = Carbon::now()->startOfDay()->toDateString();
        $end_date = Carbon::now()->endOfDay()->toDateString();
        $dsl = DailyService::with('location','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->whereBetween(DB::raw('created_at'),[$start_date." 00:00:00",$end_date." 23:59:59"])->get()->unique('locationId');
        //$dsl = DailyService::with('location','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->get();
        return view('ds.index',['dsl'=>$dsl,'start_date'=>$start_date,'end_date'=>$end_date]);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $dsl = DailyService::whereBetween(DB::raw('created_at'),[$start_date." 00:00:00",$end_date." 23:59:59"])->get();
        return view('ds.index', ['dsl'=>$dsl,'start_date'=>$start_date,'end_date'=>$end_date]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $ds = DailyService::with('location','service','materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->find($request->id);
        return view('ds.show', ['ds' => $ds]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyService $dailyService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyService $dailyService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        DailyService::where('id',$id)->delete();
        $ds = DailyService::all();
        return view('ds.index',['dsl'=>$ds]);
    }

    /* API Section Start */
    public function clockIn(Request $request){
        $location = Client::find($request->locationId);
        $loggedin_user = auth('sanctum')->user();
        $ds = new DailyService();
        $ds->clockIn = $request->clockIn;
        $ds->clockOut = $request->clockOut;
        $ds->amountOfMaterial = $request->amountOfMaterial;
        $ds->materialUnit = $request->materialUnit;
        $ds->comment = $request->comment == null?"":$request->comment;
        $ds->commentUnusual = $request->commentUnusual;
        $ds->createdBy = $loggedin_user['id'];
        $ds->serviceId = $request->serviceId;
        $ds->locationId = $request->locationId;
        $ds->locationName = $location->location;
        $ds->save();
        $dsEmployees  = [];
        $employees = $request->employee_ids;
        array_push($employees,$loggedin_user['id']);
        foreach ($employees as $emp_id){
            $dsEmployee = new DailyServiceEmployees();
            $dsEmployee->user_id = $emp_id;
            array_push($dsEmployees,$dsEmployee);
        }
        $ds->employees()->saveMany($dsEmployees);

        $dsWeather = new DailyServiceWeatherobservation();
        $dsWeather->type = $request->weatherObservations['type'];
        $dsWeather->amount = $request->weatherObservations['amount'];
        $dsWeather->unit = $request->weatherObservations['unit'];
        $dsWeather->temperature = $request->weatherObservations['temperature'];


        $ds->weatherobservation()->save($dsWeather);

        $dsInternalWalk = new DailyServiceInternalwalk();
        $dsInternalWalk->plow = $request->internalWalks['plow'];
        $dsInternalWalk->salt = $request->internalWalks['salt'];
        $dsInternalWalk->shovel = $request->internalWalks['shovel'];
        $dsInternalWalk->melter = $request->internalWalks['melter'];
        $ds->internalWalk()->save($dsInternalWalk);

        $dsMaterials = new DailyServiceMaterials();
        $dsMaterials->salt = $request->materials['salt'];
        $dsMaterials->grit_sand = $request->materials['grit_sand'];
        $dsMaterials->melter = $request->materials['melter'];
        $ds->materials()->save($dsMaterials);

        $dsLot = new DailyServiceLot();
        $dsLot->plow = $request->lot['plow'];
        $dsLot->salt = $request->lot['salt'];
        $dsLot->shovel = $request->lot['shovel'];
        $dsLot->melter = $request->lot['melter'];
        $ds->lots()->save($dsLot);

        $dsPavementCondition = new DailyServicePavementcondition();
        $dsPavementCondition->clear = $request->pavementCondition['clear'];
        $dsPavementCondition->snow_covered = $request->pavementCondition['snow_covered'];
        $dsPavementCondition->icy = $request->pavementCondition['icy'];
        $ds->pavementcondition()->save($dsPavementCondition);

        $dsCityWalk = new DailyServiceCitywalk();
        $dsCityWalk->plow = $request->citywalk['plow'];
        $dsCityWalk->salt = $request->citywalk['salt'];
        $dsCityWalk->shovel = $request->citywalk['shovel'];
        $dsCityWalk->melter = $request->citywalk['melter'];
        $ds->cityWalk()->save($dsCityWalk);

        $dsCarriedMaterial = new DailyServiceCarriedMaterial();
        $dsCarriedMaterial->salt = $request->carryMaterials['salt'];
        $dsCarriedMaterial->melter = $request->carryMaterials['melter'];
        $dsCarriedMaterial->machine = $request->carryMaterials['machine'];
        $ds->carriedMaterial()->save($dsCarriedMaterial);
        return $this->returnSuccess("Clock Out Completed Successfuly",$ds);
    }

    public function historyList(Request $request){
        $loggedin_user = auth('sanctum')->user();
        $from_date = date($request->from_date);
        $to_date = date($request->to_date);

        $dss = DailyService::with('materials','cityWalk','internalWalk','lots','pavementcondition','weatherobservation','employees.employee','carriedMaterial')->where('createdBy',$loggedin_user['id'])->whereBetween(DB::raw('DATE(clockOut)'),[$from_date, $to_date])->orderBy('id', 'DESC')->get();
        return $this->returnSuccess("Data Fetched Successfully",$dss);
    }

    public function returnError($message,$code): \Illuminate\Http\JsonResponse
    {
        $message = [
            "error"=>$message,
            "code"=>$code
        ];
        return response()->json($message);
    }

    public function returnSuccess($message,$data): \Illuminate\Http\JsonResponse
    {
        $message = [
            "message"=>$message,
            "status"=>200,
            "success"=>true,
            "data"=>$data
        ];
        return response()->json($message);
    }

    /* API Section End */
}
