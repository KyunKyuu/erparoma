<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CompanyProfile};
use Yajra\DataTables\DataTables;
class CompanyProfielController extends Controller
{
      //
    public function get()
    {
        if (!empty($_GET['id'])) {
            $data = CompanyProfile::find($_GET['id']);
            if ($data->count() > 0) {
                return response()->json(['status' => 'success', 'message' => 'Data berhasil ditemukan', 'value' => $data], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan', 'value' => $data], 404);
        }
       $company = CompanyProfile::all();
        return DataTables::of($company)
            ->addColumn('buttons', function ($company) {
                return '<div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning updateItem" data-url="/api/v1/company_profiles/get" data-update="/api/v1/company_profiles/update" data-target="' . $company->id . '" data-modal="#updateCompanyProfile">
                            <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger deleteItem" data-url="/api/v1/company_profiles/delete" data-target="' . $company->id . '">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>';
            })
            ->editColumn('created_at', function ($company) {
                return date('d-M-Y H:i', strtotime($company->created_at));
            })
             ->addColumn('status', function ($company) {
                $checked = $company->status > 0 ? 'checked' : '';
                $status = $company->status > 0 ? 0 : 1;
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-id="' . $company->id . '" data-value="' . $status . '" data-url="/api/v1/company_profiles/change" data-method="PUT"> ';
            })
            ->rawColumns(['buttons', 'status'])
            ->make(true);
    }

    public function insert(Request $request)
    {

        $check = CompanyProfile::where('name', $request->name);
        if ($check->count() > 0) {
            return response()->json(['message' => 'Gagal, Nama Company telah ada. Coba lagi!', 'status' => 'error'], 500);
        }
        $poho = $request->file('photo')->store('images/company');
        $request->request->add(['created_by' => 'admin', 'photo' =>  $photo]);

        CompanyProfile::create($request->all());
        return response()->json(['message' => 'Selamat, Company berhasil ditambahkan!', 'status' => 'success'], 200);
    }

    public function delete(Request $request)
    {
        CompanyProfile::where('id', $request->id)->delete();
        return response()->json(['message' => 'Selamat, Company berhasil dihapus!', 'status' => 'success'], 200);
    }

    public function update(Request $request)
    {
        if (!empty($request->id)) {
            $data = CompanyProfile::find($request->id);
            if ($data->count() > 0) {

                 if ($request->photo) {
                    \Storage::delete($data->photo);
                    $photo = request()->file('photo')->store('images/company');
                } elseif ($data->photo) {
                    $photo = $data->photo;
                } else {
                    $photo = null;
                }

                $request->request->add(['created_by' => 'admin', 'photo' => $photo ]);
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
            $data = CompanyProfile::find($request->id);
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
