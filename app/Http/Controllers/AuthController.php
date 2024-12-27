<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login (LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
      
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return redirect()->route('login')->with('error', 'Login failed');
    }

    public function register (RegisterRequest $request): RedirectResponse
    {
        $user = User::query()->create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);
        
        if($user){
            return redirect()->route('login')->with('success', 'Registration successful');
        }
        return redirect()->back();
    }
}
