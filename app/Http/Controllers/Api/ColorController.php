<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

use Yajra\DataTables\DataTables;
class ColorController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Color::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $colors = Color::all();
        return DataTables::of($colors)
            ->addColumn('buttons', function ($colors) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/colors/get" data-update="/api/v1/colors/update" data-target="' . $colors->id . '" data-modal="#updateColor">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/colors/delete" data-target="' . $colors->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($colors) {
                return date('d-M-Y H:i', strtotime($colors->created_at));
            })
             ->addColumn('status', function ($colors) {
                $checked = $colors->status > 0 ? 'checked' : '';
                $status = $colors->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $colors->id . '" data-value="' . $status . '" data-url="/api/v1/colors/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Color::where('color_name', $request->color_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama color telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Color::create($request->all());
        return response()->json(['message' => 'Selamat, color berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Color::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, color berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Color::find($request->id);
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
            $data = Color::find($request->id);
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
