<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemGroup;

use Yajra\DataTables\DataTables;
class ItemGroupController extends Controller
{
   //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = ItemGroup::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
        $item = ItemGroup::all();
        return DataTables::of($item)
            ->addColumn('buttons', function ($item) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/item_groups/get" data-update="/api/v1/item_groups/update" data-target="' . $item->id . '" data-modal="#updateItemGroup">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/item_groups/delete" data-target="' . $item->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($item) {
                return date('d-M-Y H:i', strtotime($item->created_at));
            })
             ->addColumn('status', function ($item) {
                $checked = $item->status > 0 ? 'checked' : '';
                $status = $item->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $item->id . '" data-value="' . $status . '" data-url="/api/v1/item_groups/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {
        $check = ItemGroup::where('group_name', $request->group_name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama group telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $request->request->add(['created_by' => 'admin']);
        ItemGroup::create($request->all());
        return response()->json(['message' => 'Selamat, group berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        ItemGroup::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, group berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = ItemGroup::find($request->id);
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
            $data = ItemGroup::find($request->id);
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
