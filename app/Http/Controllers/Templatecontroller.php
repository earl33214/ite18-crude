<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Templatecontroller extends Controller
{
    public function index()
    {
        return view('frontend.webpage');
    }
}
