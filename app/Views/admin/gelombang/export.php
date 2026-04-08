<table class="tabelku table-sm mb-3">
	<thead>
		<tr>
			<th width="30%">Nama Periode</th>
			<th><?php echo $gelombang->judul ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tanggal pelaksanaan</td>
			<td>
				<span class="text-secondary">Pembukaan:</span>
				<?php echo $this->website->hari($gelombang->tanggal_buka) ?>
				<br><span class="text-secondary">Penutupan:</span>
				<?php echo $this->website->hari($gelombang->tanggal_tutup) ?>
				<br><span class="text-secondary">Pengumuman:</span>
				<?php echo $this->website->hari($gelombang->tanggal_pengumuman) ?>
			</td>
		</tr>
		<tr>
			<td>Periode</td>
			<td><?php echo $gelombang->tahun ?></td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><?php echo $gelombang->tahun_ajaran ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<?php if ($gelombang->status_gelombang == 'Buka') { ?>
					<span class="badge bg-info">
						<i class="fa fa-eye"></i> <?php echo $gelombang->status_gelombang ?>
					</span>
				<?php } else { ?>
					<span class="badge bg-secondary">
						<i class="fa fa-eye-slash"></i> Not Published
					</span>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>Jenjang Pendidikan</td>
			<td><?php echo $judul_jenjang_pendidikan ?></td>
		</tr>
		<tr>
			<td>Status Pendaftaran</td>
			<td><?php echo $status_pendaftaran ?></td>
		</tr>
	</tbody>
</table>

<p>Klik tombol <strong>Excel</strong> pada tabel di bawah ini untuk melakukan Ekspor data ke Excel</p>
<div class="table-responsive">
	<table class="tabelku table-sm" id="example1">
		<thead>
			<tr>
				<th width="3%">
					<button type="button" class="btn btn-default btn-sm checkbox-toggle">
						<i class="far fa-square"></i>
					</button>
				</th>
				<th>No</th>
				<th>Kode Pendaftaran</th>
				<th>Program/Jenjang</th>
				<th>Status Pendaftaran</th>
				<th>Nama</th>
				<th>L/P</th>
				<th>Agama</th>
				<th>Tempat Lahir</th>
				<th>Tgl Lahir</th>
				<th>NIS</th>
				<th>NISN</th>
				<th>Kewarganegaraan</th>
				<th>Alamat</th>
				<th>Kode Pos</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Anak Ke</th>
				<th>Jumlah Saudara</th>
				<th>Jenis Masuk</th>
				<th>Asal Sekolah</th>
				<th>Alamat Sekolah Asal</th>
				<th>Tanggal Pindah</th>
				<th>Golongan Darah</th>
				<th>Tinggi (cm)</th>
				<th>Berat (kg)</th>
				<th>Penyakit</th>
				<th>Hobi</th>
				<th>Berkebutuhan Khusus</th>
				<th>Deskripsi</th>
				<th>Nama Ayah</th>
				<th>Agama Ayah</th>
				<th>Pekerjaan Ayah</th>
				<th>Pendidikan Ayah</th>
				<th>Alamat Ayah</th>
				<th>Telepon Ayah</th>
				<th>Nama Ibu</th>
				<th>Agama Ibu</th>
				<th>Pekerjaan Ibu</th>
				<th>Pendidikan Ibu</th>
				<th>Alamat Ibu</th>
				<th>Telepon Ibu</th>
				<th>Nama Wali</th>
				<th>Agama Wali</th>
				<th>Pekerjaan Wali</th>
				<th>Pendidikan Wali</th>
				<th>Alamat Wali</th>
				<th>Telepon Wali</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($calon_peserta_didik as $calon_peserta_didik) { ?>
				<tr>
					<td class="text-center">
						<div class="icheck-primary">
							<input type="checkbox" name="id_calon_peserta_didik[]" value="<?php echo $calon_peserta_didik->id_calon_peserta_didik ?>" id="check<?php echo $no ?>">
							<label for="check<?php echo $no ?>"></label>
						</div>
					</td>
					<td><?php echo $no ?></td>
					<td><?php echo $calon_peserta_didik->kode_calon_peserta_didik ?></td>
					<td><?php echo $calon_peserta_didik->judul_jenjang_pendidikan ?></td>
					<td><?php echo $calon_peserta_didik->status_pendaftaran ?></td>
					<td><?php echo strtoupper($calon_peserta_didik->nama_calon_peserta_didik) ?></td>
					<td><?php echo $calon_peserta_didik->jenis_kelamin ?></td>
					<td><?php echo $calon_peserta_didik->agama ?></td>
					<td><?php echo $calon_peserta_didik->tempat_lahir ?></td>
					<td><?php echo $calon_peserta_didik->tanggal_lahir ?></td>
					<td><?php echo $calon_peserta_didik->nis ?></td>
					<td><?php echo $calon_peserta_didik->nisn ?></td>
					<td><?php echo $calon_peserta_didik->status_wn ?></td>
					<td><?php echo $calon_peserta_didik->alamat ?></td>
					<td><?php echo $calon_peserta_didik->kode_pos ?></td>
					<td><?php echo $calon_peserta_didik->telepon ?></td>
					<td><?php echo $calon_peserta_didik->email ?></td>
					<td><?php echo $calon_peserta_didik->anak_ke ?></td>
					<td><?php echo $calon_peserta_didik->jumlah_saudara ?></td>
					<td><?php echo $calon_peserta_didik->jenis_calon_peserta_didik ?></td>
					<td><?php echo $calon_peserta_didik->asal_sekolah ?></td>
					<td><?php echo $calon_peserta_didik->alamat_sekolah_asal ?></td>
					<td><?php echo $calon_peserta_didik->tanggal_pindah ?></td>
					<td><?php echo $calon_peserta_didik->goldar_calon_peserta_didik ?></td>
					<td><?php echo $calon_peserta_didik->tinggi ?></td>
					<td><?php echo $calon_peserta_didik->berat ?></td>
					<td><?php echo $calon_peserta_didik->penyakit_calon_peserta_didik ?></td>
					<td><?php echo $calon_peserta_didik->hobi_calon_peserta_didik ?></td>
					<td><?php echo $calon_peserta_didik->berkebutuhan_khusus ?></td>
					<td><?php echo $calon_peserta_didik->isi ?></td>
					<td><?php echo $calon_peserta_didik->nama_ayah ?></td>
					<td><?php echo $calon_peserta_didik->agama_ayah ?></td>
					<td><?php echo $calon_peserta_didik->pekerjaan_ayah ?></td>
					<td><?php echo $calon_peserta_didik->jenjang_ayah ?></td>
					<td><?php echo $calon_peserta_didik->alamat_ayah ?></td>
					<td><?php echo $calon_peserta_didik->telepon_ayah ?></td>
					<td><?php echo $calon_peserta_didik->nama_ibu ?></td>
					<td><?php echo $calon_peserta_didik->agama_ibu ?></td>
					<td><?php echo $calon_peserta_didik->pekerjaan_ibu ?></td>
					<td><?php echo $calon_peserta_didik->jenjang_ibu ?></td>
					<td><?php echo $calon_peserta_didik->alamat_ibu ?></td>
					<td><?php echo $calon_peserta_didik->telepon_ibu ?></td>
					<td><?php echo $calon_peserta_didik->nama_wali ?></td>
					<td><?php echo $calon_peserta_didik->agama_wali ?></td>
					<td><?php echo $calon_peserta_didik->pekerjaan_wali ?></td>
					<td><?php echo $calon_peserta_didik->jenjang_wali ?></td>
					<td><?php echo $calon_peserta_didik->alamat_wali ?></td>
					<td><?php echo $calon_peserta_didik->telepon_wali ?></td>
				</tr>
				<?php $no++;
			} ?>
		</tbody>
	</table>
</div>