<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemGroupController extends Controller
{
     public function index()
    {
        return view('main.dashboard.item_group.index');
    }
}
