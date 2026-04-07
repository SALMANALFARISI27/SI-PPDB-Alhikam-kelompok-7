<p class="text-right">
	<a href="<?php echo base_url('admin/user') ?>" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
<hr>

<?php
echo form_open(base_url('admin/user/edit/' . $user->id_admin));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Pengguna</label>
	<div class="col-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user->nama ?>"
			required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Email</label>
	<div class="col-9">
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>"
			required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Username</label>
	<div class="col-9">
		<input type="text" name="username" class="form-control" placeholder="Username"
			value="<?php echo $user->username ?>" readonly>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Password Baru</label>
	<div class="col-9">
		<input type="text" name="password" class="form-control" placeholder="Masukan Password Baru" value="">
		<small class="text-danger">Minimal 6 karakter dan maksimal 32 karakter atau biarkan kosong</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<a href="<?php echo base_url('admin/user') ?>" class="btn btn-outline-info">
			<i class="fa fa-arrow-left"></i> Kembali
		</a>
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>