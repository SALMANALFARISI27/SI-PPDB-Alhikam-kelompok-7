<p>
	<a href="<?php echo base_url('admin/gelombang/tambah') ?>" class="btn btn-info">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="tabelku table-sm" id="example3">
	<thead>
		<tr>
			<th width="2%" rowspan="2" class="text-left align-middle">No</th>
			<th width="5%" rowspan="2" class="text-left align-middle">Gambar</th>
			<th width="30%" rowspan="2" class="text-left align-middle">Periode PPDB</th>
			<th width="8%" rowspan="2" class="text-left align-middle">Status</th>
			<th width="25%" colspan="5" class="text-center align-middle">Jumlah</th>
			
			<th rowspan="2"></th>
		</tr>
		<tr>
			<th width="6%" class="text-center align-middle"><small>Pendaftar</small></th>
			<th width="6%" class="text-center align-middle"><small>Menunggu</small></th>
			<th width="6%" class="text-center align-middle"><small>Diperiksa</small></th>
			<th width="6%" class="text-center align-middle"><small>Diterima</small></th>
			<th width="6%" class="text-center align-middle"><small>Tidak Diterima</small></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1; foreach($gelombang as $gelombang) { 
			$calon_peserta_didik1 	= $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($gelombang->id_gelombang,'Semua','Semua');
			$calon_peserta_didik4 	= $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($gelombang->id_gelombang,'Menunggu','Semua');
			$calon_peserta_didik5 	= $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($gelombang->id_gelombang,'Diperiksa','Semua');
			$calon_peserta_didik2 	= $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($gelombang->id_gelombang,'Diterima','Semua');
			$calon_peserta_didik3 	= $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($gelombang->id_gelombang,'Tidak-Diterima','Semua');
		?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td>
				<?php if($gelombang->gambar=="") { echo '-'; }else{ ?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$gelombang->gambar) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><strong><?php echo $gelombang->judul ?></strong>
				<small>
					<br><span class="text-secondary">Pembukaan:</span> <?php echo $this->website->hari($gelombang->tanggal_buka) ?>
					<br><span class="text-secondary">Penutupan:</span> <?php echo $this->website->hari($gelombang->tanggal_tutup) ?>
					<br><span class="text-secondary">Pengumuman:</span> <?php echo $this->website->hari($gelombang->tanggal_pengumuman) ?>
				</small>
			</td>
			<td>
				<?php if($gelombang->status_gelombang=='Buka') { ?>
					<span class="badge bg-info">
						<i class="fa fa-eye"></i> <?php echo $gelombang->status_gelombang ?>
					</span>
				<?php }else{ ?>
					<span class="badge bg-secondary">
						<i class="fa fa-eye-slash"></i> <?php echo $gelombang->status_gelombang ?>
					</span>
				<?php } ?>
			</td>
			<td class="text-center"><?php if($calon_peserta_didik1) { echo $calon_peserta_didik1->total; }else{ echo 0; } ?></td>
			<td class="text-center"><?php if($calon_peserta_didik4) { echo $calon_peserta_didik4->total; }else{ echo 0; } ?></td>
			<td class="text-center"><?php if($calon_peserta_didik5) { echo $calon_peserta_didik5->total; }else{ echo 0; } ?></td>
			<td class="text-center"><?php if($calon_peserta_didik2) { echo $calon_peserta_didik2->total; }else{ echo 0; } ?></td>
			<td class="text-center"><?php if($calon_peserta_didik3) { echo $calon_peserta_didik3->total; }else{ echo 0; } ?></td>
			
			<td>
				<a href="<?php echo base_url('admin/gelombang/detail/'.$gelombang->id_gelombang.'/Semua/Semua') ?>" class="btn btn-info btn-xs mb-1"><i class="fa fa-user-check"></i> Data Pendaftar</a>
				<a href="<?php echo base_url('admin/gelombang/export/'.$gelombang->id_gelombang.'/Semua/Semua') ?>" class="btn btn-success btn-xs mb-1" target="_blank"><i class="fa fa-file-excel"></i> Ekspor</a>
				<a href="<?php echo base_url('admin/gelombang/unduh_data/'.$gelombang->id_gelombang.'/Semua/Semua') ?>" class="btn btn-danger btn-xs mb-1" target="_blank"><i class="fa fa-file-pdf"></i> Unduh</a>
				
				<a href="<?php echo base_url('admin/gelombang/edit/'.$gelombang->id_gelombang) ?>" class="btn btn-secondary btn-xs mb-1"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/gelombang/delete/'.$gelombang->id_gelombang) ?>" class="btn btn-secondary btn-xs mb-1 delete-link"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>