<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Exception;
use Illuminate\Http\Request;

class CourierController extends Controller
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
            'identity_number' => 'required|string|min:12|max:12',
            'kbis_file' => 'required|string',
            'criminal_record' => 'required|string'
        ]);
        $courier = Courier::create([
            'user_id' => $userId,
            'identity_number' => $fields['identity_number'],
            'kbis_file' => $fields['kbis_file'],
            'criminal_record' => $fields['criminal_record'],
        ]);

        return response($courier, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        //
    }
}
