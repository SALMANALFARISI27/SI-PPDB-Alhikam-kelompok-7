<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-light">
				<strong>DETAIL AKUN</strong>
			</div>
			<div class="card-body">

				<table class="table table-sm table-bordered">
					<thead>
						<tr>
							<th>Username</th>
							<th><?php echo $akun->username ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Email</td>
							<td><?php echo $akun->email ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><?php echo $akun->status_akun ?></td>
						</tr>
						<tr>
							<td>Jenis</td>
							<td><?php echo $akun->jenis_akun ?></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><?php echo $akun->telepon ?></td>
						</tr>

					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="col-md-7">
		<div class="card">
			<div class="card-header bg-light">
				<strong>UPDATE AKUN</strong>
			</div>
			<div class="card-body">
				<?php echo form_open(base_url('calon_peserta_didik/akun')) ?>
				<div class="form-group mb-4">
					<input type="text" class="form-control" name="username" value="<?php echo $akun->username ?>"
						placeholder="Name" id="loginName">
					<label for="loginName" class="text-primary">Username</label>
				</div>

				<div class="form-group mb-4">
					<input type="email" class="form-control" name="email" value="<?php echo $akun->email ?>"
						placeholder="Email" id="loginEmail">
					<label for="loginEmail" class="text-primary">Email</label>
				</div>


				<div class="form-group mb-4">
					<label for="loginPassword" class="text-primary">Password baru minimal 6 dan maksimal 32
						karakter</label>
					<div class="input-group">
						<input type="password" class="form-control" name="password" placeholder="Password"
							id="loginPassword" minlength="6" maxlength="32">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button"
								onclick="togglePassword('loginPassword', this)">
								<i class="fas fa-eye"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="form-group mb-4">
					<label for="loginPasswordConfirm" class="text-primary">Konfirmasi Password</label>
					<div class="input-group">
						<input type="password" class="form-control" name="konfirmasi_password"
							placeholder="Konfirmasi Password" id="loginPasswordConfirm" minlength="6" maxlength="32">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button"
								onclick="togglePassword('loginPasswordConfirm', this)">
								<i class="fas fa-eye"></i>
							</button>
						</div>
					</div>
				</div>


				<div class="form-group mb-4">
					<input type="text" class="form-control" name="telepon" value="<?php echo $akun->telepon ?>"
						placeholder="Telepon/HP" id="Telepon">
					<label for="loginEmail" class="text-primary">Telepon/HP</label>
				</div>



				<p>
					<button type="submit" name="submit" value="submit"
						class="btn btn-primary rounded-pill btn-login w-60 mb-2">Update Akun &nbsp; <i
							class="fa fa-arrow-circle-right"></i></button>
				</p>
				</form>
			</div>
		</div>
	</div>
</div>

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