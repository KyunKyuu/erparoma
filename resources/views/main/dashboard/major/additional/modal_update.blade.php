<!-- Modal -->
<div class="modal fade" id="updateMajor" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateMajorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMajorLabel">Edit Major</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form class="updateForm" data-url="/api/v1/major/update" data-method="post">
                        <div class="form-group">
                            <label for="major_name" class="text-capitalize">major Name</label>
                            <input type="text" name="major_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="major_icon" class="text-capitalize">major Icon</label>
                            <input type="text" name="major_icon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="major_desc" class="text-capitalize">major Description</label>
                            <textarea type="text" name="major_desc" class="form-control"></textarea>
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