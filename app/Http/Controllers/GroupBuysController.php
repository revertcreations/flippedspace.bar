<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupBuysController extends Controller
{
    public function index()
    {
        return view('group_buys.index');
    }
}
