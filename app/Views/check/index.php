

<!-- /section -->
<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-8 col-xl-8 col-xxl-8 mx-auto mt-n20">
        <div class="card">
          <div class="card-body p-5" style="min-height: 300px;">

              <p>Masukkan <strong>Nomor/Kode Pendaftaran</strong> Anda untuk memeriksa Status Pendaftaran.</p>

              <?php echo form_open(base_url('check')); ?>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="kode_pendaftaran" placeholder="Nomor/Kode Pendaftaran" aria-label="Nomor/Kode Pendaftaran" aria-describedby="button-addon2" value="<?php if(isset($_POST['submit'])) { 
                $kode_calon_peserta_didik   = strip_tags(strtoupper($_POST['kode_pendaftaran'])); echo $kode_calon_peserta_didik; } ?>">
                  <button class="btn btn-info text-white" name="submit" type="submit" id="button-addon2">
                    <i class="fa fa-search"></i>&nbsp; Lihat Status Pendaftaran
                  </button>
                </div>
              <?php echo form_close();
              if(isset($_POST['submit'])) { 
                $kode_calon_peserta_didik   = strip_tags(strtoupper($_POST['kode_pendaftaran']));
                $calon_peserta_didik = $m_calon_peserta_didik->kode_calon_peserta_didik($kode_calon_peserta_didik);
                if($calon_peserta_didik) {
                ?>
                <div class="alert alert-info text-center">Berikut adalah data pendaftaran Anda:</div>
                <div class="table-responsive"><table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th width="25%">Nama</th>
                      <th><?php echo $calon_peserta_didik->nama_calon_peserta_didik ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="font-bold">Jenis Kelamin</td>
                      <td><?php if($calon_peserta_didik->jenis_kelamin=='L') { echo 'Laki-laki'; }else{ echo 'Perempuan'; } ?></td>
                    </tr>
                    <tr>
                      <td class="font-bold">Tempat, tanggal lahir</td>
                      <td><?php echo $calon_peserta_didik->tempat_lahir ?>, <?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?></td>
                    </tr>
                    <tr>
                      <td class="font-bold">Status Pendaftaran</td>
                      <td>
                          <?php if($calon_peserta_didik->status_pendaftaran=='Menunggu') { ?>
                            <div class="btn btn-warning"><i class="fa fa-clock"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></div>
                          <?php }elseif($calon_peserta_didik->status_pendaftaran=='Diterima') { ?>
                            <div class="btn btn-success"><i class="fa fa-check-circle"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></div>
                          <?php }elseif($calon_peserta_didik->status_pendaftaran=='Tidak-Diterima') { ?>
                            <div class="btn btn-danger"><i class="fa fa-times-circle"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></div>
                          <?php }else{ ?>
                            <div class="btn btn-info"><i class="fa fa-tasks"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></div>
                          <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                </table></div>

                <p class="text-right">
                <a href="<?php echo base_url('pendaftaran/cetak/'.$calon_peserta_didik->slug_calon_peserta_didik) ?>" class="btn btn-danger btn-sm w-100" target="_blank">
                  <i class="fa fa-file-pdf"></i>&nbsp;Cetak Bukti Pendaftaran
                </a>
              </p>
              
              <?php } else { ?>
                <div class="alert alert-warning">Mohon maaf, data pendaftaran tidak ditemukan</div>
              <?php }
              } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

