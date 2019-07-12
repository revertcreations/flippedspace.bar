<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassifiedsController extends Controller
{
    public function index()
    {
        return view('classifieds.index');
    }
}
