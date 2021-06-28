@extends('template.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Company Profile</h3>
                    <div class="card-tools">
                        <a href="#" data-toggle="modal" data-target="#insertCompanyProfile" class="badge badge-primary p-2">Tambah
                            <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Division</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

   
 @include('main.dashboard.company_profile.additional.modal_insert')
 @include('main.dashboard.company_profile.additional.modal_update')

@endsection
