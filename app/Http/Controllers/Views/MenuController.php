<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
        $section = Section::all();
        return view('main.dashboard.menu.index', compact('section'));
    }
}
