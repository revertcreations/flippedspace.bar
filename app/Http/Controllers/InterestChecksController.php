<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestChecksController extends Controller
{
    public function index()
    {
        return view('interest_checks.index');
    }
}
