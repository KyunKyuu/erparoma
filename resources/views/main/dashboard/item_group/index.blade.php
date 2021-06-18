@extends('template.dashboard')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Item Group</h3>
                    <div class="card-tools">
                        <a href="#" data-toggle="modal" data-target="#insertItemGroup" class="badge badge-primary p-2">Tambah
                            <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover " id="table">
                        <thead>
                            <tr>
                                <th >Group Name</th>
                                <th>Code Group</th>
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

    @include('main.dashboard.item_group.additional.modal_insert')
    @include('main.dashboard.item_group.additional.modal_update')


@endsection
