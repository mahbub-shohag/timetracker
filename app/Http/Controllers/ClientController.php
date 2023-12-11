<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientService;
use App\Models\ClientServiceEmployee;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\size;
use function Symfony\Component\String\length;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('clientServices.employees.employee')->get();
//        echo "<pre>";
//        foreach ($clients as $client){
//            print_r($client->clientServices);
//        }
//        exit;
        //$clients = Client::all()->with('clientServices.employees')->get();
        //$clients = $allclients->with('clientServices.employees')->get();
        //$clients = Client::with('clientServices.employees')->get();
        //dd($clients);
        return view(('clients.index'),['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $employees = User::where('role','user')->get();
        return view('clients.create',['services'=>$services,'employees'=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $service = Service::find($request->service);
        $client->name = $request->name;
        $client->location = $request->location;
        $client->save();
        $clientService = $client->clientServices()->create([
            'client_id'=>$client->id,
            'service_id'=>$request->service,
            'rate'=>$request->rate
        ]);
        $clientServiceEmployees = [];
        for($i=0;$i<count($request->employees);$i++){
            $clientServiceEmployee = new ClientServiceEmployee();
            $clientServiceEmployee->client_service_id = $clientService->id;
            $clientServiceEmployee->employee_id = $request->employees[$i];
            $clientServiceEmployee->save();
            //array_push($clientServiceEmployees,$clientServiceEmployee);
        }
        //$clientService->employees()->save($clientServiceEmployees);
        $clients = Client::all();
        return view('clients.index',['clients'=>$clients]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //print_r(Client::all());
        $user = Client::with('clientServices.employees');
        dd($user);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $services = Service::all();
        $employees = User::where('role','user')->get();
        $client = Client::with('clientServices.employees')->find($id);
        //echo "<pre>";print_r($client->clientServices[0]->employees->pluck('employee_id')->toArray());exit;
        $selectedEmployees = [];
        if(isset($client->clientServices) && sizeof($client->clientServices)>0 && sizeof($client->clientServices[0]->employees)>0){
            $selectedEmployees = $client->clientServices[0]->employees->pluck('employee_id')->toArray();
        }
        //echo "<pre>";print_r($client->clientServices[0]->rate);exit;
        return view('clients.edit',['client'=>$client,'services'=>$services,'employees'=>$employees,'selectedEmployees'=>$selectedEmployees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::with('clientServices.employees')->find($request->id);
        //$service = Service::find($request->service);
        $client->name = $request->name;
        $client->location = $request->location;
        $client->save();
        if(isset($client->clientServices) && sizeof($client->clientServices)>0){
            ClientServiceEmployee::where('client_service_id',$client->clientServices[0]->id)->delete();
            ClientService::where('client_id',$client->id)->delete();
        }
        $clientService = $client->clientServices()->create([
            'client_id'=>$client->id,
            'service_id'=>$request->service,
            'rate'=>$request->rate
        ]);
        $clientServiceEmployees = [];
        for($i=0;$i<count($request->employees);$i++){
            $clientServiceEmployee = new ClientServiceEmployee();
            $clientServiceEmployee->client_service_id = $clientService->id;
            $clientServiceEmployee->employee_id = $request->employees[$i];
            $clientServiceEmployee->save();
        }
        $clients = Client::all();
        return view('clients.index',['clients'=>$clients]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Client::where('id',$id)->delete();
        $clients = Client::all();
        return view(('clients.index'),['clients'=>$clients]);
    }

    public function clientList(): \Illuminate\Http\JsonResponse
    {
        $clients = Client::all();
        return response()->json([
            "data"=>$clients
        ]);
    }

    public function clientDetail(Request $request){
        $client = Client::find($request->id);
        return response()->json([
           "data"=>$client->with('clientServices.employees.employee')->get()
        ]);
    }

    public function addLocation(Request $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->location = $request->location;
        $client->save();
        $savedClient = Client::find($client->id);
        return $this->returnSuccess("Location Added Successfulyy",$savedClient);
    }

    public function locationList(): \Illuminate\Http\JsonResponse
    {
        $clients = Client::all();

        return $this->returnSuccess("Location List",$clients);
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
}
