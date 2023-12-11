<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $users, $user;
    static $image,$directory,$imageName,$imageUrl,$imageExtension;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('profile_photo_path');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory = '';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function create(Request $request)
    {
        return view('admin.user.create');
    }

    public function store(Request $request){
        if($request->password == $request->confirm_password){
            $user = new User;
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->age = $request->age;
            $user->save();
            return back()->with('message', 'User info create successfully');
        }else{
            return back()->with("message", "Password doesn't matches");
        }

    }

    public function changepassword($id)
    {
        $this->user = User::find($id);
        return view('admin.user.changepassword',['user'=> $this->user]);
    }
    public function setpassword(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = User::find($id);

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('message', 'Password Changed Successfully');
    }

    public function manage()
    {
        $users = User::all();
        //echo "<pre>";print_r($users);exit;
        //$this->users = UserModule::all();
        return view('admin.user.index', ['users'=> $users]);
    }

    public function edit($id)
    {
        $this->user = User::find($id);
        return view('admin.user.edit', ['user'=> $this->user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($request->id);
        if($request->password!=null and ($request->password == $request->confirm_password)){
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('user.index')->with('message', 'User updated successfully');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return back()->with('message', 'User info delete successfully');
    }

    /* API Starts */

    public function getUserList(){
        $users = User::all();
        //print_r($users);exit;
        return response()->json($users);
    }

    public function employeeList(){
        $loggedin_user = auth('sanctum')->user();
        $users = User::where('role','=','user')->where('email','!=',$loggedin_user['email'])->get();
        return $this->returnSuccess("Employee List",$users);
    }

    public function employeeSearchList(Request $request){
        $users = User::where('name', 'like', '%'.$request->name.'%')->get();
        return $this->returnSuccess("Employee List",$users);
    }

    public function storeUser(Request $request){
        return response()->json(['form_request' => $request->all()]);
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return $this->returnError("Email or password is invalid",401);
        }
        if($user && Hash::check($request->password,$user->password)){
            $token = $user->createToken('api');
            $user->token = $token->plainTextToken;
            return $this->returnSuccess("User Logged in Successfully",$user);
        }else{
            return $this->returnError("Email or password is invalid",401);
        }
    }

    public function profile(Request $request){
        return $request->user();
    }

    public function logout(Request $request){

        $user = $request->user();
        //$user->currentAccessToken()->delete();
        $user->tokens()->delete();
        return $this->returnSuccess("User logged out successfully!",[]);
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
