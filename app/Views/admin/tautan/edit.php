<?php echo form_open_multipart(base_url('admin/tautan/edit/'.$tautan->id_tautan)) ?>

<div class="form-group row">
	<label class="col-3">Nama Tautan</label>
	<div class="col-9">
		<input type="text" name="nama_tautan" class="form-control" placeholder="Nama tautan" value="<?php echo $tautan->nama_tautan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Link Website</label>
	<div class="col-9">
		<input type="url" name="link_tautan" class="form-control" placeholder="Alamat website" value="<?php echo $tautan->link_tautan ?>" required>
		<small class="text-secondary">Format: <strong><?php echo base_url() ?></strong></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Metode & Status Tautan</label>
	<div class="col-6">
		<select name="metode_tautan" class="form-control">
			<option value="_self">_self (Di jendela yang sama)</option>
			<option value="_blank" <?php if($tautan->metode_tautan=="_blank") { echo 'selected'; } ?>>_blank (Membuka tab baru)</option>
		</select>
		<small class="text-secondary">Target Link</small>
	</div>
	<div class="col-3">
		<select name="status_tautan" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft" <?php if($tautan->status_tautan=="Draft") { echo 'selected'; } ?>>Draft</option>
		</select>
		<small class="text-secondary">Status Tautan</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Gambar/ Logo</label>
	
	<div class="col-8">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar/ Logo" value="<?php echo $tautan->gambar ?>">
	</div>
	<div class="col-1">
		<?php if($tautan->gambar=="") { echo '-'; }else{ 
			$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $tautan->gambar;
			$img_diluar = FCPATH . 'thumbs/' . $tautan->gambar;
			if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
			    @copy($img_diluar, $img_dipublic);
			}
		?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$tautan->gambar) ?>" class="img img-thumbnail">
				<?php } ?>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Keterangan</label>
	<div class="col-9">
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo $tautan->keterangan ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Urutan</label>
	<div class="col-9">
		<input type="number" name="urutan" class="form-control" placeholder="Nomor urut tampil" value="<?php echo $tautan->urutan ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<a href="<?php echo base_url('admin/tautan/') ?>" class="btn btn-default">
			<i class="fa fa-arrow-left"></i> Kembali
		</a>
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>


<?php echo form_close(); ?>