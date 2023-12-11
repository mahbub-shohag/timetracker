<?php

namespace App\Http\Controllers;

use App\Models\AnotherModule;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    private $locations, $location;


    public function add()
    {
        return view('admin.location.new');
    }

    public function create(Request $request)
    {
        Location::newLocatoin($request);
        return back()->with('message', 'Location info create successfully');
    }

    public function index()
    {
        $this->locations = Location::all();
        return view('admin.location.index', ['locations' => $this->locations]);
    }

    public function edit($id)
    {
        $this->location = Location::find($id);
        return view('admin.location.edit', ['location' => $this->location]);
    }

    public function update(Request $request, $id)
    {
        Location::updateLocation($request, $id);
        return redirect('/location/manage')->with('message', 'update location info successfully');
    }

    public function delete($id)
    {
        Location::deleteLocation($id);
        return back()->with('message', 'Location info delete successfully');
    }

}
