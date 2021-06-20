<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Major;
use App\Models\Province;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $provincies = Province::all();
        $majors = Major::all();
        $divisions = Division::all();
        return view('main.dashboard.employee.index', compact(['provincies', 'majors', 'divisions']));
    }
}
