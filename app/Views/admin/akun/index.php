<div class="row">
	<div class="col-md-7" id="pwd">
		<div class="card">
			<div class="card-header" id="user">
				<h4>Update Profil User</h4>
			</div>
			<div class="card-body">
				<?php 
				echo form_open_multipart(base_url('admin/akun')); 
				echo csrf_field(); 
				?>

		<p class="text-center mt-2">
    <?php 
    $gambar = base_url('assets/admin/dist/img/user4-128x128.jpg'); // default gambar
    
    if($user->gambar != '') {
        // Cek file di dalam FCPATH
        $img_dipublic = FCPATH . 'assets/upload/image/' . $user->gambar;
        $img_diluar = FCPATH . '' . $user->gambar;
        
        // Jika file tidak ada di dalam tetapi ada di luar, copy ke dalam
        if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
            @copy($img_diluar, $img_dipublic);
        }
        
        // Set gambar jika file exists
        if (file_exists($img_dipublic)) {
            $gambar = base_url('assets/upload/image/' . $user->gambar);
        }
    }
    ?>
    <img class="profile-user-img img-fluid img-circle" src="<?php echo $gambar ?>" alt="<?php echo $user->nama ?>" style="width: 100px; height: 100px;">
</p>

				<div class="form-group row">
					<label class="col-3">Nama Pengguna</label>
					<div class="col-9">
						<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user->nama ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Email</label>
					<div class="col-9">
						<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Upload Foto</label>
					<div class="col-9">
						<input type="file" name="gambar" class="form-control" placeholder="Upload foto" value="<?php echo $user->gambar ?>">
						<small class="text-gray">Format: jpg, png, gif</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Username</label>
					<div class="col-9">
						<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3"></label>
					<div class="col-9">
						<button type="submit" name="user" value="Update User" class="btn btn-success"><i class="fa fa-save"></i> Update Akun</button>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h4>Ganti Password</h4>
			</div>
			<div class="card-body">
				<?php 
				echo form_open_multipart(base_url('admin/akun')); 
				echo csrf_field(); 
				?>
				<input type="hidden" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user->nama ?>">
				<div class="form-group row">
					<label class="col-4">Password baru</label>
					<div class="col-8">
						<input type="password" name="password" class="form-control" placeholder="Password baru" minlength="6" maxlength="32" value="" required>
						<small class="text-danger">Minimal 6 dan maksimal 32 karakter</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-4">Konfirmasi Password baru</label>
					<div class="col-8">
						<input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password baru" minlength="6" maxlength="32" value="" required>
						<small class="text-danger">Konfirmasi Password. Minimal 6 dan maksimal 32 karakter</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-4"></label>
					<div class="col-8">
						<button type="submit" name="pwd" value="Update password" class="btn btn-success"><i class="fa fa-save"></i> Update Password</button>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>

	</div>


	
</div>