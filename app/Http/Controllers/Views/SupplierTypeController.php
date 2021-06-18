<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierTypeController extends Controller
{
    //
    public function index()
    {
        return view('main.dashboard.supplier_type.index');
    }
}
