<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $posts;
    private $categories;
    public function index()
    {
        $this->posts = Post::where('status',1)->latest()->limit(5)->get();
        $this->categories = Category::where('status',1)->get();
        $this->sliders = Slider::where('status',1)->get();
        return view('front.home.home',['posts'=>$this->posts,'categories'=>$this->categories,'sliders'=> $this->sliders]);
    }
    public function contact()
    {
        return view('front.contact.index');
    }
}
