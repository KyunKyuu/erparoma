<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Brand::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $brand = Brand::all();
        return DataTables::of($brand)
            ->addColumn('buttons', function ($brand) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/brand/get" data-update="/api/v1/brand/update" data-target="' . $brand->id . '" data-modal="#updateBrand">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/brand/delete" data-target="' . $brand->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($brand) {
                return date('d-M-Y H:i', strtotime($brand->created_at));
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Brand::where('merk_name', $request->merk_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama brand telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Brand::create($request->all());
        return response()->json(['message' => 'Selamat, brand berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Brand::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, brand berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Brand::find($request->id);
            if ($data->count() > 0) {
                $data->update($request->all());
                return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Terjadi permasalahan pada data, coba lagi!'], 500);
        }
    }

    public function change(Request $request)
    {
        if (!empty($request->id)) {
            $data = Brand::find($request->id);
            if ($data->count() > 0) {
                $data->update(['status' => $request->value]);
                return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Terjadi permasalahan pada data, coba lagi!'], 500);
        }
    }
}