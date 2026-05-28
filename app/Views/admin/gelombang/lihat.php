<!-- Modal Lihat Dokumen -->
<div class="modal fade" id="modal-<?php echo $jd->id_jenis_dokumen ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $jd->nama_jenis_dokumen ?></h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <?php
        $ext = strtolower(pathinfo($check_dokumen->gambar, PATHINFO_EXTENSION));
        $file_url = base_url('assets/upload/pendaftaran/' . $check_dokumen->gambar);
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) { ?>
          <img src="<?php echo $file_url ?>" class="img-fluid" alt="<?php echo $jd->nama_jenis_dokumen ?>">
        <?php } elseif ($ext == 'pdf') { ?>
          <embed src="<?php echo $file_url ?>" type="application/pdf" width="100%" height="500px">
        <?php } else { ?>
          <div class="alert alert-info">
            <i class="fa fa-file"></i>&nbsp;
            File: <strong><?php echo $check_dokumen->gambar ?></strong>
            <br><small>Preview tidak tersedia untuk tipe file ini. Silakan unduh file.</small>
          </div>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <a class="btn btn-dark btn-sm"
          href="<?php echo base_url('admin/gelombang/unduh/' . $check_dokumen->kode_dokumen . '/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
          target="_blank"><i class="fa fa-download"></i> Unduh</a>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
