
<!-- Modal -->
<div class="modal fade" id="insertBranch" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="insertBranchLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertBranchLabel">Tambah Cabang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                  <form class="insertForm" data-url="/api/v1/branch/insert" data-method="post">
                    <div class="form-group">
                        <label class="text-capitalize" for="branch_name">Nama Cabang</label>
                        <input type="text" name="branch_name" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="type_id">Branch Type</label>
                          <select class="form-control" name="type_id" required="">
                              <option selected disabled="">== Select Branch Type ==</option>
                              @foreach($Branch as $type)
                              <option value="{{$type->id}}">{{$type->type_name}}</option>
                              @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="email">Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize" for="telepon">Telepon</label>
                        <input type="number" name="telepon" class="form-control" >
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
