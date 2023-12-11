<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todo
        $employees = User::all()->where('role','user');
        return view('employee.index',['employees'=>$employees]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->role = 'user';
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('employees.index')->with('message', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::find($id);
        return view('employee.show',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = User::find($id);
        return view('employee.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data
        // echo $id;exit;
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:users,email,' . $id,
//            'phone' => 'required|numeric',
//        ]);

        // Find the user by ID
        $user = User::find($request->id);

        // Update the user's information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        //print_r($user);exit;
        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the changes
        $user->save();

        return redirect()->route('employees.index')->with('message', 'Employee info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        $employees = User::all();
        return view('employee.index',['employees'=>$employees]);
    }
}
