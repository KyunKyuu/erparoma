<!-- Modal -->
<div class="modal fade" id="insertSupplier" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="insertSupplierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertSupplierLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="insertForm" data-url="/api/v1/suppliers/insert" data-method="post">
                        <div class="form-group">
                            <label for="supplier_name" class="text-capitalize">Supplier Name</label>
                            <input type="text" name="supplier_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="text-capitalize">Supplier Type</label>
                            <select class="form-control" name="type_id" required="">
                              <option selected disabled="">== Select Supplier Type ==</option>
                              @foreach($supplierTypes as $type)
                              <option value="{{$type->id}}">{{$type->type_name}}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address" class="text-capitalize">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telepon" class="text-capitalize">Telepon</label>
                            <input type="text" name="telepon" class="form-control" required>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
