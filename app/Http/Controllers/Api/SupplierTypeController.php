<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SupplierType};
use Yajra\DataTables\DataTables;
class SupplierTypeController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = SupplierType::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $SupplierType = SupplierType::all();
        return DataTables::of($SupplierType)
            ->addColumn('buttons', function ($SupplierType) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/supplier_types/get" data-update="/api/v1/supplier_types/update" data-target="' . $SupplierType->id . '" data-modal="#updateSupplierType">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/supplier_types/delete" data-target="' . $SupplierType->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($SupplierType) {
                return date('d-M-Y H:i', strtotime($SupplierType->created_at));
            })
             ->addColumn('status', function ($SupplierType) {
                $checked = $SupplierType->status > 0 ? 'checked' : '';
                $status = $SupplierType->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $SupplierType->id . '" data-value="' . $status . '" data-url="/api/v1/supplier_types/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = SupplierType::where('type_name', $request->type_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama type telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        SupplierType::create($request->all());
        return response()->json(['message' => 'Selamat, type berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        SupplierType::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, type berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = SupplierType::find($request->id);
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
            $data = SupplierType::find($request->id);
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
