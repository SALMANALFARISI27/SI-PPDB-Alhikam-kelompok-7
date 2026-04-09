<p class="lead mb-2 text-center">Halo <strong class="text-danger"><?php echo Session()->get('nama_calon_peserta_didik') ?></strong>, masukkan data Calon Peserta Didik dengan benar dan lengkap.
                <br>Anda sedang mendaftar pada <strong><?php echo $gelombang->judul ?></strong> Tahun Ajaran <strong><?php echo $gelombang->tahun_ajaran ?></strong>.
              </p>

              <?php 
              $validation = \Config\Services::validation();
                  $errors = $validation->getErrors();
                  if(!empty($errors))
                  {
                      echo '<span class="text-danger">'.$validation->listErrors().'</span>';
                  }
              if (session('msg')) : 
              ?>
                   <div class="alert alert-info alert-dismissible">
                       <?= session('msg') ?>
                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                   </div>
               <?php endif ?>

              <?php 
        use App\Models\Jenjang_pendidikan_model;
        $m_jenjang_pendidikan   = new Jenjang_pendidikan_model();

        echo form_open_multipart(base_url('calon_peserta_didik/pendaftaran/edit/'.$calon_peserta_didik->slug_calon_peserta_didik));
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
              <label class="col-md-3 text-dark">Status Pendaftaran<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <?php 
                  $status = $calon_peserta_didik->status_pendaftaran ?? 'Menunggu';
                  $badge_class = 'secondary';
                  if($status == 'Diterima') $badge_class = 'success';
                  elseif($status == 'Tidak-Diterima') $badge_class = 'danger';
                  elseif($status == 'Diperiksa') $badge_class = 'warning';
                ?>
                <span class="badge bg-<?php echo $badge_class; ?> text-white px-3 py-2" style="font-size: 14px;"><?php echo $status; ?></span>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Program/Jenjang<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <?php $jenjang_pendidikan   = $m_jenjang_pendidikan->main(); ?>
                <select name="id_jenjang_pendidikan" class="form-control  form-select" required>
                  <option value="">Pilih Program / Jenjang Pendidikan</option>
                  <?php foreach($jenjang_pendidikan as $jenjang_pendidikan) { ?>
                    <option value="<?php echo $jenjang_pendidikan->id_jenjang_pendidikan ?>" <?php if(set_value('id_jenjang_pendidikan')==$jenjang_pendidikan->id_jenjang_pendidikan || $calon_peserta_didik->id_jenjang_pendidikan==$jenjang_pendidikan->id_jenjang_pendidikan) { echo 'selected'; } ?>>
                      <?php echo $jenjang_pendidikan->judul_jenjang_pendidikan; ?>
                    </option>
                  <?php } ?>
                </select>
                <small class="text-secondary">Status Anak</small>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Nama Lengkap<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <input type="text" name="nama_calon_peserta_didik" class="form-control form-control-lg" placeholder="Nama lengkap CALON PESERTA DIDIK" value="<?php if(isset($_POST['submit'])) { echo set_value('nama_calon_peserta_didik'); }else{ echo $calon_peserta_didik->nama_calon_peserta_didik; } ?>" required>
                <small class="text-warning">Nama lengkap Calon Peserta Didik</small>
              </div>
            </div>

           

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">NIS dan NISN</label>
              <div class="col-md-4">
                <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Calon Peserta Didik (NIS)" value="<?php if(isset($_POST['submit'])) { echo set_value('nis'); }else{ echo $calon_peserta_didik->nis; } ?>">
                <small class="text-warning">Nomor Induk Calon Peserta Didik (NIS) atau kosongkan</small>
              </div>
              <div class="col-md-5">
                <input type="text" name="nisn" class="form-control" placeholder="Nomor Induk Calon Peserta Didik Nasional (NISN)" value="<?php if(isset($_POST['submit'])) { echo set_value('nisn'); }else{ echo $calon_peserta_didik->nisn; } ?>">
                <small class="text-warning">Nomor Induk Calon Peserta Didik Nasional (NISN) atau kosongkan</small>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Agama &amp; Status Kewarganegaraan<span class="text-danger">*</span></label>
              <div class="col-md-3">
                <select name="agama" class="form-control" required><option value="">-- Pilih Agama --</option>
                  <option value="Islam" <?php if($calon_peserta_didik->agama=='Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Kristen" <?php if($calon_peserta_didik->agama=='Kristen') echo 'selected'; ?>>Kristen</option>
                  <option value="Katolik" <?php if($calon_peserta_didik->agama=='Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Hindu" <?php if($calon_peserta_didik->agama=='Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Buddha" <?php if($calon_peserta_didik->agama=='Buddha') echo 'selected'; ?>>Buddha</option>
                  <option value="Konghucu" <?php if($calon_peserta_didik->agama=='Konghucu') echo 'selected'; ?>>Konghucu</option>
                  <option value="Lainnya" <?php if($calon_peserta_didik->agama=='Lainnya') echo 'selected'; ?>>Lainnya</option></select>
                <small class="text-secondary">Agama Calon Peserta Didik</small>
              </div>
              <div class="col-md-3">
                <select name="status_wn" class="form-control form-select" required>
                  <option value="WNI">WNI</option>
                  <option value="WNA" <?php if(set_value('status_wn')=='WNA') { echo 'selected'; }elseif($calon_peserta_didik->status_wn=='WNA') { echo 'selected'; } ?>>WNA</option>
                </select>
              </div>
              <div class="col-md-3">
                <input type="text" name="negara_asal" class="form-control" value="<?php if(isset($_POST['submit'])) { echo set_value('negara_asal'); }else{ echo $calon_peserta_didik->negara_asal; } ?>" placeholder="Negara asal (jika WNA)">
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Jenis Kelamin<span class="text-danger">*</span></label>
              <div class="col-md-9">
                  <select name="jenis_kelamin" class="form-control form-select" required>
                    <option value="">Jenis Kelamin</option>
                    <option value="L" <?php if(set_value('jenis_kelamin')=='L') { echo 'checked'; }elseif($calon_peserta_didik->jenis_kelamin=='L') { echo 'selected'; } ?>>Laki-laki</option>
                    <option value="P" <?php if(set_value('jenis_kelamin')=='P') { echo 'selected'; }elseif($calon_peserta_didik->jenis_kelamin=='P') { echo 'selected'; } ?>>Perempuan</option>
                  </select>
              </div>
            </div>

 

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Tempat dan Tanggal Lahir<span class="text-danger">*</span></label>
              <div class="col-md-5">
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php if(isset($_POST['submit'])) { echo set_value('tempat_lahir'); }else{ echo $calon_peserta_didik->tempat_lahir; } ?>" required>
                <small class="text-warning">Tempat lahir</small>
              </div>
              <div class="col-md-4">
                <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['submit'])) { echo set_value('tanggal_lahir'); }else{ echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir); } ?>" required>
                <small class="text-warning">Tanggal lahir</small>
              </div>
            </div>


            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Alamat<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <textarea name="alamat" placeholder="Alamat" class="form-control" required><?php if(isset($_POST['submit'])) { echo set_value('alamat'); }else{ echo $calon_peserta_didik->alamat; } ?></textarea>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Kode Pos</label>
              <div class="col-md-9">
                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?php if(isset($_POST['submit'])) { echo set_value('kode_pos'); }else{ echo $calon_peserta_didik->kode_pos; } ?>">
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Telepon dan Email</label>
              <div class="col-md-4">
                <input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="<?php if(isset($_POST['submit'])) { echo set_value('telepon'); }else{ echo $calon_peserta_didik->telepon; } ?>" required>
                <small class="text-warning">Telepon/HP</small>
              </div>
              <div class="col-md-5">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['submit'])) { echo set_value('email'); }else{ echo $calon_peserta_didik->email; } ?>" required>
                <small class="text-warning">Email (Username)</small>
              </div>
            </div>
          
        <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Anak ke<span class="text-danger">*</span></label>
              <div class="col-md-3">
                <input type="number" name="anak_ke" class="form-control" placeholder="Anak nomor ke?" value="<?php if(isset($_POST['submit'])) { echo set_value('anak_ke'); }else{ echo $calon_peserta_didik->anak_ke; } ?>" required>
                <small class="text-secondary">Anak nomor ke</small>
              </div>
              <div class="col-md-3">
                <input type="number" name="jumlah_saudara" class="form-control" placeholder="Jumlah saudara" value="<?php if(isset($_POST['submit'])) { echo set_value('jumlah_saudara'); }else{ echo $calon_peserta_didik->jumlah_saudara; } ?>" required>
                <small class="text-secondary">Jumlah saudara</small>
              </div>
            </div>
         

          </div>
          
        </div>
        <!-- data dasar CALON PESERTA DIDIK -->

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
                    <input class="form-check-input" type="radio" name="jenis_calon_peserta_didik" value="Langsung"<?php if(set_value('jenis_calon_peserta_didik')=='Tidak') { echo 'checked'; }elseif($calon_peserta_didik->jenis_calon_peserta_didik=='Langsung') { echo 'checked'; }else{ echo 'checked'; } ?>>
                    <label class="form-check-label">Langsung</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_calon_peserta_didik" value="Pindahan" <?php if(set_value('jenis_calon_peserta_didik')=='Pindahan') { echo 'checked'; }elseif($calon_peserta_didik->jenis_calon_peserta_didik=='Pindahan') { echo 'checked'; } ?>>
                    <label class="form-check-label">Pindahan</label>
                  </div>
                </div>


              </div>
            </div>

           

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Nama Sekolah Asal</label>
              <div class="col-md-9">
                <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama Sekolah Asal" value="<?php if(isset($_POST['submit'])) { echo set_value('asal_sekolah'); }else{ echo $calon_peserta_didik->asal_sekolah; } ?>">
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Alamat Sekolah Asal</label>
              <div class="col-md-9">
                <textarea name="alamat_sekolah_asal" class="form-control" placeholder="Alamat Sekolah Asal"><?php if(isset($_POST['submit'])) { echo set_value('alamat_sekolah_asal'); }else{ echo $calon_peserta_didik->alamat_sekolah_asal; } ?></textarea>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Tanggal Pindah (Sesuai Surat Pindah)</label>
              <div class="col-md-9">
                <input type="text" name="tanggal_pindah" class="form-control tanggal" placeholder="Tanggal pindah" value="<?php if(isset($_POST['submit'])) { echo set_value('tanggal_pindah'); }elseif(!empty($calon_peserta_didik->tanggal_pindah) && $calon_peserta_didik->tanggal_pindah != '0000-00-00'){ echo $this->website->tanggal_id($calon_peserta_didik->tanggal_pindah); } ?>">
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
              <label class="col-md-3 text-dark">Golongan Darah Calon Peserta Didik</label>
              <div class="col-md-9">
                <select name="goldar_calon_peserta_didik" class="form-control  form-select" required>
                  <option value="">Pilih Golongan Darah</option>
                  <option value="A" <?php if(set_value('goldar_calon_peserta_didik')=='A') { echo 'selected'; }elseif($calon_peserta_didik->goldar_calon_peserta_didik=='A') { echo 'selected'; } ?>>A</option>
                  <option value="B" <?php if(set_value('goldar_calon_peserta_didik')=='B') { echo 'selected'; }elseif($calon_peserta_didik->goldar_calon_peserta_didik=='B') { echo 'selected'; } ?>>B</option>
                  <option value="AB" <?php if(set_value('goldar_calon_peserta_didik')=='AB') { echo 'selected'; }elseif($calon_peserta_didik->goldar_calon_peserta_didik=='AB') { echo 'selected'; } ?>>AB</option>
                  <option value="O" <?php if(set_value('goldar_calon_peserta_didik')=='O') { echo 'selected'; }elseif($calon_peserta_didik->goldar_calon_peserta_didik=='O') { echo 'selected'; } ?>>O</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Tinggi dan Berat Badan Calon Peserta Didik<span class="text-danger">*</span></label>
              <div class="col-md-4">
                <input type="number" name="tinggi" class="form-control" placeholder="Tinggi Badan" value="<?php if(isset($_POST['submit'])) { echo set_value('tinggi'); }else{ echo $calon_peserta_didik->tinggi; } ?>" required>
                <small class="text-secondary">Tinggi Badan dalam Centimeter</small>
              </div>
              <div class="col-md-5">
                <input type="number" name="berat" class="form-control" placeholder="Berat Badan" value="<?php if(isset($_POST['submit'])) { echo set_value('berat'); }else{ echo $calon_peserta_didik->berat; } ?>" required>
                <small class="text-secondary">Berat Badan dalam Kilogram</small>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Penyakit yang pernah/sedang diderita Calon Peserta Didik</label>
              <div class="col-md-9">
                <textarea name="penyakit_calon_peserta_didik" class="form-control" placeholder="Penyakit yang pernah/sedang diderita Calon Peserta Didik"><?php if(isset($_POST['submit'])) { echo set_value('penyakit_calon_peserta_didik'); }else{ echo $calon_peserta_didik->penyakit_calon_peserta_didik; } ?></textarea>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Hobi Calon Peserta Didik</label>
              <div class="col-md-9">
                <textarea name="hobi_calon_peserta_didik" class="form-control" placeholder="Hobi CALON PESERTA DIDIK"><?php if(isset($_POST['submit'])) { echo set_value('hobi_calon_peserta_didik'); }else{ echo $calon_peserta_didik->hobi_calon_peserta_didik; } ?></textarea>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Apakah Calon Peserta Didik Berkebutuhan Khusus?<span class="text-danger">*</span></label>
              <div class="col-md-9">
                
                 <!-- radio -->
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="berkebutuhan_khusus" value="Tidak"<?php if(set_value('berkebutuhan_khusus')=='Tidak') { echo 'checked'; }elseif($calon_peserta_didik->berkebutuhan_khusus=='Tidak') { echo 'checked'; } else{ echo 'checked'; } ?>>
                      <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="berkebutuhan_khusus" value="Ya" <?php if(set_value('berkebutuhan_khusus')=='Ya') { echo 'checked'; }elseif($calon_peserta_didik->berkebutuhan_khusus=='Ya') { echo 'checked'; } ?>>
                      <label class="form-check-label">Ya</label>
                    </div>
                  </div>

              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Deskripsi Ringkas Tentang Calon Peserta Didik</label>
              <div class="col-md-9">
                <textarea name="isi" class="form-control" placeholder="Deskripsi Ringkas Tentang Calon Peserta Didik"><?php if(isset($_POST['submit'])) { echo set_value('isi'); }else{ echo $calon_peserta_didik->isi; } ?></textarea>
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
                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="<?php if(isset($_POST['submit'])) { echo set_value('nama_ayah'); }else{ echo $calon_peserta_didik->nama_ayah; } ?>" required>
                <small class="text-warning">Nama ayah</small>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Agama Ayah<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <select name="agama_ayah" class="form-control" required><option value="">-- Pilih Agama --</option>
                  <option value="Islam" <?php if($calon_peserta_didik->agama_ayah=='Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Kristen" <?php if($calon_peserta_didik->agama_ayah=='Kristen') echo 'selected'; ?>>Kristen</option>
                  <option value="Katolik" <?php if($calon_peserta_didik->agama_ayah=='Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Hindu" <?php if($calon_peserta_didik->agama_ayah=='Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Buddha" <?php if($calon_peserta_didik->agama_ayah=='Buddha') echo 'selected'; ?>>Buddha</option>
                  <option value="Konghucu" <?php if($calon_peserta_didik->agama_ayah=='Konghucu') echo 'selected'; ?>>Konghucu</option>
                  <option value="Lainnya" <?php if($calon_peserta_didik->agama_ayah=='Lainnya') echo 'selected'; ?>>Lainnya</option></select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Pekerjaan Ayah<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" value="<?php if(isset($_POST['submit'])) { echo set_value('pekerjaan_ayah'); }else{ echo $calon_peserta_didik->pekerjaan_ayah; } ?>" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Pendidikan Ayah<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <select name="jenjang_ayah" class="form-control" required><option value="">-- Pilih Jenjang --</option>
                     <option value="Tidak Sekolah" <?php if($calon_peserta_didik->jenjang_ayah=='Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                     <option value="SD" <?php if($calon_peserta_didik->jenjang_ayah=='SD') echo 'selected'; ?>>SD</option>
                     <option value="SMP/Sederajat" <?php if($calon_peserta_didik->jenjang_ayah=='SMP/Sederajat') echo 'selected'; ?>>SMP/Sederajat</option>
                     <option value="SMA/Sederajat" <?php if($calon_peserta_didik->jenjang_ayah=='SMA/Sederajat') echo 'selected'; ?>>SMA/Sederajat</option>
                     <option value="D1" <?php if($calon_peserta_didik->jenjang_ayah=='D1') echo 'selected'; ?>>D1</option>
                     <option value="D2" <?php if($calon_peserta_didik->jenjang_ayah=='D2') echo 'selected'; ?>>D2</option>
                     <option value="D3" <?php if($calon_peserta_didik->jenjang_ayah=='D3') echo 'selected'; ?>>D3</option>
                     <option value="S1" <?php if($calon_peserta_didik->jenjang_ayah=='S1') echo 'selected'; ?>>S1</option>
                     <option value="S2" <?php if($calon_peserta_didik->jenjang_ayah=='S2') echo 'selected'; ?>>S2</option>
                     <option value="S3" <?php if($calon_peserta_didik->jenjang_ayah=='S3') echo 'selected'; ?>>S3</option></select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Alamat Ayah<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <textarea name="alamat_ayah" placeholder="Alamat Ayah" class="form-control" required><?php if(isset($_POST['submit'])) { echo set_value('alamat_ayah'); }else{ echo $calon_peserta_didik->alamat_ayah; } ?></textarea>
              </div>
            </div>


            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Telepon/HP Ayah<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <input type="text" name="telepon_ayah" class="form-control" placeholder="Telepon/HP Ayah" value="<?php if(isset($_POST['submit'])) { echo set_value('telepon_ayah'); }else{ echo $calon_peserta_didik->telepon_ayah; } ?>" required>
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
                <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value="<?php if(isset($_POST['submit'])) { echo set_value('nama_ibu'); }else{ echo $calon_peserta_didik->nama_ibu; } ?>" required>
                <small class="text-warning">Nama ibu</small>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Agama Ibu<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <select name="agama_ibu" class="form-control" required><option value="">-- Pilih Agama --</option>
                  <option value="Islam" <?php if($calon_peserta_didik->agama_ibu=='Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Kristen" <?php if($calon_peserta_didik->agama_ibu=='Kristen') echo 'selected'; ?>>Kristen</option>
                  <option value="Katolik" <?php if($calon_peserta_didik->agama_ibu=='Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Hindu" <?php if($calon_peserta_didik->agama_ibu=='Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Buddha" <?php if($calon_peserta_didik->agama_ibu=='Buddha') echo 'selected'; ?>>Buddha</option>
                  <option value="Konghucu" <?php if($calon_peserta_didik->agama_ibu=='Konghucu') echo 'selected'; ?>>Konghucu</option>
                  <option value="Lainnya" <?php if($calon_peserta_didik->agama_ibu=='Lainnya') echo 'selected'; ?>>Lainnya</option></select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Pekerjaan Ibu<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" value="<?php if(isset($_POST['submit'])) { echo set_value('pekerjaan_ibu'); }else{ echo $calon_peserta_didik->pekerjaan_ibu; } ?>" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Pendidikan Ibu<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <select name="jenjang_ibu" class="form-control" required><option value="">-- Pilih Jenjang --</option>
                     <option value="Tidak Sekolah" <?php if($calon_peserta_didik->jenjang_ibu=='Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                     <option value="SD" <?php if($calon_peserta_didik->jenjang_ibu=='SD') echo 'selected'; ?>>SD</option>
                     <option value="SMP/Sederajat" <?php if($calon_peserta_didik->jenjang_ibu=='SMP/Sederajat') echo 'selected'; ?>>SMP/Sederajat</option>
                     <option value="SMA/Sederajat" <?php if($calon_peserta_didik->jenjang_ibu=='SMA/Sederajat') echo 'selected'; ?>>SMA/Sederajat</option>
                     <option value="D1" <?php if($calon_peserta_didik->jenjang_ibu=='D1') echo 'selected'; ?>>D1</option>
                     <option value="D2" <?php if($calon_peserta_didik->jenjang_ibu=='D2') echo 'selected'; ?>>D2</option>
                     <option value="D3" <?php if($calon_peserta_didik->jenjang_ibu=='D3') echo 'selected'; ?>>D3</option>
                     <option value="S1" <?php if($calon_peserta_didik->jenjang_ibu=='S1') echo 'selected'; ?>>S1</option>
                     <option value="S2" <?php if($calon_peserta_didik->jenjang_ibu=='S2') echo 'selected'; ?>>S2</option>
                     <option value="S3" <?php if($calon_peserta_didik->jenjang_ibu=='S3') echo 'selected'; ?>>S3</option></select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Alamat Ibu<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <textarea name="alamat_ibu" placeholder="Alamat Ibu" class="form-control" required><?php if(isset($_POST['submit'])) { echo set_value('alamat_ibu'); }else{ echo $calon_peserta_didik->alamat_ibu; } ?></textarea>
              </div>
            </div>


            <div class="form-group row mb-3">
              <label class="col-md-3 text-dark">Telepon/HP Ibu<span class="text-danger">*</span></label>
              <div class="col-md-9">
                <input type="text" name="telepon_ibu" class="form-control" placeholder="Telepon/HP Ibu" value="<?php if(isset($_POST['submit'])) { echo set_value('telepon_ibu'); }else{ echo $calon_peserta_didik->telepon_ibu; } ?>" required>
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
              <label class="col-md-3 text-dark">Identitas Wali Murid</label>
              <div class="col-md-9">
                
                <!-- radio -->
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="identitas_wali" value="Ayah"  onchange="updateWali()" <?php if(set_value('identitas_wali')=='Ayah') { echo 'checked'; }elseif($calon_peserta_didik->identitas_wali=='Ayah') { echo 'checked'; } ?> required>
                    <label class="form-check-label">Sama dengan Ayah</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="identitas_wali" value="Ibu" onchange="updateWali()" <?php if(set_value('identitas_wali')=='Ibu') { echo 'checked'; }elseif($calon_peserta_didik->identitas_wali=='Ibu') { echo 'checked'; } ?> required>
                    <label class="form-check-label">Sama dengan Ibu</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="identitas_wali" value="Berbeda" onchange="updateWali()" <?php if(set_value('identitas_wali')=='Berbeda') { echo 'checked'; }elseif($calon_peserta_didik->identitas_wali=='Berbeda') { echo 'checked'; } ?> required>
                    <label class="form-check-label">Berbeda dengan Ayah dan Ibu</label>
                  </div>
                </div>

              </div>
            </div>

            <div id="myDIV">

              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Nama Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input type="text" name="nama_wali" class="form-control" placeholder="Nama Wali" value="<?php if(isset($_POST['submit'])) { echo set_value('nama_wali'); }else{ echo $calon_peserta_didik->nama_wali; } ?>" required>
                  <small class="text-warning">Nama wali</small>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Agama Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <select name="agama_wali" class="form-control" required><option value="">-- Pilih Agama --</option>
                  <option value="Islam" <?php if($calon_peserta_didik->agama_wali=='Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Kristen" <?php if($calon_peserta_didik->agama_wali=='Kristen') echo 'selected'; ?>>Kristen</option>
                  <option value="Katolik" <?php if($calon_peserta_didik->agama_wali=='Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Hindu" <?php if($calon_peserta_didik->agama_wali=='Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Buddha" <?php if($calon_peserta_didik->agama_wali=='Buddha') echo 'selected'; ?>>Buddha</option>
                  <option value="Konghucu" <?php if($calon_peserta_didik->agama_wali=='Konghucu') echo 'selected'; ?>>Konghucu</option>
                  <option value="Lainnya" <?php if($calon_peserta_didik->agama_wali=='Lainnya') echo 'selected'; ?>>Lainnya</option></select>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Pekerjaan Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan Wali" value="<?php if(isset($_POST['submit'])) { echo set_value('pekerjaan_wali'); }else{ echo $calon_peserta_didik->pekerjaan_wali; } ?>" required>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Pendidikan Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <select name="jenjang_wali" class="form-control" required><option value="">-- Pilih Jenjang --</option>
                     <option value="Tidak Sekolah" <?php if($calon_peserta_didik->jenjang_wali=='Tidak Sekolah') echo 'selected'; ?>>Tidak Sekolah</option>
                     <option value="SD" <?php if($calon_peserta_didik->jenjang_wali=='SD') echo 'selected'; ?>>SD</option>
                     <option value="SMP/Sederajat" <?php if($calon_peserta_didik->jenjang_wali=='SMP/Sederajat') echo 'selected'; ?>>SMP/Sederajat</option>
                     <option value="SMA/Sederajat" <?php if($calon_peserta_didik->jenjang_wali=='SMA/Sederajat') echo 'selected'; ?>>SMA/Sederajat</option>
                     <option value="D1" <?php if($calon_peserta_didik->jenjang_wali=='D1') echo 'selected'; ?>>D1</option>
                     <option value="D2" <?php if($calon_peserta_didik->jenjang_wali=='D2') echo 'selected'; ?>>D2</option>
                     <option value="D3" <?php if($calon_peserta_didik->jenjang_wali=='D3') echo 'selected'; ?>>D3</option>
                     <option value="S1" <?php if($calon_peserta_didik->jenjang_wali=='S1') echo 'selected'; ?>>S1</option>
                     <option value="S2" <?php if($calon_peserta_didik->jenjang_wali=='S2') echo 'selected'; ?>>S2</option>
                     <option value="S3" <?php if($calon_peserta_didik->jenjang_wali=='S3') echo 'selected'; ?>>S3</option></select>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Alamat Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <textarea name="alamat_wali" placeholder="Alamat Wali" class="form-control" required><?php if(isset($_POST['submit'])) { echo set_value('alamat_wali'); }else{ echo $calon_peserta_didik->alamat_wali; } ?></textarea>
                </div>
              </div>


              <div class="form-group row mb-3">
                <label class="col-md-3 text-dark">Telepon/HP Wali<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input type="text" name="telepon_wali" class="form-control" placeholder="Telepon/HP Wali" value="<?php if(isset($_POST['submit'])) { echo set_value('telepon_wali'); }else{ echo $calon_peserta_didik->telepon_wali; } ?>" required>
                </div>
              </div>
            </div>

          </div>
          <div class="card-footer bg-light text-right border-top">
            <div class="form-group row mb-3">
                <label class="col-md-3 text-dark"></label>
                <div class="col-md-9">
                  <button type="submit" class="btn btn-success text-white" name="submit" value="submit"><i class="fa fa-save"></i>&nbsp;Simpan dan Update Pendaftaran</button>
                </div>
              </div>
          </div>
        </div>


        <?php echo form_close(); ?>

        <script>
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

        document.addEventListener("DOMContentLoaded", function() {
          updateWali();
        });
        </script>