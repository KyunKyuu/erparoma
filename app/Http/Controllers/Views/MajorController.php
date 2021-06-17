<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    //
    public function index()
    {
        return view('main.dashboard.major.index');
    }
}
