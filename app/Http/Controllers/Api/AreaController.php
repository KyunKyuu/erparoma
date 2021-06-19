<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function regency_get()
    {
        $data = Regency::where('province_id', $_GET['id'])->get();
        if ($data) {
            return response(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
        }
        return response(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
    }

    public function district_get()
    {
        $data = District::where('regency_id', $_GET['id'])->get();
        if ($data) {
            return response(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
        }
        return response(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
    }

    public function village_get()
    {
        $data = Village::where('district_id', $_GET['id'])->get();
        if ($data) {
            return response(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
        }
        return response(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
    }
}
