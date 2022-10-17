<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $posts;
    public function index()
    {
        $this->posts = Post::where(['member_id'=>Auth::guard('member')->user()->id])->latest()->get();
        return view('member.posts.index',['posts'=>$this->posts]);
    }
    public function create()
    {
        $this->categories = Category::where('status',1)->get();
        return view('member.posts.create',['categories'=>$this->categories]);
    }
    public function validation($request)
    {
        $this->validate($request,
            [
                'category_id'       => 'required',
                'title'             => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
                'meta_title'        => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
                'short_description' => 'required',
                'post_image'        => 'mimes:jpeg,jpg,png,gif|image|max:20000',

            ],
            [
                'category_id'           => 'Category is required',
                'title.required'        => 'Title field is required.',
                'title.regex'           => 'Valid title field is required.',
                'meta_title.required'   => 'Meta title field is required.',
                'meta_title.regex'      => 'Valid meta title field is required.',
                'short_description.required' => 'Short description field is required.',
                'post_image.mimes'      => 'Please select valid image file.',
                'post_image.image'      => 'Please select image file.',
                'post_image.max'        => 'Maximum file size is 2mb.',

            ]
        );
    }
    public function store(Request $request)
    {
        $this->validation($request);
        Post::addNewPost($request);
        return redirect()->back()->with('message','Post has been saved successfully!');
    }
    public function edit($id)
    {
        $this->categories = Category::where('status',1)->get();
        $this->post = Post::find($id);
        return view('member.posts.edit',['post'=>$this->post,'categories'=>$this->categories]);
    }
    public function update(Request $request,$id)
    {
        $this->validation($request);
        Post::updatePost($request,$id);
        return redirect('/member-posts')->with('message','Post has been updated successfully!');

    }
    public function destroy($id)
    {
        Post::deletePost($id);
        return redirect()->back()->with('message','Post has been deleted successfully!');
    }

}
