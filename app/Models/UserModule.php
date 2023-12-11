<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModule extends Model
{
    use HasFactory;

    public static $user, $image, $imageExtension,$directory, $imageName,$imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory = 'usermodule-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newUserModule($request)
    {
        self::$user = new UserModule;
        self::$user->first_name = $request->first_name;
        self::$user->last_name = $request->last_name;
        self::$user->email = $request->email;
        self::$user->phone = $request->phone;
        self::$user->address = $request->address;
        self::$user->age = $request->age;
        self::$user->image = self::getImageUrl($request);
        self::$user->save();
    }

    public static function updateUserModule($request, $id)
    {
        self::$user = UserModule::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$user->image))
            {
                unlink(self::$user->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$user->image;
        }
        self::$user->first_name     = $request->first_name;
        self::$user->last_name      = $request->last_name;
        self::$user->email          = $request->email;
        self::$user->phone          = $request->phone;
        self::$user->address        = $request->address;
        self::$user->age            = $request->age;
        self::$user->image          = self::$imageUrl;
        self::$user->save();
    }

    public static function deleteUser($id)
    {
        self::$user = UserModule::find($id);

        if(self::$user->image)
        {
            unlink(self::$user->image);
        }
        self::$user->delete();
    }
}
