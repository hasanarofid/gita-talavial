      <!-- Edit User Modal -->
      <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="mb-2">Tambah data pelaporan</h3>
                <p class="text-muted">Inputkan data pelaporan anda</p>
              </div>
              <form id="add_laporan" class="row g-3"  action="{{ route('pengawas.pelaporan.save-pelaporan') }}" method="POST" >
                @csrf
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basic-default-name">Sekolah Binaaan</label>
                      <select
                            id="id_sekolah"
                            name="id_sekolah"
                            class="select2 form-select"
                            required
                            >
                            <option value="">Select</option>
                            @foreach ($binaan as $item)
                                <option value="{{ $item->id_sekolah }}">{{ $item->sekolah->nama_sekolah }}</option>
                            @endforeach
                          </select>
                          
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basic-default-name">Nama Kegiatan</label>
                      <select
                            id="id_tugas"
                            name="id_tugas"
                            class="select2 form-select"
                            required
                            >
                            <option value="">Select</option>
                            @foreach ($kegiatan as $item)
                                <option value="{{ $item->id }}">{{ $item->tugas->kegiatan }}</option>
                            @endforeach
                          </select>
                          
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basic-default-name">Kategori</label>
                    <select
                          id="kategori"
                          name="kategori"
                          class="select2 form-select"
                          required
                          >
                          <option value="">Select</option>
                          @foreach ($kategory as $item)
                              <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basic-default-name">Sub Kategori</label>
                    <select
                          id="sub_kategori"
                          name="sub_kategori"
                          class="select2 form-select"
                          
                          >
                          <option value="">Select</option>
                          
                        </select>
                </div>
               

                <div class="col-12 ">
                    <div class="form-group row mb-2">
                        <label class="form-label ">Sasaran Laporan</label>
                        <div class="col-md-4">
                            <select name="sasaran" id="sasaran" class="form-select valid" required="required" style="width:100%" aria-invalid="false"> 
                                <option value="">Pilih Jenis Sasaran</option>
                                <option value="sekolah">Sekolah</option>
                                <option value="sekolah">Kepala Sekolah</option>
                                <option value="sekolah">Guru</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="objek" id="objek" class="form-select"  style="width:100%"><option value="">Pilih Objek Sasaran</option> 197503212001121002</select>
                        </div>
                        <label class="form-label col-md-1 text-right">Tanggal</label>
                        <div class="col-md-4">
                            <input id="tgl_pendampingan" name="tgl_pendampingan" type="date" class="form-control" required >
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label" for="judul">Judul Laporan</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                  </div>

                <div class="col-12">
                  <label class="form-label" for="modalEditUserName">Deskripsi Permasalahan</label>
                  <div id="deskripsi_permasalahan"></div>
                  <textarea name="deskripsi_permasalahan_hidden" style="display:none;"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label" for="uraian">Uraian</label>
                    <div id="uraian">
                    </div>
                    <textarea name="uraian_hidden" style="display:none;"></textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="catatan_evaluasi">Catatan Evaluasi</label>
                    <div id="catatan_evaluasi">
                      
                    </div>
                    <textarea name="catatan_hidden" style="display:none;"></textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="modalEditUserName">Saran dan Rekomendasi</label>
                    <div id="saran_rekomendasi">
                      
                    </div>
                    <textarea name="saran_hidden" style="display:none;"></textarea>
                  </div>

                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button
                    type="reset"
                    class="btn btn-label-secondary"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Edit User Modal -->

