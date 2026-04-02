<?php if ($calon_peserta_didik) { ?>
	<div class="callout callout-success">
		Berikut adalah data pendaftaran Anda.
	</div>

	<table class="tabelku table-sm" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th width="5%" rowspan="2">NO</th>
				<th width="20%" class="align-middle" rowspan="2">Nama dan Informasi</th>
				<th width="20%" class="align-middle" rowspan="2">Alamat</th>
				<th width="36%" class="align-middle text-center" colspan="4">Dokumen Pendukung</th>
				<th width="6%" class="align-middle" rowspan="2">Status</th>
				<th rowspan="2"></th>
			</tr>
			<tr>
				<th class="text-center align-middle" width="6%">Wajib</th>
				<th class="text-center align-middle" width="6%">Sudah Diunggah</th>
				<th class="text-center align-middle" width="6%">Tidak Wajib</th>
				<th class="text-center align-middle" width="6%">Sudah Diunggah</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($calon_peserta_didik as $calon_peserta_didik) {
				$wajib = $m_jenis_dokumen->group_status_jenis_dokumen_detail('Wajib');
				$tidak_wajib = $m_jenis_dokumen->group_status_jenis_dokumen_detail('Tidak Wajib');
				$dokumen_wajib = $m_dokumen->total_check($calon_peserta_didik->id_calon_peserta_didik, $wajib->status_jenis_dokumen);
				$dokumen_tidak_wajib = $m_dokumen->total_check($calon_peserta_didik->id_calon_peserta_didik, $tidak_wajib->status_jenis_dokumen);
				?>
				<tr>
					<td class="text-center"><?php echo $i ?></td>
					<td><strong><?php echo $calon_peserta_didik->nama_calon_peserta_didik ?></strong>
						<small>
							<br><span class="text-secondary">Program:</span>
							<strong><?php echo $calon_peserta_didik->judul_jenjang_pendidikan ?></strong>
							<br><span class="text-secondary">Kode:</span>
							<strong><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></strong>
							<br><span class="text-secondary">NIS/NISN:</span>
							<?php echo $calon_peserta_didik->nis ?>/<?php echo $calon_peserta_didik->nisn ?>

							<br><span class="text-secondary">TTL:</span> <?php echo $calon_peserta_didik->tempat_lahir ?>,
							<?php echo $this->website->tanggal_id($calon_peserta_didik->tanggal_lahir) ?>
							<br><span class="text-secondary">Kelamin:</span>
							<?php if ($calon_peserta_didik->jenis_kelamin == 'L') {
								echo 'Laki-laki';
							} else {
								echo 'Perempuan';
							} ?>
							<br><span class="text-secondary">Wali:</span><?php echo $calon_peserta_didik->nama_wali ?>
							<br><span class="text-secondary">Usia:</span>
							<?php
							// jeda
							$date1 = $calon_peserta_didik->tanggal_lahir;
							$date2 = date('Y-m-d');

							$diff = abs(strtotime($date2) - strtotime($date1));

							$years = floor($diff / (365 * 60 * 60 * 24));
							$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
							$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
							?>
							<?php echo $years; ?> Tahun <?php echo $months; ?> Bulan <?php echo $days; ?> Hari

						</small>
					</td>
					<td><?php echo $calon_peserta_didik->alamat ?>
						<small>
							<br><span class="text-secondary">Telepon:</span> <?php echo $calon_peserta_didik->telepon ?>
							<br><span class="text-secondary">Email:</span> <?php echo $calon_peserta_didik->email ?>
						</small>
					</td>
					<td class="text-center"><?php echo $wajib->total ?></td>
					<td
						class="text-center <?php if ($dokumen_wajib >= $wajib->total) {
							echo 'text-success';
						} else {
							echo 'text-danger';
						} ?>">
						<?php echo $dokumen_wajib; ?></td>
					<td class="text-center"><?php echo $tidak_wajib->total ?></td>
					<td
						class="text-center <?php if ($dokumen_tidak_wajib >= $tidak_wajib->total) {
							echo 'text-success';
						} else {
							echo 'text-danger';
						} ?>">
						<?php echo $dokumen_tidak_wajib; ?></td>

					<td>
						<?php if ($calon_peserta_didik->status_pendaftaran == 'Menunggu') { ?>
							<span class="badge badge-warning"><i
									class="fa fa-clock"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></span>
						<?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Diterima') { ?>
							<span class="badge badge-success"><i
									class="fa fa-check-circle"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></span>
						<?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Tidak-Diterima') { ?>
							<span class="badge badge-danger"><i
									class="fa fa-times-circle"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></span>
						<?php } else { ?>
							<span class="badge badge-info"><i
									class="fa fa-tasks"></i>&nbsp;<?php echo $calon_peserta_didik->status_pendaftaran ?></span>
						<?php } ?>
					</td>
					<td>
						<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/dokumen/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
							class="btn btn-info btn-xs mb-1" title="Edit"><i class="fa fa-upload"></i> Unggah Dokumen</a>

						<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/unduh/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
							class="btn btn-danger btn-xs mb-1" title="Unduh" target="_blank"><i class="fa fa-file-pdf"></i>
							Unduh</a>
						<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/edit/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
							class="btn btn-warning btn-xs mb-1" title="Edit"><i class="fa fa-edit"></i></a>
						<?php if ($calon_peserta_didik->status_pendaftaran == 'Menunggu') { ?>
							<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/delete/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
								class="btn btn-secondary btn-xs delete-link mb-1" title="Hapus"><i class="fa fa-trash"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php $i++;
			} ?>
		</tbody>
	</table>
<?php } else { ?>
	<div class="alert alert-info">
		Mohon Maaf, Anda belum melakukan pendaftaran.
	</div>
<?php } ?>