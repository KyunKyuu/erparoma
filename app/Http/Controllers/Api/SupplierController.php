<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Supplier};
use Yajra\DataTables\DataTables;
class SupplierController extends Controller
{
     //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Supplier::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $Supplier = Supplier::all();
        return DataTables::of($Supplier)
            ->addColumn('buttons', function ($Supplier) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/suppliers/get" data-update="/api/v1/suppliers/update" data-target="' . $Supplier->id . '" data-modal="#updateSupplier">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/suppliers/delete" data-target="' . $Supplier->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($Supplier) {
                return date('d-M-Y H:i', strtotime($Supplier->created_at));
            })
            ->editColumn('type_id', function ($Supplier) {
                return $Supplier->type->type_name;
            })
             ->addColumn('status', function ($Supplier) {
                $checked = $Supplier->status > 0 ? 'checked' : '';
                $status = $Supplier->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $Supplier->id . '" data-value="' . $status . '" data-url="/api/v1/suppliers/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Supplier::where('supplier_name', $request->supplier_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama type telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Supplier::create($request->all());
        return response()->json(['message' => 'Selamat, type berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Supplier::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, type berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Supplier::find($request->id);
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
            $data = Supplier::find($request->id);
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
