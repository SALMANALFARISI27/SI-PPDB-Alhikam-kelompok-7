<p class="text-center">
	Halo <strong><?php echo $user->nama ?></strong>.<br> Silakan ganti password Anda. Password minimal 6 dan maksimal 32 karakter
</p>

<?php 
$validation = \Config\Services::validation();
$errors = $validation->getErrors();
if(!empty($errors))
{
	echo '<span class="text-danger">'.$validation->listErrors().'</span>';
}
?>

<?php echo form_open(base_url('login/reset/' . $kode_rahasia)); ?>



<div class="form-group">
	<div class="input-group">
		<input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password Baru" minlength="6" maxlength="32">
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
				<i class="fas fa-eye"></i>
			</button>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="input-group">
		<input type="password" name="password_konfirmasi" class="form-control form-control-user" id="password_konfirmasi" placeholder="Konfirmasi Password" minlength="6" maxlength="32">
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_konfirmasi', this)">
				<i class="fas fa-eye"></i>
			</button>
		</div>
	</div>
	<div id="konfirmasiError">
		
	</div>
</div>


<div class="form-group mt-1">
	<button type="submit" class="btn btn-user btn-block" style="background-color: black; border-color: black; color: white;">
		Ganti password
	</button>

</div>

<hr>
<p class="text-center">Sudah Punya Akun? <a href="<?php echo base_url('login') ?>" style="color: black; font-weight: bold;">Login</a></p>

<?php echo form_close(); ?>
<?php if (session()->has('sukses')) : ?>
<div class="alert alert-success mt-3" role="alert">
	<?php echo session('sukses'); ?>
</div>
<?php elseif (session()->has('error')) : ?>
<div class="alert alert-danger mt-3" role="alert">
	<?php echo session('error'); ?>
</div>
<?php endif; ?>

<script>
function togglePassword(inputId, btn) {
	var input = document.getElementById(inputId);
	var icon = btn.querySelector('i');
	if (input.type === 'password') {
		input.type = 'text';
		icon.classList.remove('fa-eye');
		icon.classList.add('fa-eye-slash');
	} else {
		input.type = 'password';
		icon.classList.remove('fa-eye-slash');
		icon.classList.add('fa-eye');
	}
}
</script>