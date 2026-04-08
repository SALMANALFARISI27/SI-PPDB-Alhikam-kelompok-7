<p class="text-right mb-3">
  <a href="<?php echo base_url('admin/gelombang/detail/' . $calon_peserta_didik->id_gelombang . '/Semua/' . $calon_peserta_didik->id_jenjang_pendidikan) ?>"
    class="btn btn-outline-info btn-sm">
    <i class="fa fa-arrow-left"></i> Kembali
  </a>
  <a href="<?php echo base_url('admin/gelombang/cetak/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
    class="btn btn-danger btn-sm" target="_blank">
    <i class="fa fa-file-pdf"></i>&nbsp;Cetak Bukti Pendaftaran
  </a>
</p>

<!-- DATA DASAR -->
<div class="card mb-3">
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-user"></i> DATA DASAR CALON PESERTA DIDIK
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Nama lengkap</td>
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
          <td><?php echo $calon_peserta_didik->tempat_lahir ?>,
            <?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?></td>
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
        <tr>
          <td class="font-bold">Anak ke</td>
          <td>
            <?php echo $calon_peserta_didik->anak_ke ?? '-' ?> dari
            <?php echo $calon_peserta_didik->jumlah_saudara ?? '-' ?> Saudara
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- DATA PENERIMAAN -->
<div class="card mb-3">
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-school"></i> DATA PENERIMAAN DI SEKOLAH
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Jenis Masuk</td>
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
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-heartbeat"></i> DATA KESEHATAN & LAINNYA
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Golongan Darah</td>
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
          <td class="font-bold">Deskripsi Ringkas</td>
          <td><?php echo $calon_peserta_didik->isi ?? '-' ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- DATA AYAH -->
<div class="card mb-3">
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-male"></i> DATA ORANG TUA - AYAH
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Nama Ayah</td>
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
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-female"></i> DATA ORANG TUA - IBU
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Nama Ibu</td>
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
  <div class="card-header bg-dark text-white font-weight-bold">
    <i class="fa fa-user-shield"></i> DATA WALI MURID
  </div>
  <div class="card-body p-2">
    <table class="tabelku table-sm table table-bordered mb-0">
      <tbody>
        <tr>
          <td class="font-bold" width="40%">Identitas Wali</td>
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