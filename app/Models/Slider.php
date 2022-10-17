<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\getSelectSql;

class Slider extends Model
{
    use HasFactory;
    private static $slider;
    private static $imageName;
    private static $imageExtension;
    private static $directory;
    private static $imageUrl;

    public static function uploadImage($image)
    {
        self::$imageExtension = $image->getClientOriginalExtension();
        self::$imageName      = Str::random(8).'.'.self::$imageExtension;
        self::$directory      = 'slider_image/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl       = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newSlider($request)
    {
        self::$slider        = new Slider();
        self::$slider->title = $request->title;
        self::$slider->url   = $request->url;
        self::$slider->image = self::uploadImage($request->file('image'));
        self::$slider->save();
    }
    public static function updateSlider($request)
    {
        self::$slider = Slider::find($request->id);
        if($request->hasFile('image'))
        {
            if(file_exists(self::$slider->image))
            {
                unlink(self::$slider->image);
            }
            self::$imageUrl = self::uploadImage($request->file('image'));

        }
        else
        {
            self::$imageUrl = self::$slider->image;
        }
        self::$slider->title = $request->title;
        self::$slider->url   = $request->url;
        self::$slider->image = self::$imageUrl;
        self::$slider->save();

    }
    public static function deleteSlider($id)
    {
        self::$slider = Slider::find($id);
        if(file_exists(self::$slider->image))
        {
            unlink(self::$slider->image);
        }
        self::$slider->delete();
    }
    public static function updateStatus($request)
    {
        self::$slider = Slider::find($request->record_id);

        if($request->status == 'active')
        {
            self::$slider->status = 0;
        }
        else
        {
            self::$slider->status = 1;
        }
        self::$slider->save();
        return self::$slider->status;
    }
}
