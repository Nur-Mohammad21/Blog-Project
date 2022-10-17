<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    private static $category;
    public static function addNewCategory($request)
    {
        self::$category = new Category();
        self::$category->title = $request->title;
        self::$category->description = $request->description;
        self::$category->status = 0;
        self::$category->save();

    }
    public static function updateCategory($request)
    {
        self::$category = Category::find($request->id);
        self::$category->title = $request->title;
        self::$category->description = $request->description;
        self::$category->save();
    }
    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        self::$category->delete();
    }
    public static function updateStatus($request)
    {
        if($request->ajax())
        {
            self::$category = Category::find($request->record_id);

            if($request->status == 'active')
            {
                self::$category->update(['status' => 0]);
            }
            else
            {
                self::$category->update(['status' => 1]);
            }
            return  self::$category->status;
        }
    }

}
