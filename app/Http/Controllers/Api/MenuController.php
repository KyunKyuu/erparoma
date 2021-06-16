<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    //
    public function get()
    {
        if (!empty($_GET['id'])) {
            if ($_GET['id'] == 'all') {
                $data = Menu::all();
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            $data = Menu::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addColumn('buttons', function ($menu) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default">
                            <i class="' . $menu->menu_icon . '"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/menu/get" data-update="/api/v1/menu/update" data-target="' . $menu->id . '" data-modal="#updateMenu">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/menu/delete" data-target="' . $menu->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->addColumn('status', function ($menu) {
                $checked = $menu->status > 0 ? 'checked' : '';
                $status = $menu->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $menu->id . '" data-value="' . $status . '" data-url="/api/v1/menu/change" data-method="PUT"> ';
            })
            ->editColumn('created_at', function ($menu) {
                return date('d-M-Y H:i', strtotime($menu->created_at));
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = Menu::where('menu_name', $request->menu_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama menu telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        Menu::create($request->all());
        return response()->json(['message' => 'Selamat, menu berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        Menu::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, menu berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = Menu::find($request->id);
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
            $data = Menu::find($request->id);
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
