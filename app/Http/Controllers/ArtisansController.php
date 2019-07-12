<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisansController extends Controller
{
    public function index()
    {
        return view('artisans.index');
    }
}
