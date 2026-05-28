<form action="<?php echo base_url('admin/unduhan/tambah') ?>" method="post" accept-charset="utf-8"
	enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-3">Judul Unduhan</label>
		<div class="col-md-9">
			<input type="text" name="judul_unduhan" class="form-control"
				value="<?php echo set_value('judul_unduhan') ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Upload File</label>
		<div class="col-md-9">
			<input type="file" name="file" class="form-control" value="<?php echo set_value('file') ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Status</label>

		<div class="col-md-2">
			<select name="status_unduhan" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
			<small class="text-secondary">Status tampil</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Isi Unduhan</label>
		<div class="col-md-9">
			<textarea name="isi" class="form-control konten"><?php echo set_value('isi') ?></textarea>
		</div>
	</div>



	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="<?php echo base_url('admin/unduhan') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="reset" class="btn btn-secondary"><i class="fa fa-times"></i> Reset</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>