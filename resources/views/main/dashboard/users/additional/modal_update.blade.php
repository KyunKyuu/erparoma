
<!-- Modal -->
<div class="modal fade" id="updateSection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateSectionLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateSectionLabel">Edit Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                  <form class="updateForm">
                    <div class="form-group">
                        <label for="section_name">Section Name</label>
                        <input type="text" name="section_name" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="section_icon">Section Icon</label>
                        <input type="text" name="icon_add" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="section_desc">Section Description</label>
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
