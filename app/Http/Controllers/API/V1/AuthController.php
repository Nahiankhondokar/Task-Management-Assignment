<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

        $response['admin'] = $admin;
        $response['token'] = $admin->createToken('token')->plainTextToken; 

        return $this->sendResponse($response, 'User login successfully.');

    }

    public function register(RegisterRequest $request)
    {
        $admin = Admin::query()->create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);
   
        return $this->sendResponse($admin, 'User register successfully.');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->sendResponse('', 'admin logout successfully.');
    }
}
