<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header bg-light">
        DETAIL Calon Peserta Didik
      </div>
      <div class="card-body">
        <?php include('selesai.php') ?>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header bg-light">
        UNGGAH DOKUMEN PENDUKUNG
      </div>
      <div class="card-body">

        <table class="tabelku table-sm mb-3">
          <thead>
            <tr>
              <th width="25%">Kode Pendaftaran</th>
              <th><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Status Pendaftaran</td>
              <td>
                <?php if ($calon_peserta_didik->status_pendaftaran == 'Menunggu') { ?>
                  <span class="badge badge-warning"><i class="fa fa-clock"></i>&nbsp;Menunggu</span>
                <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Diterima-Tahap-1') { ?>
                  <span class="badge badge-success"><i class="fa fa-check-circle"></i>&nbsp;Diterima Tahap 1</span>
                <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Tidak-Diterima') { ?>
                  <span class="badge badge-danger"><i class="fa fa-times-circle"></i>&nbsp;Tidak Diterima</span>
                <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Lulus') { ?>
                  <span class="badge badge-primary"><i class="fa fa-graduation-cap"></i>&nbsp;Lulus</span>
                <?php } else { ?>
                  <span class="badge badge-info"><i class="fa fa-tasks"></i>&nbsp;Diperiksa</span>
                <?php } ?>
              </td>
            </tr>
          </tbody>
        </table>

        <p class="text-muted mb-3">Isi semua file berkas terlebih dahulu, lalu klik <strong>"Unggah Semua
            Dokumen"</strong> di bagian bawah.</p>

        <?php
        $validation = \Config\Services::validation();
        $errors = $validation->getErrors();
        if (!empty($errors)) {
          echo '<span class="text-danger">' . $validation->listErrors() . '</span>';
        }
        if (session('sukses')):
          ?>
          <div class="alert alert-success alert-dismissible">
            <?= session('sukses') ?>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          </div>
        <?php endif ?>
        <?php if (session('warning')): ?>
          <div class="alert alert-warning alert-dismissible">
            <?= session('warning') ?>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          </div>
        <?php endif ?>

        <?php
        echo form_open_multipart(base_url('admin/gelombang/dokumen_batch/' . $calon_peserta_didik->slug_calon_peserta_didik));
        echo csrf_field();
        ?>

        <table class="table tabelku table-sm table-bordered">
          <thead>
            <tr class="bg-light">
              <th width="5%" class="text-center">No</th>
              <th width="35%" class="text-left">Nama Dokumen</th>
              <th width="15%" class="text-center">Wajib</th>
              <th width="15%" class="text-center">Status</th>
              <th class="text-center">Pilih File</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id_calon_peserta_didik = $calon_peserta_didik->id_calon_peserta_didik;
            $no = 1;
            $data_total = 1;
            $has_pending = false;
            foreach ($jenis_dokumen as $jd) {
              $id_jenis_dokumen = $jd->id_jenis_dokumen;
              $check_dokumen = $m_dokumen->check($id_calon_peserta_didik, $id_jenis_dokumen);
              if ($jd->status_jenis_dokumen == 'Wajib') {
                $data_id = $check_dokumen ? 1 : 0;
              } else {
                $data_id = 1;
              }
              $data_total += $data_id;
              ?>
              <tr>
                <td class="text-center"><?php echo $no ?></td>
                <td>
                  <?php echo $jd->nama_jenis_dokumen ?>
                  <small class="d-block text-muted"><?php echo $jd->keterangan ?></small>
                </td>
                <td class="text-center">
                  <?php if ($jd->status_jenis_dokumen == 'Wajib') { ?>
                    <span class="badge bg-danger text-white">Wajib</span>
                  <?php } else { ?>
                    <span class="badge bg-secondary">Opsional</span>
                  <?php } ?>
                </td>
                <td class="text-center">
                  <?php if ($check_dokumen) { ?>
                    <span class="badge bg-success text-white">
                      <i class="fa fa-check-circle"></i> Sudah
                    </span>
                    <div class="mt-1">
                      <button type="button" class="btn btn-outline-info btn-xs" data-toggle="modal"
                        data-target="#modal-<?php echo $jd->id_jenis_dokumen ?>">
                        <i class="fa fa-eye"></i>
                      </button>
                      <a class="btn btn-outline-dark btn-xs"
                        href="<?php echo base_url('admin/gelombang/unduh/' . $check_dokumen->kode_dokumen . '/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
                        target="_blank"><i class="fa fa-download"></i></a>
                      <a class="btn btn-outline-danger btn-xs delete-link"
                        href="<?php echo base_url('admin/gelombang/hapus/' . $check_dokumen->kode_dokumen . '/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
                        onclick="return confirm('Yakin ingin menghapus dokumen ini?')">
                        <i class="fa fa-trash"></i></a>
                    </div>
                    <?php include('lihat.php'); ?>
                  <?php } else { ?>
                    <span class="badge bg-warning text-dark">
                      <i class="fa fa-times-circle"></i> Belum
                    </span>
                  <?php } ?>
                </td>
                <td>
                  <?php if (!$check_dokumen) {
                    $has_pending = true;
                    ?>
                    <input type="file" name="dokumen[<?php echo $id_jenis_dokumen ?>]" class="form-control form-control-sm"
                      accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
                  <?php } else { ?>
                    <span class="text-success"><i class="fa fa-check"></i> Terunggah</span>
                  <?php } ?>
                </td>
              </tr>
              <?php $no++;
            } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5" class="text-right pt-3">
                <?php if ($has_pending) { ?>
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-upload"></i>&nbsp; Unggah Semua Dokumen
                  </button>
                <?php } ?>
              </td>
            </tr>
          </tfoot>
        </table>

        <?php echo form_close(); ?>

        <div class="mt-4 p-3 bg-light border rounded">
          <h5 class="mb-3">Update Status PPDB</h5>
          <?php echo form_open(base_url('admin/gelombang/dokumen/' . $calon_peserta_didik->slug_calon_peserta_didik)) ?>
          <div class="row">
            <div class="col-md-8">
              <select name="status_pendaftaran" class="form-control" required>
                <option value="Menunggu" <?php echo ($calon_peserta_didik->status_pendaftaran == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                <option value="Diterima-Tahap-1" <?php echo ($calon_peserta_didik->status_pendaftaran == 'Diterima-Tahap-1') ? 'selected' : ''; ?>>Diterima Tahap 1
                </option>
                <option value="Tidak-Diterima" <?php echo ($calon_peserta_didik->status_pendaftaran == 'Tidak-Diterima') ? 'selected' : ''; ?>>Tidak Diterima</option>
                <option value="Diperiksa" <?php echo ($calon_peserta_didik->status_pendaftaran == 'Diperiksa') ? 'selected' : ''; ?>>Diperiksa</option>
                <option value="Lulus" <?php echo ($calon_peserta_didik->status_pendaftaran == 'Lulus') ? 'selected' : ''; ?>>Lulus</option>
              </select>
            </div>
            <div class="col-md-4">
              <?php if ($no == $data_total) { ?>
                <button type="submit" class="btn btn-primary btn-block" name="status" value="update">
                  <i class="fa fa-save"></i> Update Status
                </button>
              <?php } else { ?>
                <div class="alert alert-info py-2 mb-0" style="font-size: 0.85rem;">
                  <i class="fa fa-info-circle"></i> Dokumen wajib belum lengkap.
                </div>
              <?php } ?>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>

      </div>
    </div>
  </div>
</div>