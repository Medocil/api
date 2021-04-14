<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{

    public function index()
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }
        $users = User::where('id', '!=', auth()->id())->get();

        return response()->json($users);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }

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

        return response()->json($user);
    }

    public function show(Administrator $administrator)
    {
        //
    }
    public function edit(Administrator $administrator)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }

        $fields = $request->validate([

            'lastname' => 'string',
            'firstname' => 'string',
            'date_of_birth' => 'string',
            'phone_number' => 'string|digits:10',
            'email' => 'string|unique:users,email',
            'password' => 'string|confirmed',
            'status' => 'string',
            'is_admin' => 'nullable|integer'
        ]);


        $user = User::where('id', $id)
            ->update($fields);

        $user = User::where('id', $id)->get();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }

        $user = User::where('id', $id)
            ->delete();

        return response()->json($user);
    }
}
