<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierType;

class SupplierController extends Controller

{
    public function index()
    {
        $supplierTypes = SupplierType::where('status','1')->get();
        return view('main.dashboard.supplier.index', compact('supplierTypes'));
    }
}
