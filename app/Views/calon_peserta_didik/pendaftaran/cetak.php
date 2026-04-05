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
      <table class="table table-bordered table-sm printer">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA DASAR CALON PESERTA DIDIK</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Nama lengkap</td>
            <td><?php echo strtoupper($calon_peserta_didik->nama_calon_peserta_didik) ?></td>
          </tr>

          <tr>
            <td class="font-bold">NIS / NISN</td>
            <td><?php echo $calon_peserta_didik->nis ?> / <?php echo $calon_peserta_didik->nisn ?></td>
          </tr>
          <tr>
            <td class="font-bold">Jenis Kelamin</td>
            <td><?php if ($calon_peserta_didik->jenis_kelamin == 'L') {
              echo 'Laki-laki';
            } else {
              echo 'Perempuan';
            } ?>
            </td>
          </tr>
          <tr>
            <td class="font-bold">Tempat, tanggal lahir</td>
            <td><?php echo $calon_peserta_didik->tempat_lahir ?>,
              <?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?>
            </td>
          </tr>
          <tr>
            <td class="font-bold">Kode Pendaftaran</td>
            <td><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></td>
          </tr>
          <tr>
            <td class="font-bold">Periode Pendaftaran</td>
            <td><?php echo $calon_peserta_didik->judul ?></td>
          </tr>
          <tr>
            <td class="font-bold">Tahun Ajaran</td>
            <td><?php echo $calon_peserta_didik->tahun_ajaran ?></td>
          </tr>
          <tr>
            <td class="font-bold">Program/Jenjang</td>
            <td><?php echo $calon_peserta_didik->judul_jenjang_pendidikan ?></td>
          </tr>

          <tr>
            <td class="font-bold">Anak ke</td>
            <td><?php echo $calon_peserta_didik->anak_ke ?> dari <?php echo $calon_peserta_didik->jumlah_saudara ?>
              Saudara</td>
          </tr>
          <tr>
            <td class="font-bold">Alamat</td>
            <td><?php echo nl2br($calon_peserta_didik->alamat) ?></td>
          </tr>

          <tr>
            <td class="font-bold">Telepon</td>
            <td><?php echo $calon_peserta_didik->telepon ?></td>
          </tr>
          <tr>
            <td class="font-bold">Email</td>
            <td><?php echo $calon_peserta_didik->email ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA PENERIMAAN DI SEKOLAH</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Jenis Masuk Calon Peserta Didik</td>
            <td><?php echo $calon_peserta_didik->jenis_calon_peserta_didik ?></td>
          </tr>
          <tr>
            <td class="font-bold">Nama Sekolah Asal</td>
            <td><?php echo $calon_peserta_didik->asal_sekolah ?></td>
          </tr>
          <tr>
            <td class="font-bold">Tanggal Pindah (Sesuai Surat Pindah)</td>
            <td><?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_pindah) ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA KESEHATAN DAN INFORMASI CALON PESERTA DIDIK
              LAINNYA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Golongan Darah</td>
            <td><?php echo $calon_peserta_didik->goldar_calon_peserta_didik ?></td>
          </tr>
          <tr>
            <td class="font-bold">Tinggi / Berat</td>
            <td><?php echo $calon_peserta_didik->tinggi ?> cm / <?php echo $calon_peserta_didik->berat ?> kg</td>
          </tr>
          <tr>
            <td class="font-bold">Penyakit yang pernah/sedang diderita Calon Peserta Didik</td>
            <td><?php echo $calon_peserta_didik->penyakit_calon_peserta_didik ?></td>
          </tr>
          <tr>
            <td class="font-bold">Hobi Calon Peserta Didik</td>
            <td><?php echo $calon_peserta_didik->hobi_calon_peserta_didik ?></td>
          </tr>
          <tr>
            <td class="font-bold">Apakah Calon Peserta Didik Berkebutuhan Khusus?</td>
            <td><?php echo $calon_peserta_didik->berkebutuhan_khusus ?></td>
          </tr>
          <tr>
            <td class="font-bold">Deskripsi Ringkas Tentang Calon Peserta Didik</td>
            <td><?php echo $calon_peserta_didik->isi ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA CALON PESERTA DIDIK - AYAH</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Nama Ayah</td>
            <td><?php echo $calon_peserta_didik->nama_ayah ?></td>
          </tr>
          <tr>
            <td class="font-bold">Agama Ayah</td>
            <td><?php echo $calon_peserta_didik->agama_ayah ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pekerjaan Ayah</td>
            <td><?php echo $calon_peserta_didik->nama_pekerjaan ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pendidikan Ayah</td>
            <td><?php echo $calon_peserta_didik->jenjang_ayah ?></td>
          </tr>
          <tr>
            <td class="font-bold">Alamat Ayah</td>
            <td><?php echo $calon_peserta_didik->alamat_ayah ?></td>
          </tr>
          <tr>
            <td class="font-bold">Telepon/HP Ayah</td>
            <td><?php echo $calon_peserta_didik->telepon_ayah ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA CALON PESERTA DIDIK - IBU</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Nama Ibu</td>
            <td><?php echo $calon_peserta_didik->nama_ibu ?></td>
          </tr>
          <tr>
            <td class="font-bold">Agama Ibu</td>
            <td><?php echo $calon_peserta_didik->agama_ibu ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pekerjaan Ibu</td>
            <td><?php echo $calon_peserta_didik->pekerjaan_ibu ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pendidikan Ibu</td>
            <td><?php echo $calon_peserta_didik->jenjang_ibu ?></td>
          </tr>
          <tr>
            <td class="font-bold">Alamat Ibu</td>
            <td><?php echo $calon_peserta_didik->alamat_ibu ?></td>
          </tr>
          <tr>
            <td class="font-bold">Telepon/HP Ibu</td>
            <td><?php echo $calon_peserta_didik->telepon_ibu ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered table-sm printer mt-2">
        <thead>
          <tr>
            <th colspan="2" class="bg-secondary text-white text-center">DATA ORANG TUA CALON PESERTA DIDIK - WALI</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-bold" width="35%">Nama Wali</td>
            <td><?php echo $calon_peserta_didik->nama_wali ?></td>
          </tr>
          <tr>
            <td class="font-bold">Agama Wali</td>
            <td><?php echo $calon_peserta_didik->agama_wali ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pekerjaan Wali</td>
            <td><?php echo $calon_peserta_didik->pekerjaan_wali ?></td>
          </tr>
          <tr>
            <td class="font-bold">Pendidikan Wali</td>
            <td><?php echo $calon_peserta_didik->jenjang_wali ?></td>
          </tr>
          <tr>
            <td class="font-bold">Alamat Wali</td>
            <td><?php echo $calon_peserta_didik->alamat_wali ?></td>
          </tr>
          <tr>
            <td class="font-bold">Telepon/HP Wali</td>
            <td><?php echo $calon_peserta_didik->telepon_wali ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </page>
</body>

</html>