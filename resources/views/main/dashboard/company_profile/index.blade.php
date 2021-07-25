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
                                <th>Name Comapany</th>
                                <th>Bussines Type</th>
                                <th>Npwp Number</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th>Email</th>
                                <th>Telepon 1</th>
                                <th>Telepon 2</th>
                                <th>Faxy</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                                <th>Province </th>
                                <th>Regency</th>
                                <th>District</th>
                                <th>Village</th>
                                <th>Bank Name</th>
                                <th>Bank Rekening Number</th>
                                <th>Bank Owner</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Created By</th>
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
