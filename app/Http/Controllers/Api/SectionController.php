<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SectionController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = Section::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $section = Section::all();
        return DataTables::of($section)
            ->addColumn('buttons', function ($section) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-default">
                            <i class="' . $section->icon_add . '"></i>
                            </button>
                            <button type="button" class="btn btn-warning updateItem" data-url="/api/v1/section/get" data-update="/api/v1/section/update" data-target="' . $section->id . '" data-modal="#updateSection">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger deleteItem" data-url="/api/v1/section/delete" data-target="' . $section->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->addColumn('status', function ($section) {
                $checked = $section->status > 0 ? 'checked' : '';
                $status = $section->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $section->id . '" data-value="' . $status . '" data-url="/api/v1/section/change" data-method="PUT"> ';
            })
            ->editColumn('created_at', function ($section) {
                return date('d-M-Y H:i', strtotime($section->created_at));
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Section::where('section_name', $request->section_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama section telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Section::create($request->all());
        return response()->json(['message' => 'Selamat, section berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Section::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, section berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Section::find($request->id);
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
            $data = Section::find($request->id);
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
