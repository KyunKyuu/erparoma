<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{District,Province,Regency,Village};
class CompanyProfileController extends Controller
{
    public function index()
    {
        $Districts = District::get();
        $Provincies = Province::get();
        $Regencies = Regency::get();
        $Villages = Village::get();
        return view('main.dashboard.company_profile.index', compact('Districts','Provincies','Regencies','Villages'));
    }
}
