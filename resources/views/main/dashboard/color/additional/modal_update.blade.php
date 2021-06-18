<!-- Modal -->
<div class="modal fade" id="updateColor" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateColorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateColorLabel">Edit Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="updateForm" data-url="/api/v1/colors/update" data-method="post">
                        <div class="form-group">
                            <label for="color_name" class="text-capitalize">Color Name</label>
                            <input type="text" name="color_name" class="form-control" required>
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
