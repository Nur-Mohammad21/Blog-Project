<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
{
    private $members;
    private $member;
    public function index()
    {
        $this->members = Member::latest()->get();
        return view('backend.members.index',['members'=>$this->members]);
    }
    public function create()
    {
        return view('backend.members.create');
    }
    public function validation($request)
    {

        $this->validate($request,
            [
                'name'       => 'required',
                'email'      => 'required|email|unique:members',
                'phone'      => 'required|digits:11',
                'password'   => 'required',
                'image'      => 'mimes:jpeg,jpg,png,gif|image|max:20000',

            ],
            [
                'name.required'        => 'Name field is required.',
                'name.regex'           => 'Valid Name field is required.',
                'email.required'       => 'The email field is required.',
                'email.email'          => 'Valid email is required.',
                'email.unique'         => 'Email must be unique.',
                'phone.required'       => 'Phone number is required.',
                'password.required'    => 'The Password is required.',
                'image.mimes'          => 'Please select valid image file.',
                'image.image'          => 'Please select image file.',
                'image.max'            => 'Maximum file size is 2mb.',

            ]
        );
    }
    public function store(Request $request)
    {
        $this->validation($request);
        Member::addNewMember($request);
        return redirect()->back()->with('message','Member info has been saved successfully.');
    }
    public function edit($id)
    {
        $this->member = Member::find($id);
        return view('backend.members.edit',['member'=>$this->member]);
    }
    public function update(Request $request)
    {
       Member::updateMember($request);
        return redirect('/members')->with('message','Member info has been updated successfully.');
    }
    public function destroy($id)
    {
        Member::deleteMember($id);
        return redirect('/members')->with('message','Member info has been deleted successfully.');
    }
}
