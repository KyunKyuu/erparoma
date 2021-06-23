<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchType;

class BranchController extends Controller
{
    //
    public function index()
    {
        $Branch = BranchType::get();
        return view('main.dashboard.branch.index', compact('Branch'));
    }
}