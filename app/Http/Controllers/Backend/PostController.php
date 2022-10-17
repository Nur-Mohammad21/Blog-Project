<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts;
    private $categories;
    private $post;
    private $status;
    public function index()
    {
        $this->posts = Post::latest()->get();
        return view('backend.posts.index',['posts'=>$this->posts]);
    }

    public function destroy($id)
    {
        Post::deletePost($id);
        return redirect()->back()->with('message','Post has been deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
        $this->status = Post::updateStatus($request);
        return response()->json([
            'status' => $this->status,
            'record_id' => $request->record_id
        ]);
    }

}
