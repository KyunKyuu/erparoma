<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DivisionController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Division::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $division = Division::all();
        return DataTables::of($division)
            ->addColumn('buttons', function ($division) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/divisions/get" data-update="/api/v1/divisions/update" data-target="' . $division->id . '" data-modal="#updateDivision">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/divisions/delete" data-target="' . $division->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($division) {
                return date('d-M-Y H:i', strtotime($division->created_at));
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Division::where('division_name', $request->division_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama division telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Division::create($request->all());
        return response()->json(['message' => 'Selamat, division berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Division::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, division berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Division::find($request->id);
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
            $data = Division::find($request->id);
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
