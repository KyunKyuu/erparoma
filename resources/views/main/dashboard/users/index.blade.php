@extends('template.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data User</h3>
                    <div class="card-tools">
                        <a href="#" data-toggle="modal" data-target="#insertUser" class="badge badge-primary p-2">Tambah <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover " id="table">
                        <thead>
                            <tr>
                                <th style="width:10%">User</th>
                                <th>Status</th>
                                <th>Createds By</th>
                                <th>Description</th>
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

    @include('main.dashboard.users.additional.modal_insert')
    @include('main.dashboard.users.additional.modal_update')


@endsection
