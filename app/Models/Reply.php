<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    use HasFactory;
    private static $reply;
    public static function newReply($request)
    {
        self::$reply = new Reply();
        self::$reply->reply = $request->reply;
        self::$reply->comment_id = $request->comment_id;
        self::$reply->member_id = Auth::guard('member')->user()->id;
        self::$reply->save();
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
