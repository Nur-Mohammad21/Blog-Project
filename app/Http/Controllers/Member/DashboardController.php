<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Auth;
use function PHPUnit\Framework\returnArgument;

class DashboardController extends Controller
{
    private $member;
    public function login()
    {
        return view('member.login.login');
    }
    public function memberLoginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $this->member = Member::where('email',$request->email)->first();

        if(!empty($this->member->email)){
            if(password_verify($request->password,$this->member->password))
            {
                if(Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password]))
                {
                    return redirect('/member-dashboard');
                }

            }
            else
            {
                return redirect()->back()->with('message','Password does not match.');
            }
        }
        else
        {
            return redirect()->back()->with('message','Email does not exists.');
        }
    }
    public function dashboard()
    {
        return view('member.dashboard.index');
    }
    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }
}
