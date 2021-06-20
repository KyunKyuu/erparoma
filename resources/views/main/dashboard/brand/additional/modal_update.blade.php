<!-- Modal -->
<div class="modal fade" id="updateBrand" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateBrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBrandLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="updateForm" data-url="/api/v1/brand/update" data-method="post">
                        <div class="form-group">
                            <label for="merk_name" class="text-capitalize">Merk Name</label>
                            <input type="text" name="merk_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="code" class="text-capitalize">Code</label>
                            <input type="text" name="code" class="form-control" required>
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
