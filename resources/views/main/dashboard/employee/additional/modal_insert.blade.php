<!-- Modal -->
<div class="modal fade" id="insertEmployee" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="insertEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertEmployeeLabel">Tambah Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="insertForm" data-url="/api/v1/employee/insert" data-method="post">
                        <div class="form-group">
                            <label for="division_name" class="text-capitalize">employee Name</label>
                            <input type="text" name="division_name" class="form-control" required>
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
