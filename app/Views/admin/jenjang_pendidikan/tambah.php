<p class="text-right">
	<a href="<?php echo base_url('admin/jenjang_pendidikan') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/jenjang_pendidikan/tambah') ?>" method="post" accept-charset="utf-8"
	enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-2">Nama Jenjang Pendidikan <span class="text-danger">*</span></label>
		<div class="col-md-10">
			<input type="text" name="judul_jenjang_pendidikan" class="form-control"
				value="<?php echo set_value('judul_jenjang_pendidikan') ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Upload Gambar Jenjang Pendidikan</label>
		<div class="col-md-10">
			<input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar') ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Jenis &amp; Status <span class="text-danger">*</span></label>
		<div class="col-md-2">
			<select name="jenis_jenjang_pendidikan" class="form-control">
				<option value="Formal">Formal</option>
				<option value="Non Formal">Non Formal</option>
			</select>
			<small class="text-secondary">Jenis Pendidikan</small>
		</div>
		<div class="col-md-2">
			<select name="status_jenjang_pendidikan" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
			<small class="text-secondary">Status publikasi</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Tanggal, jam Publikasi &amp; Urutan</label>
		<div class="col-md-3">
			<input type="text" name="tanggal_publish" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_publis'])) {
				echo set_value('tanggal_publish');
			} else {
				echo date('d-m-Y');
			} ?>">
			<small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?php echo date('d-m-Y') ?></small>
		</div>
		<div class="col-md-3">
			<input type="text" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
				echo set_value('jam');
			} else {
				echo date('H:i:s');
			} ?>">
			<small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?php echo date('H:i:s') ?></small>
		</div>
		<div class="col-md-3">
			<input type="number" name="urutan" class="form-control" value="<?php if (isset($_POST['urutan'])) {
				echo set_value('urutan');
			} else {
				echo 0;
			} ?>">
			<small class="text-secondary">Nomor urut tampil</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Ringkasan</label>
		<div class="col-md-10">
			<textarea name="ringkasan" class="form-control"><?php echo set_value('ringkasan') ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Isi Jenjang Pendidikan <span class="text-danger">*</span></label>
		<div class="col-md-10">

			<textarea name="isi" class="form-control konten"><?php echo set_value('isi') ?></textarea>
		</div>
	</div>



	<div class="form-group row">
		<label class="col-md-2"></label>
		<div class="col-md-10">
			<a href="<?php echo base_url('admin/jenjang_pendidikan') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="reset" class="btn btn-secondary"><i class="fa fa-times"></i> Reset</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php
	echo form_close();
	?>