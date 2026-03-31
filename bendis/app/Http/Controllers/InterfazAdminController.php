<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterfazAdminController extends Controller
{
    public function index()
    {
        return view('panel'); 
    }
}
