<p class="text-right">
	<a href="<?php echo base_url('admin/portfolio') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<form action="<?php echo base_url('admin/portfolio/tambah') ?>" method="post" accept-charset="utf-8"
	enctype="multipart/form-data">
	<?php
	echo csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-3">Judul Portfolio</label>
		<div class="col-md-9">
			<input type="text" name="judul_portfolio" class="form-control"
				value="<?php echo set_value('judul_portfolio') ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Upload Gambar Portfolio</label>
		<div class="col-md-9">
			<input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar') ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Kategori, &amp; Status</label>
		<div class="col-md-3">
			<select name="id_kategori_portfolio" class="form-control">
				<?php foreach ($kategori_portfolio as $kategori_portfolio) { ?>
					<option value="<?php echo $kategori_portfolio->id_kategori_portfolio ?>">
						<?php echo $kategori_portfolio->nama_kategori_portfolio ?>
					</option>
				<?php } ?>
			</select>
			<small class="text-secondary">Kategori</small>
		</div>

		<div class="col-md-2">
			<select name="status_portfolio" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
			<small class="text-secondary">status_portfolio</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3">Isi Portfolio</label>
		<div class="col-md-9">
			<textarea name="isi" class="form-control konten"><?php echo set_value('isi') ?></textarea>
		</div>
	</div>





	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-9">
			<a href="<?php echo base_url('admin/portfolio') ?>" class="btn btn-outline-info">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?php echo form_close(); ?>