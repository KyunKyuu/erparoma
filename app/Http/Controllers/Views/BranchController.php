<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    //
    public function index()
    {
        $branch = Branch::get();
        return view('main.dashboard.branch.index', compact('branch'));
    }
}