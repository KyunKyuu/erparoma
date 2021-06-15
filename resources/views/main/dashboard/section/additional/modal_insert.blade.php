
<!-- Modal -->
<div class="modal fade" id="insertSection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="insertSectionLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertSectionLabel">Tambah Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                  <form class="insertForm" data-url="/api/v1/section/insert" data-method="post">
                    <div class="form-group">
                        <label for="section_name">Section Name</label>
                        <input type="text" name="section_name" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="section_icon">Section Icon</label>
                        <input type="text" name="section_icon" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="section_desc">Section Description</label>
                        <textarea type="text" name="section_desc" class="form-control" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Understood</button>
            </form>
        </div>
      </div>
    </div>
  </div>
