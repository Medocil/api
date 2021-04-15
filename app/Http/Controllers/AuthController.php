<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'date_of_birth' => 'required|date_format:"d-m-Y"',
            'phone_number' => ['required', 'numeric', 'regex:/^(\+?33|0)[67]\d{8}$/'],
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'status' => 'required|string'
        ], [
            'phone_number.regex' => 'Format incorrect. Exemple : 0612345678',
        ]);

        $user = User::create([
            'lastname' => $fields['lastname'],
            'firstname' => $fields['firstname'],
            'date_of_birth' => $fields['date_of_birth'],
            'phone_number' => $fields['phone_number'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'status' => $fields['status']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
        //plainTextToken affiche le token en bdd 

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
