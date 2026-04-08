<p>
	<a href="<?php echo base_url('admin/gelombang/tambah') ?>" class="btn btn-info">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<div class="card">
	<div class="card-header">
		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 250px;">
				<input type="text" id="pencarian-kustom" class="form-control float-right"
					placeholder="Cari periode/tahap...">
				<div class="input-group-append">
					<button type="submit" class="btn btn-default">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-sm" id="tabel-gelombang">
				<thead>
					<tr>
						<th width="2%" class="text-center align-middle">No</th>
						<th width="5%" class="text-center align-middle">Gambar</th>
						<th width="20%" class="text-center align-middle">Periode PPDB</th>
						<th width="8%" class="text-center align-middle">Status</th>
						<th class="text-center align-middle"><small>Pendaftar</small></th>
						<th class="text-center align-middle"><small>Menunggu</small></th>
						<th class="text-center align-middle"><small>Diperiksa</small></th>
						<th class="text-center align-middle"><small>Diterima Tahap 1</small></th>
						<th class="text-center align-middle"><small>Lulus</small></th>
						<th class="text-center align-middle"><small>Tidak Diterima</small></th>
						<th class="text-center align-middle">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($gelombang as $row) {
						$pendaftar = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Semua', 'Semua');
						$menunggu = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Menunggu', 'Semua');
						$diperiksa = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Diperiksa', 'Semua');
						$diterima_tahap1 = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Diterima-Tahap-1', 'Semua');
						$lulus = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Lulus', 'Semua');
						$tidak_diterima = $m_calon_peserta_didik->total_gelombang_status_calon_peserta_didik($row->id_gelombang, 'Tidak-Diterima', 'Semua');
						?>
						<tr>
							<td class="text-center"><?php echo $no ?></td>
							<td class="text-center">
								<?php if ($row->gambar == "") {
									echo '-';
								} else { ?>
									<img src="<?php echo base_url('assets/upload/image/thumbs/' . $row->gambar) ?>"
										class="img img-thumbnail">
								<?php } ?>
							</td>
							<td>
								<strong><?php echo $row->judul ?></strong>
								<small>
									<br><span class="text-secondary">Pembukaan:</span>
									<?php echo $this->website->hari($row->tanggal_buka) ?>
									<br><span class="text-secondary">Penutupan:</span>
									<?php echo $this->website->hari($row->tanggal_tutup) ?>
									<br><span class="text-secondary">Pengumuman:</span>
									<?php echo $this->website->hari($row->tanggal_pengumuman) ?>
								</small>
							</td>
							<td class="text-center">
								<?php if ($row->status_gelombang == 'Buka') { ?>
									<span class="badge bg-info">
										<i class="fa fa-eye"></i> <?php echo $row->status_gelombang ?>
									</span>
								<?php } else { ?>
									<span class="badge bg-secondary">
										<i class="fa fa-eye-slash"></i> <?php echo $row->status_gelombang ?>
									</span>
								<?php } ?>
							</td>
							<td class="text-center"><?php echo $pendaftar ? $pendaftar->total : 0; ?></td>
							<td class="text-center"><?php echo $menunggu ? $menunggu->total : 0; ?></td>
							<td class="text-center"><?php echo $diperiksa ? $diperiksa->total : 0; ?></td>
							<td class="text-center"><?php echo $diterima_tahap1 ? $diterima_tahap1->total : 0; ?></td>
							<td class="text-center"><?php echo $lulus ? $lulus->total : 0; ?></td>
							<td class="text-center"><?php echo $tidak_diterima ? $tidak_diterima->total : 0; ?></td>

							<td class="text-center">
								<div class="btn-group-vertical btn-block">
									<a href="<?php echo base_url('admin/gelombang/detail/' . $row->id_gelombang . '/Semua/Semua') ?>"
										class="btn btn-info btn-xs mb-1"><i class="fa fa-user-check"></i> Data Pendaftar</a>
									<a href="<?php echo base_url('admin/gelombang/export/' . $row->id_gelombang . '/Semua/Semua') ?>"
										class="btn btn-success btn-xs mb-1" target="_blank"><i class="fa fa-file-excel"></i>
										Ekspor Excel</a>
									<a href="<?php echo base_url('admin/gelombang/unduh_data/' . $row->id_gelombang . '/Semua/Semua') ?>"
										class="btn btn-danger btn-xs mb-1" target="_blank"><i class="fa fa-file-pdf"></i>
										Unduh PDF</a>
								</div>
								<div class="btn-group btn-block"
									style="display: flex; justify-content: center; gap: 5px; margin-top: 5px;">
									<a href="<?php echo base_url('admin/gelombang/edit/' . $row->id_gelombang) ?>"
										class="btn btn-secondary btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo base_url('admin/gelombang/delete/' . $row->id_gelombang) ?>"
										class="btn btn-dark btn-xs delete-link" title="Hapus"><i
											class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
						<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

		setTimeout(function () {
			if ($.fn.DataTable.isDataTable('#tabel-gelombang')) {
				$('#tabel-gelombang').DataTable().destroy();
			}

			var table = $('#tabel-gelombang').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": false,
				"dom": "lrtip"
			});


			$('#pencarian-kustom').on('keyup', function () {
				table.search(this.value).draw();
			});
		}, 500);
	});
</script>