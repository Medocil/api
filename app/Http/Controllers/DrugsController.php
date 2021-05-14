<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Drugs;
use Exception;
use Illuminate\Http\Request;

class DrugsController extends Controller
{

    public function index()
    {
        
        $drugs = Drugs::all();

        return response()->json($drugs);
    }

   
}
