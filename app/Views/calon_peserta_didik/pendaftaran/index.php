<?php if ($calon_peserta_didik) { ?>
	<div class="callout callout-success">
		Berikut adalah data pendaftaran Anda.
	</div>

	<div class="table-responsive">
		<table class="tabelku table-sm table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%" rowspan="2" class="text-center align-middle">NO</th>
					<th width="20%" class="align-middle" rowspan="2">Nama dan Informasi</th>
					<th width="20%" class="align-middle" rowspan="2">Alamat</th>
					<th width="27%" class="align-middle text-center" colspan="3">Dokumen Pendukung</th>
					<th width="12%" class="align-middle text-center" rowspan="2">Status</th>
					<th rowspan="2" class="text-center align-middle">Aksi</th>
				</tr>
				<tr>
					<th class="text-center align-middle" width="9%">Wajib</th>
					<th class="text-center align-middle" width="9%">Terunggah</th>
					<th class="text-center align-middle" width="9%">Tidak Wajib</th>
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

								<br><span class="text-secondary">Orang
									Tua/Wali:</span><?php echo $calon_peserta_didik->nama_wali ?>
								<br><span class="text-secondary">Usia:</span>
								<?php
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
						<td class="text-center <?php if ($dokumen_wajib >= $wajib->total) {
							echo 'text-success';
						} else {
							echo 'text-danger';
						} ?>">
							<strong><?php echo $dokumen_wajib; ?></strong>
						</td>
						<td class="text-center"><?php echo $tidak_wajib->total ?></td>

						<td class="text-center">
							<?php if ($calon_peserta_didik->status_pendaftaran == 'Menunggu') { ?>
								<span class="badge badge-warning"><i class="fa fa-clock"></i>&nbsp;Menunggu</span>
							<?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Diterima-Tahap-1') { ?>
								<span class="badge badge-success"><i class="fa fa-check-circle"></i>&nbsp;Diterima Tahap 1</span>
							<?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Tidak-Diterima') { ?>
								<span class="badge badge-danger"><i class="fa fa-times-circle"></i>&nbsp;Tidak Diterima</span>
							<?php } elseif ($calon_peserta_didik->status_pendaftaran == 'Lulus') { ?>
								<span class="badge badge-primary"><i class="fa fa-graduation-cap"></i>&nbsp;Lulus</span>
							<?php } else { ?>
								<span class="badge badge-info"><i class="fa fa-tasks"></i>&nbsp;Diperiksa</span>
							<?php } ?>
						</td>
						<td class="text-center">
							<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/dokumen/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
								class="btn btn-info btn-xs btn-block mb-1" title="Unggah Dokumen"><i class="fa fa-upload"></i>
								Unggah Dokumen</a>

							<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/cetak/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
								class="btn btn-danger btn-xs btn-block mb-1" title="Cetak" target="_blank"><i
									class="fa fa-file-pdf"></i> Cetak PDF</a>

							<div class="btn-group btn-block">
								<a href="<?php echo base_url('calon_peserta_didik/pendaftaran/edit/' . $calon_peserta_didik->slug_calon_peserta_didik) ?>"
									class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>

							</div>
						</td>
					</tr>
					<?php $i++;
				} ?>
			</tbody>
		</table>
	</div>
<?php } else { ?>
	<div class="alert alert-info">
		Mohon Maaf, Anda belum melakukan pendaftaran.
	</div>
<?php } ?>