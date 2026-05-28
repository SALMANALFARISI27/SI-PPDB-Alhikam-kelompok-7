<p class="text-right">
	<a href="<?php echo base_url('admin/ekstrakurikuler') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/ekstrakurikuler/tambah') ?>" method="post" accept-charset="utf-8"
	enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-2">Judul Ekstrakurikuler</label>
		<div class="col-md-10">
			<input type="text" name="judul_ekstrakurikuler" class="form-control"
				value="<?php echo set_value('judul_ekstrakurikuler') ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Nama Penanggung Jawab</label>
		<div class="col-md-6">
			<input type="text" name="nama_penanggung_jawab" class="form-control"
				value="<?php echo set_value('nama_penanggung_jawab') ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Upload Gambar Ekstrakurikuler</label>
		<div class="col-md-6">
			<input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar') ?>">
		</div>
	</div>


	<div class="form-group row">
		<label class="col-md-2">Status</label>
		<div class="col-md-2">
			<select name="status_ekstrakurikuler" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
			<small class="text-secondary">Status Tampil</small>
		</div>

	</div>

	<div class="form-group row">
		<label class="col-md-2">Isi Ekstrakurikuler</label>
		<div class="col-md-10">
			<textarea name="isi" class="form-control konten"><?php echo set_value('isi') ?></textarea>
		</div>
	</div>



	<div class="form-group row">
		<label class="col-md-2"></label>
		<div class="col-md-10">
			<a href="<?php echo base_url('admin/ekstrakurikuler') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>