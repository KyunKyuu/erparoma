<!-- Modal -->
<div class="modal fade" id="insertCompanyProfile" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="insertCompanyProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertCompanyProfileLabel">Tambah Company Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                <form class="insertForm" data-url="/api/v1/company_profiles/insert" data-method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Photo Company</label>
                           
                                <input type="file" class="form-control image-input-preview" data-id="image-preview"  name="photo" required="">
                                <div class="invalid-feedback">
                                    What's Image Company?
                                </div>
                           
                        </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="text-capitalize">Company Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bussines_type" class="text-capitalize">Bussines Type</label>
                            <input type="text" name="bussines_type" class="form-control" required>
                        </div>
                    </div>

                     <div class="row">
                        <div class="form-group col-md-6">
                            <label for="npwp_number" class="text-capitalize">NPWP Number</label>
                            <input type="text" name="npwp_number" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="text-capitalize">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telepon_1" class="text-capitalize">Telepon 1</label>
                            <input type="number" name="telepon_1" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telepon_2" class="text-capitalize">Telepon 2</label>
                            <input type="number" name="telepon_2" class="form-control" required>
                        </div>
                    </div>

                     <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fax" class="text-capitalize">Fax</label>
                            <input type="text" name="fax" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal_code" class="text-capitalize">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" required>
                        </div>
                    </div>

                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="address_1" class="text-capitalize">Address 1</label>
                            <input type="text" name="address_1" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_2" class="text-capitalize">Address 2</label>
                            <input type="text" name="address_2" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="country" class="text-capitalize">Counrty</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label class="text-capitalize">Province</label>
                           <select class="form-control" name="province_id"  required>
                              <option selected disabled="">Choose Province</option>
                              @foreach($Provincies as $province)
                              <option value="{{$province->id}}">{{$province->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row">
                         <div class="form-group col-md-6">
                          <label class="text-capitalize">Regency</label>
                           <select class="form-control" name="regency_id"  required>
                              <option selected disabled="">Choose Regency</option>
                              @foreach($Regencies as $regency)
                              <option value="{{$regency->id}}">{{$regency->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label class="text-capitalize">Disctrict</label>
                           <select class="form-control" name="district_id"  required>
                              <option selected disabled="">Choose Disctrict</option>
                              @foreach($Districts as $disctirct)
                              <option value="{{$disctirct->id}}">{{$disctirct->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                     <div class="row">
                         <div class="form-group col-md-6">
                          <label class="text-capitalize">Village</label>
                           <select class="form-control" name="village_id"  required>
                              <option selected disabled="">Choose Village</option>
                              @foreach($Villages as $village)
                              <option value="{{$village->id}}">{{$village->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country" class="text-capitalize">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" required>
                        </div>
                    </div>


                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="address_1" class="text-capitalize">Bank Rekening Number</label>
                            <input type="text" name="bank_rekening_number" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_2" class="text-capitalize">Bank Owner</label>
                            <input type="text" name="bank_owner" class="form-control" required>
                        </div>
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
