<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MajorController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Major::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $major = Major::all();
        return DataTables::of($major)
            ->addColumn('buttons', function ($major) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-warning updateItem" data-url="/api/v1/majors/get" data-update="/api/v1/majors/update" data-target="' . $major->id . '" data-modal="#updateMajor">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger deleteItem" data-url="/api/v1/majors/delete" data-target="' . $major->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($major) {
                return date('d-M-Y H:i', strtotime($major->created_at));
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Major::where('major_name', $request->major_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama major telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Major::create($request->all());
        return response()->json(['message' => 'Selamat, major berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Major::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, major berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Major::find($request->id);
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
            $data = Major::find($request->id);
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
