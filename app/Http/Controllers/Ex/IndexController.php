<?php

namespace App\Http\Controllers\Ex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function home()
    {
        return view('main.index');
    }
}
