<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $provincies = Province::all();
        return view('main.dashboard.employee.index', compact('provincies'));
    }
}
