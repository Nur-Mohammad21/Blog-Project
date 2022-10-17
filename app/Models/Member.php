<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Member extends Authenticatable
{
    use HasFactory;
    protected $guard = 'member';
    protected  $fillable = ['name','email','phone','password','address','image'];
    protected $hidden = ['password'];

    private static $member;
    public static $imageName;
    public static $imageExtenstion;
    public static $directory;
    public static $imageUrl;
    public static $status;
    public static function imageUpload($image)
    {
        self::$imageExtenstion= $image->getClientOriginalExtension();
        self::$imageName      = Str::random(10).'.'.self::$imageExtenstion;
        self::$directory      = 'member_image/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl       = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function addNewMember($request)
    {
        self::$member           = new Member();
        self::$member->name     = $request->name;
        self::$member->email    = $request->email;
        self::$member->phone    = $request->phone;
        self::$member->address  = $request->address;
        self::$member->password = bcrypt($request->password);
        self::$member->image    = self::imageUpload($request->file('image'));
        self::$member->save();
    }
    public static function updateMember($request)
    {
        self::$member = Member::find($request->id);
        if($request->hasFile('image'))
        {
            if(file_exists(self::$member->image))
            {
                unlink(self::$member->image);
            }
            self::$imageUrl = self::imageUpload($request->file('image'));
        }
        else
        {
            self::$imageUrl =self::$member->image;
        }
        self::$member->name     = $request->name;
        self::$member->email    = $request->email;
        self::$member->phone    = $request->phone;
        self::$member->address  = $request->address;
        self::$member->image    = self::$imageUrl;
        self::$member->save();
    }
    public static function deleteMember($id)
    {
        self::$member = Member::find($id);
        if(file_exists(self::$member->image))
        {
            unlink(self::$member->image);
        }
        self::$member->delete();
    }
    public static function updatePassword($request)
    {
        self::$member = Member::find(Auth::guard('member')->user()->id);
        self::$member->password = bcrypt($request->new_password);
        self::$member->save();
    }

}
