<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Form Edit Data</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Basic Layout</h5>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('Administrator/update_pengaduan')?>"  enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" value="<?php echo $pengaduan['id']; ?>">
                        <input type="hidden" name="masyarakat_id" value="<?php echo $pengaduan['masyarakat_id']; ?>">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?= $pengaduan['name']?>" />
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Isi Laporan</label>
                            <div class="col-sm-10">
                                <!-- <textarea  </textarea> -->
                                <input type="text" class="form-control" name="isi_laporan" value="<?= $pengaduan['isi_laporan']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Foto</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto" value="<?= $pengaduan['foto']?>" id="basic-default-name" />
                          </div>
                          <img src="<?php echo base_url() . './uploads/' . $pengaduan['foto']; ?>" class="mt-2" style=" margin-left:170px; width:200px; height:200px;">
                        </div>
                        
                       
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>