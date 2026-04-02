<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'phone' => ['required','string','regex:/^([0-9\s\-\+\(\)]*)$/','max:13'],
            'age' => ['required','integer','min:18','max:100'],
            'gender' => ['required','in:male,female'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user=User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        Auth::login($user);
        logActivity('User registred: ' . $user->email);
        return redirect('/');
    }

    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            logActivity('User logged in: ' . auth()->user()->email);
            return redirect('/');
        }

        return back()->with('error', 'Wrong email or password');
    }

    public function logout()
    {
        $user=auth()->user();
        logActivity('User logged out ' . $user->email);
        Auth::logout();
        return redirect('/login');
    }


}
