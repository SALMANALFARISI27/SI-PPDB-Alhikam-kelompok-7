<div class="row">
  <div class="col-md-5">
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-user"></i> DATA DASAR CALON PESERTA DIDIK
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Nama</td>
              <td><?php echo strtoupper($calon_peserta_didik->nama_calon_peserta_didik) ?></td>
            </tr>
            <tr>
              <td class="font-bold">NIS / NISN</td>
              <td><?php echo $calon_peserta_didik->nis ?> / <?php echo $calon_peserta_didik->nisn ?></td>
            </tr>
            <tr>
              <td class="font-bold">L/P</td>
              <td><?php echo ($calon_peserta_didik->jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
            </tr>
            <tr>
              <td class="font-bold">Agama</td>
              <td><?php echo $calon_peserta_didik->agama ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">TTL</td>
              <td><?php echo $calon_peserta_didik->tempat_lahir ?>, <?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?></td>
            </tr>
            <tr>
              <td class="font-bold">Alamat</td>
              <td><?php echo nl2br($calon_peserta_didik->alamat) ?></td>
            </tr>
            <tr>
              <td class="font-bold">Kode Pos</td>
              <td><?php echo $calon_peserta_didik->kode_pos ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Telepon</td>
              <td><?php echo $calon_peserta_didik->telepon ?></td>
            </tr>
            <tr>
              <td class="font-bold">Email</td>
              <td><?php echo $calon_peserta_didik->email ?></td>
            </tr>
            <tr>
              <td class="font-bold">Kewarganegaraan</td>
              <td><?php echo $calon_peserta_didik->status_wn ?? 'WNI' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Kode Pendaftaran</td>
              <td><strong><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></strong></td>
            </tr>
            <tr>
              <td class="font-bold">Periode</td>
              <td><?php echo $calon_peserta_didik->judul ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Tahun Ajaran</td>
              <td><?php echo $calon_peserta_didik->tahun_ajaran ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Program/Jenjang</td>
              <td><?php echo $calon_peserta_didik->judul_jenjang_pendidikan ?? '-' ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DATA PENERIMAAN -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-school"></i> DATA PENERIMAAN DI SEKOLAH
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Jenis Masuk</td>
              <td><?php echo $calon_peserta_didik->jenis_calon_peserta_didik ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Asal Sekolah</td>
              <td><?php echo $calon_peserta_didik->asal_sekolah ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Alamat Sekolah Asal</td>
              <td><?php echo $calon_peserta_didik->alamat_sekolah_asal ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Tanggal Pindah</td>
              <td><?php echo $calon_peserta_didik->tanggal_pindah ?? '-' ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DATA KESEHATAN -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-heartbeat"></i> DATA KESEHATAN & INFORMASI LAINNYA
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Golongan Darah</td>
              <td><?php echo $calon_peserta_didik->goldar_calon_peserta_didik ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Tinggi Badan</td>
              <td><?php echo $calon_peserta_didik->tinggi ?? '-' ?> cm</td>
            </tr>
            <tr>
              <td class="font-bold">Berat Badan</td>
              <td><?php echo $calon_peserta_didik->berat ?? '-' ?> kg</td>
            </tr>
            <tr>
              <td class="font-bold">Penyakit</td>
              <td><?php echo $calon_peserta_didik->penyakit_calon_peserta_didik ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Hobi</td>
              <td><?php echo $calon_peserta_didik->hobi_calon_peserta_didik ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Berkebutuhan Khusus</td>
              <td><?php echo $calon_peserta_didik->berkebutuhan_khusus ?? 'Tidak' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Anak ke</td>
              <td><?php echo $calon_peserta_didik->anak_ke ?? '-' ?> dari <?php echo $calon_peserta_didik->jumlah_saudara ?? '-' ?> Saudara</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DATA AYAH -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-male"></i> DATA ORANG TUA - AYAH
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Nama Ayah</td>
              <td><?php echo $calon_peserta_didik->nama_ayah ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Agama</td>
              <td><?php echo $calon_peserta_didik->agama_ayah ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pekerjaan</td>
              <td><?php echo $calon_peserta_didik->pekerjaan_ayah ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pendidikan</td>
              <td><?php echo $calon_peserta_didik->jenjang_ayah ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Alamat</td>
              <td><?php echo nl2br($calon_peserta_didik->alamat_ayah ?? '-') ?></td>
            </tr>
            <tr>
              <td class="font-bold">Telepon</td>
              <td><?php echo $calon_peserta_didik->telepon_ayah ?? '-' ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DATA IBU -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-female"></i> DATA ORANG TUA - IBU
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Nama Ibu</td>
              <td><?php echo $calon_peserta_didik->nama_ibu ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Agama</td>
              <td><?php echo $calon_peserta_didik->agama_ibu ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pekerjaan</td>
              <td><?php echo $calon_peserta_didik->pekerjaan_ibu ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pendidikan</td>
              <td><?php echo $calon_peserta_didik->jenjang_ibu ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Alamat</td>
              <td><?php echo nl2br($calon_peserta_didik->alamat_ibu ?? '-') ?></td>
            </tr>
            <tr>
              <td class="font-bold">Telepon</td>
              <td><?php echo $calon_peserta_didik->telepon_ibu ?? '-' ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DATA WALI -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-user-shield"></i> DATA WALI MURID
      </div>
      <div class="card-body p-2">
        <table class="tabelku table-sm table table-bordered">
          <tbody>
            <tr>
              <td class="font-bold" width="35%">Identitas Wali</td>
              <td><?php echo $calon_peserta_didik->identitas_wali ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Nama Wali</td>
              <td><?php echo $calon_peserta_didik->nama_wali ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Agama</td>
              <td><?php echo $calon_peserta_didik->agama_wali ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pekerjaan</td>
              <td><?php echo $calon_peserta_didik->pekerjaan_wali ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Pendidikan</td>
              <td><?php echo $calon_peserta_didik->jenjang_wali ?? '-' ?></td>
            </tr>
            <tr>
              <td class="font-bold">Alamat</td>
              <td><?php echo nl2br($calon_peserta_didik->alamat_wali ?? '-') ?></td>
            </tr>
            <tr>
              <td class="font-bold">Telepon</td>
              <td><?php echo $calon_peserta_didik->telepon_wali ?? '-' ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="col-md-7">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <i class="fa fa-upload"></i> UNGGAH DOKUMEN PENDUKUNG
      </div>
      <div class="card-body">
        <p class="text-muted mb-3">Pilih semua file berkas terlebih dahulu, lalu klik <strong>"Unggah Semua Dokumen"</strong> di bagian bawah.</p>

        <?php
        $validation = \Config\Services::validation();
        $errors = $validation->getErrors();
        if (!empty($errors)) {
          echo '<span class="text-danger">' . $validation->listErrors() . '</span>';
        }
        if (session('msg')):
          ?>
          <div class="alert alert-info alert-dismissible">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          </div>
        <?php endif ?>

        <?php
        echo form_open_multipart(base_url('calon_peserta_didik/pendaftaran/dokumen_batch/' . $calon_peserta_didik->slug_calon_peserta_didik));
        echo csrf_field();
        ?>

        <table class="table tabelku table-sm table-bordered">
          <thead>
            <tr class="bg-light">
              <th width="5%" class="text-center">No</th>
              <th width="30%" class="text-left">Nama Dokumen</th>
              <th width="10%" class="text-center">Wajib</th>
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
                      <a class="btn btn-outline-dark btn-xs"
                        href="<?php echo base_url('calon_peserta_didik/pendaftaran/unduh/' . $check_dokumen->kode_dokumen . '/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
                        target="_blank"><i class="fa fa-download"></i></a>
                      <a class="btn btn-outline-danger btn-xs delete-link"
                        href="<?php echo base_url('calon_peserta_didik/pendaftaran/hapus/' . $check_dokumen->kode_dokumen . '/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>">
                        <i class="fa fa-trash"></i></a>
                    </div>
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
              <td colspan="5" class="text-end pt-3">
                <?php if ($has_pending) { ?>
                  <button type="submit" class="btn btn-success mb-2">
                    <i class="fa fa-upload"></i>&nbsp; Unggah Semua Dokumen
                  </button>
                <?php } ?>

                <a href="<?php echo base_url('calon_peserta_didik/pendaftaran') ?>" class="btn btn-outline-info mb-2">
                  <i class="fa fa-arrow-left"></i> Kembali
                </a>

                <?php if ($no == $data_total) { ?>
                  <a href="<?php echo base_url('calon_peserta_didik/pendaftaran/selesai/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
                    class="btn btn-danger text-white mb-2">
                    Simpan dan Selesaikan Pendaftaran&nbsp;<i class="fa fa-arrow-right"></i>
                  </a>
                <?php } else { ?>
                  <div class="alert alert-info mt-2">
                    <i class="fa fa-info-circle"></i> Dokumen wajib masih kurang, silakan lengkapi.
                  </div>
                <?php } ?>
              </td>
            </tr>
          </tfoot>
        </table>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>