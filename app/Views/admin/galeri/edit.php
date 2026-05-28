<p class="text-right">
	<a href="<?php echo base_url('admin/galeri') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/galeri/edit/' . $galeri->id_galeri) ?>" method="post" accept-charset="utf-8"
	enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-3">Judul Galeri</label>
		<div class="col-md-9">
			<input type="text" name="judul_galeri" class="form-control" value="<?php echo $galeri->judul_galeri ?>"
				required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Upload Gambar Galeri</label>
		<div class="col-md-8">
			<input type="file" name="gambar" class="form-control" value="<?php echo $galeri->gambar ?>">
		</div>
		<div class="col-md-1">
			<img src="<?php echo base_url('assets/upload/image/thumbs/' . $galeri->gambar) ?>"
				class="img img-thumbnail">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">URL Video (Youtube)</label>
		<div class="col-md-9">
			<input type="text" name="url_video" class="form-control" value="<?php echo $galeri->url_video ?>">
			<small class="text-secondary">Contoh: https://www.youtube.com/watch?v=xyz</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Jenis &amp; Status</label>
		<div class="col-md-3">
			<select name="jenis_galeri" class="form-control">
				<option value="Foto">Foto</option>
				<option value="Video" <?php if ($galeri->jenis_galeri == "Video") {
					echo 'selected';
				} ?>>Video</option>
			</select>
			<small class="text-secondary">Jenis konten</small>
		</div>
		<div class="col-md-3">
			<select name="status_galeri" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($galeri->status_galeri == "Draft") {
					echo 'selected';
				} ?>>Draft</option>
			</select>
			<small class="text-secondary">Status Galeri</small>
		</div>

	</div>

	<div class="form-group row">
		<label class="col-md-3">Isi Galeri</label>
		<div class="col-md-9">
			<textarea name="isi" class="form-control konten"><?php echo $galeri->isi ?></textarea>
		</div>
	</div>



	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="<?php echo base_url('admin/galeri') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>