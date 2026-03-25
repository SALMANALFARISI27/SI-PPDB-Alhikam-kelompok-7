<form action="<?php echo base_url('admin/konfigurasi/login') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
<div class="form-group row">
	<label class="col-3">Upload Background Login Baru</label>
	<div class="col-6">
		<input type="file" name="login" value="<?php echo $konfigurasi->login ?>" class="form-control">
		<small class="text-secondary">Format: JPG, PNG, GIF</small>
		<br>
		<button type="submit" class="btn btn-success mt-2"><i class="fa fa-save"></i> Simpan</button>
	</div>
	<div class="col-3">
		<?php if($konfigurasi->login=="") { echo '-'; }else{ 
			$img_dipublic = FCPATH . 'assets/upload/image/' . $konfigurasi->login;
			$img_diluar = FCPATH . '../assets/upload/image/' . $konfigurasi->login;
			if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
			    @copy($img_diluar, $img_dipublic);
			}
		?>
			<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->login) ?>" class="img img-thumbnail">
		<?php } ?>
	</div>
</div>



<?php echo form_close(); ?>