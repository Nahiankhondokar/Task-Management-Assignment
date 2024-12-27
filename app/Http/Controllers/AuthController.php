<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login (Request $request): View
    {
        dd();
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
