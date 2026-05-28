<p class="text-right">
	<a href="<?php echo base_url('admin/fasilitas') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/fasilitas/edit/' . $fasilitas->id_fasilitas) ?>" method="post"
	accept-charset="utf-8" enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-3">Judul/Nama Fasilitas</label>
		<div class="col-md-9">
			<input type="text" name="judul_fasilitas" class="form-control"
				value="<?php echo $fasilitas->judul_fasilitas ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Kode/Nomor Fasilitas</label>
		<div class="col-md-6">
			<input type="text" name="kode_nomor_fasilitas" class="form-control"
				value="<?php echo $fasilitas->kode_nomor_fasilitas ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Upload Gambar Fasilitas</label>
		<div class="col-md-5">
			<input type="file" name="gambar" class="form-control" value="<?php echo $fasilitas->gambar ?>">
		</div>
		<div class="col-md-1">
			<img src="<?php echo base_url('assets/upload/image/thumbs/' . $fasilitas->gambar) ?>"
				class="img img-thumbnail">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Kondisi, Tahun &amp; Tanggal</label>
		<div class="col-md-2">
			<select name="kondisi_fasilitas" class="form-control">
				<option value="Baik">Baik</option>
				<option value="Rusak" <?php if ($fasilitas->kondisi_fasilitas == "Rusak") {
					echo 'selected';
				} ?>>Rusak
				</option>
				<option value="Hilang" <?php if ($fasilitas->kondisi_fasilitas == "Hilang") {
					echo 'selected';
				} ?>>Hilang
				</option>
			</select>
			<small class="text-secondary">Kondisi Fasilitas</small>
		</div>

		<div class="col-md-2">
			<input type="text" name="tanggal_fasilitas" class="form-control tanggal"
				value="<?php echo $this->website->tanggal_id($fasilitas->tanggal_fasilitas) ?>">
			<small class="text-secondary">Tahun dan Tanggal Fasilitas</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Status</label>
		<div class="col-md-2">
			<select name="status_fasilitas" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($fasilitas->status_fasilitas == "Draft") {
					echo 'selected';
				} ?>>Draft
				</option>
			</select>
			<small class="text-secondary">Status Tampil</small>
		</div>

	</div>

	<div class="form-group row">
		<label class="col-md-3">Isi Fasilitas</label>
		<div class="col-md-9">

			<textarea name="isi" class="form-control konten"><?php echo $fasilitas->isi ?></textarea>
		</div>
	</div>



	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="<?php echo base_url('admin/fasilitas') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>