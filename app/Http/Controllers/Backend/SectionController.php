<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $sections;
    private $section;
    private $status;

    public function index()
    {
        $this->sections = Section::latest()->get();
        return view('backend.section.index',['sections'=>$this->sections]);
    }
    public function create()
    {
        return view('backend.section.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
        ]);
        Section::newSection($request);
        return redirect()->back()->with('message','Section has been saved successfully!');
    }
    public function edit($id)
    {
        $this->section = Section::find($id);
        return view('backend.section.edit',['section'=>$this->section]);
    }
    public function update(Request $request)
    {
        Section::updateSection($request);
        return redirect('/section')->with('message','Section has been updated successfully!');
    }
    public function destroy($id)
    {
        Section::deleteSection($id);
        return redirect('/section')->with('message','Section has been deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
       $this->status = Section::updateStatus($request);
       return response()->json([
            'status' => $this->status,
            'record_id' => $request->record_id,
       ]);
    }

}
