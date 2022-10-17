<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliders;
    private $slider;
    private $status;
    public function index()
    {
        $this->sliders = Slider::latest()->get();
        return view('backend.sliders.index',['sliders'=>$this->sliders]);
    }
    public function create()
    {
        return view('backend.sliders.create');
    }
    public function validation($request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|image|max:20000',
        ]);
    }
    public function store(Request $request)
    {
        $this->validation($request);
        Slider::newSlider($request);
        return redirect()->back()->with('message','Slider has been saved successfully!');
    }
    public function edit($id)
    {
        $this->slider = Slider::find($id);
        return view('backend.sliders.edit',['slider'=>$this->slider]);
    }
    public function update(Request $request)
    {
        Slider::updateSlider($request);
        return redirect('/sliders')->with('message','Slider has been updated successfully!');
    }
    public function destroy($id)
    {
        Slider::deleteSlider($id);
        return redirect('/sliders')->with('message','Slider has been deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
        if($request->ajax())
        {
           $this->status = Slider::updateStatus($request);
        }
        return response()->json([
            'status' => $this->status,
        ]);
    }

}
