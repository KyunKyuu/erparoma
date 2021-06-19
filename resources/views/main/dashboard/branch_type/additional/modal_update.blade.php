<!-- Modal -->
<div class="modal fade" id="updateBranchType" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateBranchTypeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBranchTypeLabel">Edit Tipe Cabang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="updateForm" data-url="/api/v1/branch_type/update" data-method="post">
                        <div class="form-group">
                            <label for="type_name" class="text-capitalize">Nama Tipe</label>
                            <input type="text" name="type_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="text-capitalize" for="branch_type_desc">Deskripsi Cabang</label>
                            <textarea type="text" name="description" class="form-control" ></textarea>
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
