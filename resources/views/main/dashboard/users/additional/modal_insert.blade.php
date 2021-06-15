
<!-- Modal -->
<div class="modal fade" id="insertUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="insertUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertUserLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                  <form class="insertForm" data-url="/api/v1/user/insert" data-method="post">
                    <div class="form-group">
                        <label class="text-capitalize" for="user_name">user Name</label>
                        <input type="text" name="user_name" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="user_icon">user Icon</label>
                        <input type="text" name="user_icon" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="user_desc">user Description</label>
                        <textarea type="text" name="user_desc" class="form-control" ></textarea>
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
