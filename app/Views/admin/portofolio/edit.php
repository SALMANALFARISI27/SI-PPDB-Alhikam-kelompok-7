<p class="text-right">
	<a href="<?php echo base_url('admin/portofolio') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/portofolio/edit/' . $portofolio->id_portofolio) ?>" method="post"
	accept-charset="utf-8" enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-3">Judul Portofolio</label>
		<div class="col-md-9">
			<input type="text" name="judul_portofolio" class="form-control"
				value="<?php echo $portofolio->judul_portofolio ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Upload Gambar Portofolio</label>
		<div class="col-md-8">
			<input type="file" name="gambar" class="form-control" value="<?php echo $portofolio->gambar ?>">
		</div>
		<div class="col-md-1">
			<img src="<?php echo base_url('assets/upload/image/thumbs/' . $portofolio->gambar) ?>"
				class="img img-thumbnail">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Status Portofolio</label>
		<div class="col-md-2">
			<select name="status_portofolio" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($portofolio->status_portofolio == "Draft") {
					echo 'selected';
				} ?>>Draft
				</option>
			</select>
			<small class="text-secondary">Status Tampil</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Tanggal &amp; jam Publikasi</label>
		<div class="col-md-3">
			<input type="text" name="tanggal_publish" class="form-control tanggal" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y', strtotime($portofolio->tanggal_post ? $portofolio->tanggal_post : $portofolio->tanggal)); } ?>">
			<small class="text-secondary">Format <strong>dd-mm-yyyy</strong></small>
		</div>
		<div class="col-md-3">
			<input type="text" name="jam" class="form-control jam" value="<?php if(isset($_POST['jam'])) { echo set_value('jam'); }else{ echo date('H:i:s', strtotime($portofolio->tanggal_post ? $portofolio->tanggal_post : $portofolio->tanggal)); } ?>">
			<small class="text-secondary">Format <strong>HH:MM:SS</strong></small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Isi Portofolio</label>
		<div class="col-md-9">
			<textarea name="isi" class="form-control konten"><?php echo $portofolio->isi ?></textarea>
		</div>
	</div>




	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="<?php echo base_url('admin/portofolio') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>