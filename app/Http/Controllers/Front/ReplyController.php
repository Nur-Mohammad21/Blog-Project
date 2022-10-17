<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'reply' => 'required',
            'comment_id' => 'required'
        ]);
        Reply::newReply($request);
        return redirect()->back()->with('reply_success_message','Reply message sent successfully!');
    }
}
