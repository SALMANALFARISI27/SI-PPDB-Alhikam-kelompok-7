<?php
use App\Libraries\Website;
$this->website = new Website();
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $title ?></title>
  <style>
    <?php echo file_get_contents(FCPATH . 'assets/css/css-print.css'); ?>
  </style>
</head>

<body>
  <page size="A4" layout="portrait">
    <div class="cetak">
      <table>
        <tbody>
          <tr>
            <td style="width: 1.8cm;">
              <?php
              $icon_url = $this->website->icon();
              // Convert URL ke path file untuk mPDF
              $icon_path = str_replace(base_url(), FCPATH, $icon_url);
              if (file_exists($icon_path)) {
                $icon_src = $icon_path;
              } else {
                $icon_src = $icon_url;
              }
              ?>
              <img src="<?php echo $icon_src ?>" style="width: 1.5cm; height: auto;">
            </td>
            <td>
              <h1>INFORMASI PENDAFTARAN PESERTA DIDIK BARU
                <br><?php echo $konfigurasi->namaweb ?>
              </h1>
            </td>
          </tr>
        </tbody>
      </table>
      <hr><br>
      <table class="printer">
        <thead>
          <tr>
            <th width="35%">Kode Pendaftaran</th>
            <th><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Status Pendaftaran</td>
            <td>
              <?php if ($calon_peserta_didik->status_pendaftaran == 'Menunggu') { ?>
                <span class="badge badge-warning">Menunggu</span>
              <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Diterima-Tahap-1') { ?>
                <span class="badge badge-success">Diterima Tahap 1</span>
              <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Tidak-Diterima') { ?>
                <span class="badge badge-danger">Tidak Diterima</span>
              <?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Lulus') { ?>
                <span class="badge badge-primary">Lulus</span>
              <?php } else { ?>
                <span class="badge badge-info">Diperiksa</span>
              <?php } ?>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- DATA DASAR -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA DASAR CALON PESERTA DIDIK</th>
          </tr>
        </thead>
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
            <td><?php echo $calon_peserta_didik->tempat_lahir ?>,
              <?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?>
            </td>
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

      <!-- DATA PENERIMAAN -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA PENERIMAAN DI SEKOLAH</th>
          </tr>
        </thead>
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
            <td>
              <?php echo (!empty($calon_peserta_didik->tanggal_pindah) && $calon_peserta_didik->tanggal_pindah != '0000-00-00') ? $this->website->tanggal_id($calon_peserta_didik->tanggal_pindah) : '-'; ?>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- DATA KESEHATAN -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA KESEHATAN & INFORMASI LAINNYA</th>
          </tr>
        </thead>
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
            <td class="font-bold">Deskripsi Ringkas</td>
            <td><?php echo $calon_peserta_didik->isi ?? '-' ?></td>
          </tr>
        </tbody>
      </table>

      <!-- DATA AYAH -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA ORANG TUA - AYAH</th>
          </tr>
        </thead>
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

      <!-- DATA IBU -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA ORANG TUA - IBU</th>
          </tr>
        </thead>
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

      <!-- DATA WALI -->
      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-dark text-white text-center">DATA WALI MURID</th>
          </tr>
        </thead>
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
  </page>
</body>

</html>