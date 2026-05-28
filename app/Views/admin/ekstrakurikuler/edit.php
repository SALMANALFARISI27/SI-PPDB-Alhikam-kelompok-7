<p class="text-right">
	<a href="<?php echo base_url('admin/ekstrakurikuler') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/ekstrakurikuler/edit/' . $ekstrakurikuler->id_ekstrakurikuler) ?>" method="post"
	accept-charset="utf-8" enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-2">Judul Ekstrakurikuler</label>
		<div class="col-md-10">
			<input type="text" name="judul_ekstrakurikuler" class="form-control"
				value="<?php echo $ekstrakurikuler->judul_ekstrakurikuler ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Nama Penanggung Jawab</label>
		<div class="col-md-6">
			<input type="text" name="nama_penanggung_jawab" class="form-control"
				value="<?php echo $ekstrakurikuler->nama_penanggung_jawab ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Upload Gambar Ekstrakurikuler</label>
		<div class="col-md-5">
			<input type="file" name="gambar" class="form-control" value="<?php echo $ekstrakurikuler->gambar ?>">
		</div>
		<div class="col-md-1">
			<?php if ($ekstrakurikuler->gambar == "") {
				echo '-';
			} else {
				$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $ekstrakurikuler->gambar;
				$img_diluar = FCPATH . 'thumbs/' . $ekstrakurikuler->gambar;
				if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
					@copy($img_diluar, $img_dipublic);
				}
				?>
				<img src="<?php echo base_url('assets/upload/image/thumbs/' . $ekstrakurikuler->gambar) ?>"
					class="img img-thumbnail">
			<?php } ?>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Status</label>
		<div class="col-md-2">
			<select name="status_ekstrakurikuler" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($ekstrakurikuler->status_ekstrakurikuler == "Draft") {
					echo 'selected';
				} ?>>Draft</option>
			</select>
			<small class="text-secondary">Status Tampil</small>
		</div>

	</div>

	<div class="form-group row">
		<label class="col-md-2">Isi Ekstrakurikuler</label>
		<div class="col-md-10">
			<textarea name="isi" class="form-control konten"><?php echo $ekstrakurikuler->isi ?></textarea>
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