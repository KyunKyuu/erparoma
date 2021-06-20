@extends('template.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Employee</h3>
                    <div class="card-tools">
                        <a href="#" data-toggle="modal" data-target="#insertEmployee" class="badge badge-primary p-2">Tambah
                            <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover " id="table">
                        <thead>
                            <tr>
                                <th style="width:10%">Nama</th>
                                <th>Foto</th>
                                <th>Religion</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Cabang</th>
                                <th>Divisi</th>
                                <th>Status</th>
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

    @include('main.dashboard.employee.additional.modal_insert')
    @include('main.dashboard.employee.additional.modal_update')


@endsection
