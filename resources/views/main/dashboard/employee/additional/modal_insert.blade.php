<!-- Modal -->
<div class="modal fade" id="insertEmployee" data-backdrop="static" data-keyboard="false"
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
                    <form class="insertForm text-capitalize" data-url="/api/v1/employee/insert" data-method="post">
                        <div class="form-group row">
                            <div class="col">
                                <label for="full_name" class="text-capitalize">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="short_name" class="text-capitalize">Nama Panggilan</label>
                                <input type="text" name="short_name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="photo" class="text-capitalize">Foto</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="address" class="text-capitalize">Alamat</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="col">
                                <label for="email" class="text-capitalize">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col">
                                <label for="telepon" class="text-capitalize">Telepon</label>
                                <input type="text" name="telepon" class="form-control is-number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="major_id" class="text-capitalize">Jabatan</label>
                                <select name="major_id" id="major_id" class="form-control">
                                </select>
                            </div>
                            <div class="col">
                                <label for="division_id" class="text-capitalize">Divisi</label>
                                <select name="division_id" id="division_id" class="form-control">
                                </select>
                            </div>
                            <div class="col">
                                <label for="branch_id" class="text-capitalize">Cabang</label>
                                <select name="branch_id" id="branch_id" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="clasification_id" class="text-capitalize">Klasifikasi</label>
                                <select name="clasification_id" id="clasification_id" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="text-center" id="tampil-data">
                            <a href="#" id="personal-klik">Tampilkan data pribadi</a>
                        </div>


                        {{-- Data Pribadi --}}
                        <div id="personal-data" style="display: none">
                            <div class="form-group row">
                                <div class="col">
                                    <label for="birth_place" class="text-capitalize">Tempat Lahir</label>
                                    <input type="text" name="birth_place" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="birth" class="text-capitalize">Tanggal Lahir</label>
                                    <input type="date" name="birth" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="birth" class="text-capitalize">Status Menikah</label>
                                    <select name="status_married_id" id="status_married_id" class="form-control">
                                        <option value="1">Menikah</option>
                                        <option value="0">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="postal_code" class="text-capitalize">Kode Pos</label>
                                    <input type="text" name="postal_code" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="country" class="text-capitalize">Kebangsaan</label>
                                    <input type="country" name="country" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="province_id" class="text-capitalize">Provinsi</label>
                                    <select name="province_id" id="province_id" class="form-control">
                                        <option value selected disabled>== pilih provinsi ==</option>
                                        @foreach ($provincies as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="regency_id" class="text-capitalize">Kota</label>
                                    <select name="regency_id" id="regency_id" class="form-control" disabled>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="district_id" class="text-capitalize">Kecamatan/Desa</label>
                                    <select name="district_id" id="district_id" class="form-control" disabled>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="village_id" class="text-capitalize">Kelurahan</label>
                                    <select name="village_id" id="village_id" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="bank_name" class="text-capitalize">Nama Bank</label>
                                    <input type="text" name="bank_name" class="form-control" id="bank_name">
                                </div>
                                <div class="col">
                                    <label for="bank_rekening_number" class="text-capitalize">Nomor Rekening</label>
                                    <input type="number" name="bank_rekening_number" id="bank_rekening_number"
                                        class="form-control">
                                </div>
                                <div class="col">
                                    <label for="bank_owner" class="text-capitalize">Nama Pemilik</label>
                                    <input type="text" name="bank_owner" id="bank_owner" class="form-control">
                                </div>
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
