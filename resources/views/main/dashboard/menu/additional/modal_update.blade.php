
<!-- Modal -->
<div class="modal fade" id="updateMenu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateMenuLabel">Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <form class="updateForm" data-url="/api/v1/menu/update" data-method="post">
                    <div class="form-group">
                        <label class="text-capitalize" for="section_id">section</label>
                        <select name="section_id" class="form-control" required >
                            <option value disabled selected>== Pilih Section ==</option>
                            @foreach ($section as $item)
                                <option value="{{$item->id}}">{{$item->section_name}}</option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group">
                      <label class="text-capitalize" for="menu_name">menu name</label>
                      <input type="text" name="menu_name" class="form-control" required >
                  </div>
                  <div class="form-group">
                      <label class="text-capitalize" for="menu_icon">menu icon</label>
                      <input type="text" name="menu_icon" class="form-control"  >
                  </div>
                  <div class="form-group">
                      <label class="text-capitalize" for="menu_url">menu url</label>
                      <input type="text" name="menu_url" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="text-capitalize" for="menu_desc">menu description</label>
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
