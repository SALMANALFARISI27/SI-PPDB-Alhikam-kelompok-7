<?php include('tambah.php'); ?>
<table class="table table-bordered table-sm" id="example3">
	<thead>
		<tr class="bg-secondary">
			<th width="5%" class="text-center">No</th>
			<th width="10%" class="text-center">Logo</th>
			<th width="30%" class="text-center">Nama</th>
			<th width="20%" class="text-center">Keterangan</th>
			<th width="10%" class="text-center">Jumlah</th>
			<th width="10%" class="text-center">Urutan</th>
			<th width="10%" class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($kategori_galeri as $kategori_galeri) {
			$galeri = $m_kategori_galeri->galeri($kategori_galeri->id_kategori_galeri);
			?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td class="text-center">
					<?php if ($kategori_galeri->gambar == "") {
						echo '-';
					} else {
						$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $kategori_galeri->gambar;
						$img_diluar = FCPATH . 'thumbs/' . $kategori_galeri->gambar;
						if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
							@copy($img_diluar, $img_dipublic);
						}
						?>
						<img src="<?php echo base_url('assets/upload/image/thumbs/' . $kategori_galeri->gambar) ?>"
							class="img img-thumbnail">
					<?php } ?>

				<td>
					<?php echo $kategori_galeri->nama_kategori_galeri ?>
					<small>
						<br>Slug: <?php echo $kategori_galeri->slug_kategori_galeri ?>
					</small>
				</td>
				<td>
					<?php echo $kategori_galeri->keterangan ?>
				</td>
				<td class="text-center"><?php if ($galeri) {
					echo $galeri->total;
				} else {
					echo 0;
				} ?> Galeri</td>
				<td class="text-center"><?php echo $kategori_galeri->urutan ?></td>
				<td class="text-center">
					<div style="display: flex; justify-content: center; gap: 5px;">
						<a href="<?php echo base_url('admin/kategori_galeri/edit/' . $kategori_galeri->id_kategori_galeri) ?>"
							class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
						<a href="<?php echo base_url('admin/kategori_galeri/delete/' . $kategori_galeri->id_kategori_galeri) ?>"
							class="btn btn-secondary btn-sm delete-link"><i class="fa fa-trash"></i></a>
					</div>
				</td>
			</tr>
			<?php $no++;
		} ?>
	</tbody>
</table>