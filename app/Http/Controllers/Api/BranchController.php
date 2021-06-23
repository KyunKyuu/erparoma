<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Branch::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $branch = Branch::all();
        return DataTables::of($branch)
            ->addColumn('buttons', function ($branch) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/branch/get" data-update="/api/v1/branch/update" data-target="' . $branch->id . '" data-modal="#updateBranch">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/branch/delete" data-target="' . $branch->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($branch) {
                return date('d-M-Y H:i', strtotime($branch->created_at));
            })
            ->editColumn('type_id', function ($branch) {
                return $branch->branch->type_name;
            })
            ->addColumn('status', function ($branch) {
                $checked = $branch->status > 0 ? 'checked' : '';
                $status = $branch->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $branch->id . '" data-value="' . $status . '" data-url="/api/v1/branch/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Branch::where('branch_name', $request->branch_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama branch telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Branch::create($request->all());
        return response()->json(['message' => 'Selamat, branch berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Branch::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, branch berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Branch::find($request->id);
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
            $data = Branch::find($request->id);
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