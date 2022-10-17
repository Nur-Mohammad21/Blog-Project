<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static $post;
    public static $imageName;
    public static $imageExtenstion;
    public static $directory;
    public static $imageUrl;
    public static $status;
    public static function imageUpload($image)
    {
        self::$imageExtenstion = $image->getClientOriginalExtension();
        self::$imageName      = Str::random(10).'.'.self::$imageExtenstion;
        self::$directory      = 'post_image/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl       = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function addNewPost($request)
    {
        self::$post                    = new Post();
        self::$post->member_id         = Auth::guard('member')->user()->id;
        self::$post->category_id       = $request->category_id;
        self::$post->title             = $request->title;
        self::$post->meta_title        = $request->meta_title;
        self::$post->short_description = $request->short_description;
        self::$post->long_description  = $request->long_description;
        if($request->file('post_image'))
        {
            self::$post->post_image = self::imageUpload($request->file('post_image'));
        }
        else
        {
            self::$post->post_image = '';
        }
        self::$post->save();
    }
    public static function updatePost($request,$id)
    {
        self::$post = Post::find($id);
        if($request->hasFile('post_image'))
        {
            if(file_exists(self::$post->post_image))
            {
                unlink(self::$post->post_image);
            }
            self::$imageUrl = self::imageUpload($request->file('post_image'));
        }
        else
        {
            self::$imageUrl = self::$post->post_image;
        }
        self::$post->category_id       = $request->category_id;
        self::$post->title             = $request->title;
        self::$post->meta_title        = $request->meta_title;
        self::$post->meta_title        = $request->meta_title;
        self::$post->short_description = $request->short_description;
        self::$post->long_description  = $request->long_description;
        self::$post->post_image        = self::$imageUrl;
        self::$post->save();
    }
    public static function deletePost($id)
    {
        self::$post = Post::find($id);
        if(file_exists(self::$post->post_image))
        {
            unlink(self::$post->post_image);
        }
        self::$post->delete();
    }
    public static function updateStatus($request)
    {
        if($request->ajax())
        {
            self::$post = Post::find($request->record_id);

            if($request->status == 'active')
            {
                self::$post->update(['status' => 0]);
            }
            else
            {
                self::$post->update(['status' => 1]);
            }
            return  self::$post->status;
        }
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}