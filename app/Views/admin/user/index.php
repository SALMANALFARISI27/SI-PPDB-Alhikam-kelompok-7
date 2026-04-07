<?php include('tambah.php'); ?>

<div class="table-responsive">
	<table class="table table-bordered table-sm table-hover" id="example2">
		<thead>
			<tr class="bg-secondary text-center">
				<th width="5%">No</th>
				<th width="40%">Nama</th>
				<th width="40%">Username</th>
				<th width="15%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($user as $user) { ?>
				<tr>
					<td class="text-center"><?php echo $no ?></td>
					<td><?php echo htmlspecialchars($user->nama) ?></td>
					<td><?php echo htmlspecialchars($user->username) ?></td>
					<td class="text-center">
						<a href="<?php echo base_url('admin/user/edit/' . $user->id_admin) ?>"
							class="btn btn-secondary btn-xs"><i class="fa fa-edit"></i></a>
						<a href="<?php echo base_url('admin/user/delete/' . $user->id_admin) ?>"
							class="btn btn-secondary btn-xs delete-link"
							onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php $no++;
			} ?>
		</tbody>
	</table>
</div>

<style>
	.table td {
		vertical-align: middle;
	}

	.btn-xs {
		padding: 2px 8px;
		font-size: 11px;
	}
</style>