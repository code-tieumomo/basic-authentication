<?php

namespace CodeTieumomo\BasicAuthentication\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginShow()
    {
        if (Auth::check()) return redirect()->intended();

        return view('basic-authentication::login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        if (Auth::attempt(['email' => trim($request->email), 'password' => trim($request->password)])) {
            return redirect()->intended();
        } else {
            return back()->with('fail', 'Something went wrong while logging in')->withInput();
        }
    }

    public function registerShow()
    {
        if (Auth::check()) return redirect()->intended();

        return view('basic-authentication::register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:12'
        ]);

        $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => bcrypt(trim($request->password)),
        ]);

        if ($user) {
            if (Auth::attempt(['email' => trim($request->email), 'password' => trim($request->password)])) {
                return redirect()->intended();
            } else {
                return back()->with('fail', 'Something went wrong while logging in with new user, try again later')->withInput();
            }
        } else {
            return back()->with('fail', 'Something went wrong while registering new user, try again later')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
