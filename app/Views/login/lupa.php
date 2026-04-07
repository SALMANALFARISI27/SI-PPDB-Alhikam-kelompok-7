

	<?php 
	$validation = \Config\Services::validation();
	$errors = $validation->getErrors();
	if(!empty($errors))
	{
		echo '<span class="text-danger">'.$validation->listErrors().'</span>';
	}
	?>

	<?php if (session('msg')) : ?>
		<div class="alert alert-info alert-dismissible">
			<?= session('msg') ?>
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		</div>
	<?php endif ?>

	<?php echo form_open(base_url('login/lupa'), 'class="signin-form"'); ?>

	<input type="hidden" name="pengalihan" value="<?php echo Session()->get('pengalihan'); ?>">

	<div class="form-group mb-3">
		<label class="label" for="name">Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" required>
	</div>

	<div class="form-group">
		<button type="submit" class="form-control btn submit px-3" style="background-color: black; border-color: black; color: white;">Reset Password</button>
	</div>
	
	<p class="text-center">
		Kembali ke <a href="<?php echo base_url() ?>" style="color: black; font-weight: bold;">Beranda</a> | <a href="<?php echo base_url('login') ?>" style="color: black; font-weight: bold;">Login</a>
	</p>

<?php echo form_close(); ?>


