<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example1">
	<thead>
		<tr class="bg-secondary text-center">
			<th width="5%">No</th>
			<th width="20%">Nama</th>
			<th width="20%">Username</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($user as $user) { ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->username ?></td>
			<td>
				<a href="<?php echo base_url('admin/user/edit/'.$user->id_admin) ?>" class="btn btn-secondary btn-xs mb-1"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/user/delete/'.$user->id_admin) ?>" class="btn btn-secondary btn-sm delete-link"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>