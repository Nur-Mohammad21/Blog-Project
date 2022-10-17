<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $member;
    public function profile()
    {
        $this->member = Member::find(Auth::guard('member')->user()->id);
        return view('member.profile.profile',['member'=>$this->member]);
    }
    public function update(Request $request)
    {
        Member::updateMember($request);
        return redirect()->back()->with('message','Your profile has updated successfully!.');
    }
    public function checkPassword()
    {
        return view('member.profile.check_password');
    }
    public function checkCurrentPassword(Request $request)
    {
        if($request->ajax())
        {
            if(Hash::check($request->current_password,Auth::guard('member')->user()->password))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required',
            'confirm_password'  => 'required',
        ]);
        if(Hash::check($request->current_password,Auth::guard('member')->user()->password))
        {
            if($request->new_password == $request->confirm_password)
            {
                Member::updatePassword($request);
                return redirect()->back()->with('success_message','Password Updated Successfully!');
            }
            else
            {
                return redirect()->back()->with('error_message','New Password and Confirm Password Does Not Match');
            }

        }
        else
        {
            return redirect()->back()->with('error_message','Current Password Does Not Match');
        }
    }
}
