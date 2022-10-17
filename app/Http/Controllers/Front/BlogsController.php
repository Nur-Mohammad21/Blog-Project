<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    private $posts;
    private $post;
    private $comments;
    private $categoryPosts;
    private $categories;
    public function index()
    {
        $this->posts = Post::paginate(3);;
        $this->categories = Category::where('status',1)->get();
        return view('front.blogs.index',['posts'=>$this->posts,'categories'=>$this->categories]);
    }
    public function detail($id)
    {
        $this->post = Post::find($id);
        $this->comments = Comment::where('post_id',$id)->get();
        return view('front.blogs.detail',['post'=>$this->post,'comments'=>$this->comments]);
    }
    public function categoryPost($id)
    {
        $this->categories = Category::latest()->get();
        $this->categoryPosts =  Post::where('category_id',$id)->paginate(3);
        return view('front.category_blogs.category_blogs',['posts'=>$this->categoryPosts,'categories'=>$this->categories]);
    }

}
