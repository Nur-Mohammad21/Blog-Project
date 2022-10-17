<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];
    private static $section;

    public static function newSection($request)
    {
        self::$section = new Section();
        self::$section->name = $request->name;
        self::$section->save();
    }
    public static function updateSection($request)
    {
        self::$section = Section::find($request->id);
        self::$section->name = $request->name;
        self::$section->save();
    }
    public static function deleteSection($id)
    {
        self::$section = Section::find($id);
        self::$section->delete();
    }
    public static function updateStatus($request)
    {
        self::$section = Section::find($request->record_id);
        if($request->status == 'active')
        {
            self::$section->update(['status' => 0]);
        }
        else
        {
            self::$section->update(['status' => 1]);
        }
        return  self::$section->status;
    }
}
