<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberCommentController extends Controller
{
    private $comments;
    private $comment;
    public function index()
    {
        $this->comments = Comment::where('member_id',Auth::guard('member')->user()->id)->latest()->get();
        return view('member.comments.index',['comments'=>$this->comments]);
    }
    public function edit($id)
    {

        $this->comment = Comment::find($id);
        return view('member.comments.edit',['comment'=>$this->comment]);
    }
    public function update(Request $request)
    {
        Comment::updateComment($request);
        return redirect('/member-comments')->with('message','Comment updated successfully!.');
    }
    public function destroy($id)
    {
        Comment::deleteComment($id);
        return redirect()->back()->with('message','Comment deleted successfully!.');
    }
}
