<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);
        if(!empty(Auth::guard('member')->user()->id))
        {
            Comment::newComment($request);
        }
        else
        {
            return redirect()->back()->with('message','Please you must be login first.');
        }
        return redirect()->back()->with('message','Comment posted successfully!');
    }
}
