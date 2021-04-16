<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()) {
            throw new Exception("Not logged in");
        }

        $userId = auth()->user()->id;

        $fields = $request->validate([
            'address' => 'required|string',
            'cpostal' => 'required|integer|digits:5',
            'latitude' => ['nullable', 'regex:/^(\+|-)?(?:90(?:(?:.0{1,14})?)|(?:[0-9]|[1-8][0-9])(?:(?:.[0-9]{1,14})?))$/'],
            'longitude' => ['nullable', 'regex:/\A[+-]?(?:180(?:\.0{1,18})?|(?:1[0-7]\d|\d{1,2})\.\d{1,18})\z/x'],

        ]);

        $address = Address::create([
            'user_id' => $userId,
            'address' => $fields['address'],
            'cpostal' => $fields['cpostal'],
            'latitude' => $fields['latitude'],
            'longitude' => $fields['longitude'],

        ]);

        return response($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
