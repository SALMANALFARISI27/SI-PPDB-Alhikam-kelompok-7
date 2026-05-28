<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example3">
	<thead>
		<tr class="bg-secondary text-center">
			<th width="5%">No</th>
			<th width="10%">Gambar</th>
			<th width="30%">Nama</th>
			<th width="20%">Keterangan</th>
			<th width="10%">Status</th>
			<th width="10%">Urutan</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($tautan as $tautan) {
			?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td class="text-center">
					<?php if ($tautan->gambar == "") {
						echo '-';
					} else {
						$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $tautan->gambar;
						$img_diluar = FCPATH . 'thumbs/' . $tautan->gambar;
						if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
							@copy($img_diluar, $img_dipublic);
						}
						?>
						<img src="<?php echo base_url('assets/upload/image/thumbs/' . $tautan->gambar) ?>"
							class="img img-thumbnail">
					<?php } ?>
				</td>
				<td><?php echo $tautan->nama_tautan ?>
					<small>
						<br><i class="fa fa-link"></i> <?php echo $tautan->link_tautan ?>
						<br><i class="fa fa-globe"></i> <?php echo $tautan->metode_tautan ?>
					</small>
				</td>
				<td><?php echo $tautan->keterangan ?></td>
				<td class="text-center">
					<?php if ($tautan->status_tautan == 'Publish') { ?>
						<span class="badge bg-info">
							<i class="fa fa-eye"></i> <?php echo $tautan->status_tautan ?>
						</span>
					<?php } else { ?>
						<span class="badge bg-secondary">
							<i class="fa fa-eye-slash"></i> Not Published
						</span>
					<?php } ?>
				</td>
				<td class="text-center"><?php echo $tautan->urutan ?></td>
				<td class="text-center">
					<a href="<?php echo base_url('admin/tautan/edit/' . $tautan->id_tautan) ?>"
						class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?php echo base_url('admin/tautan/delete/' . $tautan->id_tautan) ?>"
						class="btn btn-secondary btn-sm delete-link"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php $no++;
		} ?>
	</tbody>
</table>