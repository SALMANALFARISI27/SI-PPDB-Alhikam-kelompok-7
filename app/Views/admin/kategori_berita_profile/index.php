<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example3">
	<thead>
		<tr class="bg-secondary">
			<th width="5%" class="text-center">No</th>
			<th width="25%" class="text-center">Nama</th>
			<th width="25%" class="text-center">Slug</th>
			<th width="25%" class="text-center">Urutan</th>
			<th width="10%" class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($kategori as $kategori) { ?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td><?php echo $kategori->nama_kategori ?></td>
				<td><?php echo $kategori->slug_kategori ?></td>
				<td class="text-center"><?php echo $kategori->urutan ?></td>
				<td class="text-center">
					<div style="display: flex; justify-content: center; gap: 5px;">
						<a href="<?php echo base_url('admin/kategori_berita_profile/edit/' . $kategori->id_kategori_berita_profile) ?>"
							class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
						<a href="<?php echo base_url('admin/kategori_berita_profile/delete/' . $kategori->id_kategori_berita_profile) ?>"
							class="btn btn-secondary btn-sm delete-link"><i class="fa fa-trash"></i></a>
					</div>
				</td>
			</tr>
			<?php $no++;
		} ?>
	</tbody>
</table>