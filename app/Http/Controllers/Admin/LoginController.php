<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        } else{
            return view('auth.login');
        }
    }
    public function postLogin(Request $request)
    {
    	$validators =Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            $userData =User::where('email', $request->email)->first();
            if(Auth::attempt(['email'=>$request->get('email'),'password'=>$request->get('password')])){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->back()->with(['error' => 'Invalid Email or Password']);
            }
        }
    }
    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}
