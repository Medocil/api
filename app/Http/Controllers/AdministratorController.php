<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }
        $users = User::where('id', '!=', auth()->id())->get();
        
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }

        $fields = $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'date_of_birth' => 'required|string',
            'phone_number' => 'required|string|digits:10',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'status' => 'required|string'
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
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
            ->update($fields)
        ; 

        $user = User::where('id', $id)->get(); 
        
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $connectedUser = User::findOrFail(auth()->id());

        if ($connectedUser->is_admin != 1) {
            throw new Exception("Not an admin");
        }

        $user = User::where('id', $id)
            ->delete()
        ; 

        return response()->json($user);
    }
}
