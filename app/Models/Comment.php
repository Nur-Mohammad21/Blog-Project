<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Comment extends Model
{
    use HasFactory;
    private static $comment;
    public static function newComment($request)
    {
        self::$comment = new Comment();
        self::$comment->comment =$request->comment;
        self::$comment->post_id = $request->post_id;
        self::$comment->member_id = Auth::guard('member')->user()->id;
        self::$comment->save();
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public static function updateComment($request)
    {
        self::$comment = Comment::find($request->id);
        self::$comment->comment = $request->comment;
        self::$comment->save();
    }
    public static function deleteComment($id)
    {
        self::$comment = Comment::find($id);
        self::$comment->delete();
    }

}
