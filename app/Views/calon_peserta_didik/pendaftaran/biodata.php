<?php
// Helper: ambil nilai - prioritas: set_value (form error), lalu existing_biodata (auto-fill), lalu default
function bd($field, $existing_biodata = null, $default = '') {
    $sv = set_value($field);
    if ($sv !== '') return $sv;
    if ($existing_biodata && isset($existing_biodata->$field) && $existing_biodata->$field !== null) {
        return htmlspecialchars($existing_biodata->$field);
    }
    return $default;
}
?>

<p class="lead mb-2 text-center">Halo <strong
    class="text-danger"><?php echo Session()->get('nama_calon_peserta_didik') ?></strong>,
  masukkan data Calon Peserta Didik dengan benar dan lengkap.
  <br>Anda sedang mendaftar pada <strong><?php echo $gelombang->judul ?></strong> Tahun Ajaran
  <strong><?php echo $gelombang->tahun_ajaran ?></strong>.
</p>

<?php if ($existing_biodata): ?>
  <div class="alert alert-info alert-dismissible">
    <i class="fa fa-info-circle"></i>
    <strong>Data biodata diisi otomatis</strong> dari pendaftaran Anda sebelumnya (<em><?php echo $existing_biodata->judul ?? '' ?></em>).
    Silakan periksa kembali dan pilih <strong>Program/Jenjang</strong> yang baru sebelum menyimpan.
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
  </div>
<?php endif ?>

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
use App\Models\Jenjang_pendidikan_model;
$m_jenjang_pendidikan = new Jenjang_pendidikan_model();

echo form_open_multipart(base_url('calon_peserta_didik/pendaftaran/biodata/' . $gelombang->id_gelombang));
echo csrf_field();
?>
<p><span class="text-danger">*</span> Wajib diisi</p>
<!-- data dasar CALON PESERTA DIDIK -->
<div class="card mb-2">
  <div class="card-header bg-dark text-white mb-2">
    DATA DASAR CALON PESERTA DIDIK
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Program/Jenjang<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <?php $jenjang_list = $m_jenjang_pendidikan->main(); ?>
        <select name="id_jenjang_pendidikan" id="id_jenjang_pendidikan" class="form-control form-select" required onchange="handleJenjangChange(this)">
          <option value="">Pilih Program / Jenjang Pendidikan</option>
          <?php foreach ($jenjang_list as $jp): ?>
            <?php $sudah_daftar = in_array($jp->id_jenjang_pendidikan, $registered_jenjang ?? []); ?>
            <option value="<?php echo $jp->id_jenjang_pendidikan ?>"
              data-jenis="<?php echo $jp->jenis_jenjang_pendidikan ?>"
              <?php if (set_value('id_jenjang_pendidikan') == $jp->id_jenjang_pendidikan) echo 'selected'; ?>
              <?php if ($sudah_daftar) echo 'disabled'; ?>>
              <?php echo $jp->judul_jenjang_pendidikan; ?>
              <?php if ($sudah_daftar) echo ' (Sudah Terdaftar)'; ?>
            </option>
          <?php endforeach; ?>
        </select>
        <small class="text-secondary">Pilih program/jenjang yang <strong>belum</strong> pernah Anda daftarkan di periode ini.</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Nama Lengkap<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="nama_calon_peserta_didik" class="form-control form-control-lg"
          placeholder="Nama lengkap Calon Peserta Didik" value="<?php echo bd('nama_calon_peserta_didik', $existing_biodata) ?>"
          required>
        <small class="text-warning">Nama lengkap Calon Peserta Didik</small>
      </div>
    </div>


    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">NIS dan NISN</label>
      <div class="col-md-4">
        <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Calon Peserta Didik (NIS)"
          value="<?php echo bd('nis', $existing_biodata) ?>">
        <small class="text-warning">Nomor Induk Calon Peserta Didik (NIS) atau kosongkan</small>
      </div>
      <div class="col-md-5">
        <input type="text" name="nisn" class="form-control"
          placeholder="Nomor Induk Calon Peserta Didik Nasional (NISN)" value="<?php echo bd('nisn', $existing_biodata) ?>">
        <small class="text-warning">Nomor Induk Calon Peserta Didik Nasional (NISN) atau kosongkan</small>
      </div>
    </div>

    <!-- Agama Siswa - dinamis berdasarkan jenjang -->
    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Agama &amp; Status Kewarganegaraan<span class="text-danger">*</span></label>
      <div class="col-md-3">
        <!-- Jika Pesantren (Non Formal): dikunci Islam -->
        <div id="agama_pesantren" style="display:none;">
          <input type="hidden" name="agama" value="Islam">
          <input type="text" class="form-control bg-light" value="Islam" readonly>
          <small class="text-info"><i class="fa fa-lock"></i> Pesantren: otomatis Islam</small>
        </div>
        <!-- Jika SMP / program lain: bebas pilih -->
        <div id="agama_bebas">
          <select name="agama" id="agama_select" class="form-control" required>
            <option value="">-- Pilih Agama --</option>
            <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $ag): ?>
              <option value="<?php echo $ag ?>" <?php if (bd('agama', $existing_biodata) == $ag) echo 'selected'; ?>><?php echo $ag ?></option>
            <?php endforeach; ?>
          </select>
        </div>
    
      </div>
      <div class="col-md-3">
        <select name="status_wn" class="form-control form-select" required>
          <option value="WNI">WNI</option>
          <option value="WNA" <?php if (bd('status_wn', $existing_biodata) == 'WNA') echo 'selected'; ?>>WNA</option>
        </select>
      </div>
      <div class="col-md-3">
        <input type="text" name="negara_asal" class="form-control" value="<?php echo bd('negara_asal', $existing_biodata) ?>"
          placeholder="Negara asal (jika WNA)">
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Jenis Kelamin<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <select name="jenis_kelamin" class="form-control form-select" required>
          <option value="">Jenis Kelamin</option>
          <option value="L" <?php if (bd('jenis_kelamin', $existing_biodata) == 'L') echo 'selected'; ?>>Laki-laki</option>
          <option value="P" <?php if (bd('jenis_kelamin', $existing_biodata) == 'P') echo 'selected'; ?>>Perempuan</option>
        </select>
      </div>
    </div>



    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Tempat dan Tanggal Lahir<span class="text-danger">*</span></label>
      <div class="col-md-5">
        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir"
          value="<?php echo bd('tempat_lahir', $existing_biodata) ?>" required>
        <small class="text-warning">Tempat lahir</small>
      </div>
      <div class="col-md-4">
        <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy"
          value="<?php echo bd('tanggal_lahir', $existing_biodata) ?>" required>
        <small class="text-warning">Tanggal lahir</small>
      </div>
    </div>


    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Alamat<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <textarea name="alamat" placeholder="Alamat" class="form-control"
          required><?php echo bd('alamat', $existing_biodata) ?></textarea>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Kode Pos</label>
      <div class="col-md-9">
        <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos"
          value="<?php echo bd('kode_pos', $existing_biodata) ?>">
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Telepon dan Email<span class="text-danger">*</span></label>
      <div class="col-md-4">
        <input type="text" name="telepon" class="form-control" placeholder="Telepon/HP"
          value="<?php echo bd('telepon', $existing_biodata) ?>" required>
        <small class="text-warning">Telepon/HP</small>
      </div>
      <div class="col-md-5">
   
        <input type="email" name="email_display" class="form-control bg-light" placeholder="Email"
          value="<?php echo htmlspecialchars($akun->email) ?>" readonly>
      
      </div>
    </div>



    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Anak ke dan Jumlah Saudara</label>
      <div class="col-md-4">
        <input type="number" name="anak_ke" class="form-control" placeholder="Anak ke-"
          value="<?php echo bd('anak_ke', $existing_biodata) ?>" min="1">
        <small class="text-secondary">Anak ke berapa</small>
      </div>
      <div class="col-md-5">
        <input type="number" name="jumlah_saudara" class="form-control" placeholder="Jumlah saudara"
          value="<?php echo bd('jumlah_saudara', $existing_biodata) ?>" min="0">
        <small class="text-secondary">Jumlah saudara kandung</small>
      </div>
    </div>

  </div>

</div>

<!-- data dasar CALON PESERTA DIDIK -->
<div class="card mb-2">
  <div class="card-header bg-dark text-white mb-2">
    DATA PENERIMAAN DI SEKOLAH
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Jenis Masuk Calon Peserta Didik<span class="text-danger">*</span></label>
      <div class="col-md-9">

        <!-- radio -->
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_calon_peserta_didik" value="Langsung"
              <?php if (bd('jenis_calon_peserta_didik', $existing_biodata, 'Langsung') == 'Langsung') echo 'checked'; ?>>
            <label class="form-check-label">Langsung</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_calon_peserta_didik" value="Pindahan"
              <?php if (bd('jenis_calon_peserta_didik', $existing_biodata) == 'Pindahan') echo 'checked'; ?>>
            <label class="form-check-label">Pindahan</label>
          </div>
        </div>


      </div>
    </div>



    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Nama Sekolah Asal</label>
      <div class="col-md-9">
        <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama Sekolah Asal"
          value="<?php echo bd('asal_sekolah', $existing_biodata) ?>">
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Alamat Sekolah Asal</label>
      <div class="col-md-9">
        <textarea name="alamat_sekolah_asal" class="form-control"
          placeholder="Alamat Sekolah Asal"><?php echo bd('alamat_sekolah_asal', $existing_biodata) ?></textarea>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Tanggal Pindah (Sesuai Surat Pindah)</label>
      <div class="col-md-9">
        <input type="text" name="tanggal_pindah" class="form-control tanggal" placeholder="Tanggal pindah"
          value="<?php echo bd('tanggal_pindah', $existing_biodata) ?>">
        <small class="text-secondary">Tanggal pindah (Jika CALON PESERTA DIDIK pindahan). Format: dd-mm-yyyy</small>
      </div>
    </div>

  </div>

</div>

<!-- data dasar CALON PESERTA DIDIK -->
<div class="card mb-2">
  <div class="card-header bg-dark text-white mb-2">
    DATA KESEHATAN DAN INFORMASI CALON PESERTA DIDIK LAINNYA
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Golongan Darah Calon Peserta Didik<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <select name="goldar_calon_peserta_didik" class="form-control  form-select" required>
          <option value="">Pilih Golongan Darah</option>
          <?php foreach (['A','B','AB','O'] as $gd): ?>
            <option value="<?php echo $gd ?>" <?php if (bd('goldar_calon_peserta_didik', $existing_biodata) == $gd) echo 'selected'; ?>><?php echo $gd ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Tinggi dan Berat Badan Calon Peserta Didik<span
          class="text-danger">*</span></label>
      <div class="col-md-4">
        <input type="number" name="tinggi" class="form-control" placeholder="Tinggi Badan"
          value="<?php echo bd('tinggi', $existing_biodata) ?>" required>
        <small class="text-secondary">Tinggi Badan dalam Centimeter</small>
      </div>
      <div class="col-md-5">
        <input type="number" name="berat" class="form-control" placeholder="Berat Badan"
          value="<?php echo bd('berat', $existing_biodata) ?>" required>
        <small class="text-secondary">Berat Badan dalam Kilogram</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Penyakit yang pernah/sedang diderita Calon Peserta Didik</label>
      <div class="col-md-9">
        <textarea name="penyakit_calon_peserta_didik" class="form-control"
          placeholder="Penyakit yang pernah/sedang diderita Calon Peserta Didik"><?php echo bd('penyakit_calon_peserta_didik', $existing_biodata) ?></textarea>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Hobi Calon Peserta Didik</label>
      <div class="col-md-9">
        <textarea name="hobi_calon_peserta_didik" class="form-control"
          placeholder="Hobi CALON PESERTA DIDIK"><?php echo bd('hobi_calon_peserta_didik', $existing_biodata) ?></textarea>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Apakah Calon Peserta Didik Berkebutuhan Khusus?<span
          class="text-danger">*</span></label>
      <div class="col-md-9">
        <!-- radio -->
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="berkebutuhan_khusus" value="Tidak"
              <?php if (bd('berkebutuhan_khusus', $existing_biodata, 'Tidak') != 'Ya') echo 'checked'; ?>>
            <label class="form-check-label">Tidak</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="berkebutuhan_khusus" value="Ya"
              <?php if (bd('berkebutuhan_khusus', $existing_biodata) == 'Ya') echo 'checked'; ?>>
            <label class="form-check-label">Ya</label>
          </div>
        </div>

      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Deskripsi Ringkas Tentang Calon Peserta Didik</label>
      <div class="col-md-9">
        <textarea name="isi" class="form-control"
          placeholder="Deskripsi Ringkas Tentang Calon Peserta Didik"><?php echo bd('isi', $existing_biodata) ?></textarea>
        <small class="text-secondary">Misal: Calon Peserta Didik ini berkebutuhan khusus</small>
      </div>
    </div>

  </div>

</div>



<!-- data ayah -->
<div class="card mb-2">
  <div class="card-header bg-dark text-white mb-2">
    DATA ORANG TUA CALON PESERTA DIDIK - AYAH
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Nama Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah"
          value="<?php echo bd('nama_ayah', $existing_biodata) ?>" required>
        <small class="text-warning">Nama ayah</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Agama Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <!-- Agama orang tua: SELALU bebas pilih, tidak dikunci -->
        <select name="agama_ayah" class="form-control" required>
          <option value="">-- Pilih Agama --</option>
          <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $ag): ?>
            <option value="<?php echo $ag ?>" <?php if (bd('agama_ayah', $existing_biodata) == $ag) echo 'selected'; ?>><?php echo $ag ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Pekerjaan Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah"
          value="<?php echo bd('pekerjaan_ayah', $existing_biodata) ?>" required>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Pendidikan Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <?php $jenjang_opts = ['Tidak Sekolah','SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3']; ?>
        <select name="jenjang_ayah" class="form-control" required>
          <option value="">-- Pilih Jenjang --</option>
          <?php foreach ($jenjang_opts as $jo): ?>
            <option value="<?php echo $jo ?>" <?php if (bd('jenjang_ayah', $existing_biodata) == $jo) echo 'selected'; ?>><?php echo $jo ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Alamat Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <textarea name="alamat_ayah" placeholder="Alamat Ayah"
          class="form-control" required><?php echo bd('alamat_ayah', $existing_biodata) ?></textarea>
      </div>
    </div>


    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Telepon/HP Ayah<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="telepon_ayah" class="form-control" placeholder="Telepon/HP Ayah"
          value="<?php echo bd('telepon_ayah', $existing_biodata) ?>" required>
      </div>
    </div>

  </div>

</div>

<!-- data ibu -->
<div class="card mb-2">
  <div class="card-header bg-dark text-white mb-2">
    DATA ORANG TUA CALON PESERTA DIDIK - IBU
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Nama Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu"
          value="<?php echo bd('nama_ibu', $existing_biodata) ?>" required>
        <small class="text-warning">Nama ibu</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Agama Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <!-- Agama orang tua: SELALU bebas pilih, tidak dikunci -->
        <select name="agama_ibu" class="form-control" required>
          <option value="">-- Pilih Agama --</option>
          <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $ag): ?>
            <option value="<?php echo $ag ?>" <?php if (bd('agama_ibu', $existing_biodata) == $ag) echo 'selected'; ?>><?php echo $ag ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Pekerjaan Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu"
          value="<?php echo bd('pekerjaan_ibu', $existing_biodata) ?>" required>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Pendidikan Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <select name="jenjang_ibu" class="form-control" required>
          <option value="">-- Pilih Jenjang --</option>
          <?php foreach ($jenjang_opts as $jo): ?>
            <option value="<?php echo $jo ?>" <?php if (bd('jenjang_ibu', $existing_biodata) == $jo) echo 'selected'; ?>><?php echo $jo ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Alamat Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <textarea name="alamat_ibu" placeholder="Alamat Ibu"
          class="form-control" required><?php echo bd('alamat_ibu', $existing_biodata) ?></textarea>
      </div>
    </div>


    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Telepon/HP Ibu<span class="text-danger">*</span></label>
      <div class="col-md-9">
        <input type="text" name="telepon_ibu" class="form-control" placeholder="Telepon/HP Ibu"
          value="<?php echo bd('telepon_ibu', $existing_biodata) ?>" required>
      </div>
    </div>

  </div>

</div>

<!-- data wali -->
<div class="card">
  <div class="card-header bg-dark text-white mb-2">
    DATA ORANG TUA CALON PESERTA DIDIK - WALI MURID
  </div>
  <div class="card-body">

    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark">Identitas Wali Murid<span class="text-danger">*</span></label>
      <div class="col-md-9">

        <!-- radio -->
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="identitas_wali" value="Ayah" onchange="updateWali()"
              <?php if (bd('identitas_wali', $existing_biodata) == 'Ayah') echo 'checked'; ?> required>
            <label class="form-check-label">Sama dengan Ayah</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="identitas_wali" value="Ibu" onchange="updateWali()"
              <?php if (bd('identitas_wali', $existing_biodata) == 'Ibu') echo 'checked'; ?> required>
            <label class="form-check-label">Sama dengan Ibu</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="identitas_wali" value="Berbeda" onchange="updateWali()"
              <?php if (bd('identitas_wali', $existing_biodata) == 'Berbeda') echo 'checked'; ?> required>
            <label class="form-check-label">Berbeda dengan Ayah dan Ibu</label>
          </div>
        </div>




      </div>
    </div>

    <div id="myDIV">

      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Nama Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali"
            value="<?php echo bd('nama_wali', $existing_biodata) ?>" required>
          <small class="text-warning">Nama wali</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Agama Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <!-- Agama wali: SELALU bebas pilih, tidak dikunci -->
          <select name="agama_wali" class="form-control" required>
            <option value="">-- Pilih Agama --</option>
            <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $ag): ?>
              <option value="<?php echo $ag ?>" <?php if (bd('agama_wali', $existing_biodata) == $ag) echo 'selected'; ?>><?php echo $ag ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Pekerjaan Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali"
            value="<?php echo bd('pekerjaan_wali', $existing_biodata) ?>" required>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Pendidikan Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <select name="jenjang_wali" class="form-control" required>
            <option value="">-- Pilih Jenjang --</option>
            <?php foreach ($jenjang_opts as $jo): ?>
              <option value="<?php echo $jo ?>" <?php if (bd('jenjang_wali', $existing_biodata) == $jo) echo 'selected'; ?>><?php echo $jo ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Alamat Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <textarea name="alamat_wali" placeholder="Alamat Wali"
            class="form-control" required><?php echo bd('alamat_wali', $existing_biodata) ?></textarea>
        </div>
      </div>


      <div class="form-group row mb-3">
        <label class="col-md-3 text-dark">Telepon/HP Wali<span class="text-danger">*</span></label>
        <div class="col-md-9">
          <input type="text" name="telepon_wali" class="form-control" placeholder="Telepon/HP Wali"
            value="<?php echo bd('telepon_wali', $existing_biodata) ?>" required>
        </div>
      </div>
    </div>

  </div>
  <div class="card-footer bg-light text-right border-top">
    <div class="form-group row mb-3">
      <label class="col-md-3 text-dark"></label>
      <div class="col-md-9">
        <button type="submit" class="btn btn-success text-white"><i class="fa fa-save"></i>&nbsp;Simpan dan Lanjutkan
          Pendaftaran</button>
      </div>
    </div>
  </div>
</div>

<?php echo form_close(); ?>

<script>
  // --- Wali section show/hide ---
  function updateWali() {
    var radios = document.getElementsByName('identitas_wali');
    var selected = '';
    for(var i=0; i<radios.length; i++){
      if(radios[i].checked){
        selected = radios[i].value;
        break;
      }
    }
    
    var myDIV = document.getElementById("myDIV");
    var waliInputs = myDIV.querySelectorAll('input, select, textarea');
    
    if (selected === 'Berbeda') {
      myDIV.style.display = "block";
      waliInputs.forEach(function(el) {
        el.required = true;
      });
    } else {
      myDIV.style.display = "none";
      waliInputs.forEach(function(el) {
        el.required = false;
      });
    }
  }

  // --- Agama Siswa: kunci Islam jika Pesantren (Non Formal) ---
  function handleJenjangChange(selectEl) {
    var selectedOption = selectEl.options[selectEl.selectedIndex];
    var jenis = selectedOption ? selectedOption.getAttribute('data-jenis') : '';

    var agamaPesantren = document.getElementById('agama_pesantren');
    var agamaBebas = document.getElementById('agama_bebas');
    var agamaSelect = document.getElementById('agama_select');

    if (jenis === 'Non Formal') {
      // Pesantren: kunci agama siswa ke Islam
      agamaPesantren.style.display = 'block';
      agamaBebas.style.display = 'none';
      agamaSelect.removeAttribute('name'); // supaya tidak double submit
      agamaSelect.required = false;
    } else {
      // SMP/lainnya: agama bebas
      agamaPesantren.style.display = 'none';
      agamaBebas.style.display = 'block';
      agamaSelect.setAttribute('name', 'agama');
      agamaSelect.required = true;
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
    updateWali();
    // Jalankan juga handleJenjangChange jika sudah ada nilai terpilih (misal dari set_value)
    var jenjangSel = document.getElementById('id_jenjang_pendidikan');
    if (jenjangSel) handleJenjangChange(jenjangSel);
  });
</script>