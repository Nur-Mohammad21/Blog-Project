<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;
    protected $status;
    public function index()
    {
        $this->categories = Category::latest()->get();
        return view('backend.categories.index',['categories'=>$this->categories]);
    }
    public function create()
    {
        return view('backend.categories.create');
    }
    public function validation($request)
    {
        $this->validate($request,[
            'title' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
        ]);
    }
    public function store(Request $request)
    {
        $this->validation($request);
        Category::addNewCategory($request);
        return redirect()->back()->with('message','Category has been saved successfully!');
    }
    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('backend.categories.edit',['category'=>$this->category]);

    }
    public function update(Request $request)
    {
        Category::updateCategory($request);
        return redirect('/category')->with('message','Category has been updated successfully!');
    }
    public function destroy($id)
    {
        Category::deleteCategory($id);
        return redirect()->back()->with('message','Category has been delete successfully!');
    }
    public function updateStatus(Request $request)
    {
        $this->status =Category::updateStatus($request);
        return response()->json([
            'status' => $this->status,
            'record_id' => $request->record_id,
        ]);
    }
}
