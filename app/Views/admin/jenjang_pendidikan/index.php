<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/jenjang_pendidikan'), ' method="get"') ?>
		<div class="input-group">
			<span class="input-group-append">
				<a href="<?php echo base_url('admin/jenjang_pendidikan/tambah') ?>" class="btn btn-info">
					<i class="fa fa-plus"></i> Tambah Baru
				</a>
			</span>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/jenjang_pendidikan/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php', '', CURRENT_URL()) ?>">
<div class="mailbox-controls">
	<div class="input-group">

		<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Jenjang Pendidikan"
			onclick="return confirm('Apakah Anda yakin ingin menghapus Jenjang Pendidikan ini?')">
			<i class="fa fa-trash"></i>
		</button>
		<button type="submit" name="submit" value="Draft" class="btn btn-dark" title="Jangan Publikasikan">
			<i class="fa fa-eye-slash"></i>
		</button>
		<button type="submit" name="submit" value="Publish" class="btn btn-info" title="Publikasikan">
			<i class="fa fa-eye"></i>
		</button>


		<div class="table-responsive mailbox-messages mt-1">

			<table class="tabelku table-sm" id="example2">
				<thead>
					<tr class="text-left bg-light">
						<th width="5%" class="text-center">
							<button type="button" class="btn btn-default btn-sm checkbox-toggle">
								<i class="far fa-square"></i>
							</button>
						</th>
						<th width="8%" class="text-center">Gambar</th>
						<th width="40%" class="text-center">Nama Jenjang</th>
						<th width="25%" class="text-center">Jenis Pendidikan - Author</th>
						<th width="10%" class="text-center">Status</th>
						<th width="10%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($jenjang_pendidikan as $jenjang_pendidikan) { ?>
						<tr>
							<td class="text-center">
								<div class="icheck-primary">
									<input type="checkbox" name="id_jenjang_pendidikan[]"
										value="<?php echo $jenjang_pendidikan->id_jenjang_pendidikan ?>"
										id="check_<?php echo $no ?>">
									<label for="check_<?php echo $no ?>"></label>
								</div>
								<?php echo $no ?>
							</td>
							<td>
								<?php if ($jenjang_pendidikan->gambar == "") {
									echo '-';
								} else {
									$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $jenjang_pendidikan->gambar;
									$img_diluar = FCPATH . 'thumbs/' . $jenjang_pendidikan->gambar;
									if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
										@copy($img_diluar, $img_dipublic);
									}
									?>
									<img src="<?php echo base_url('assets/upload/image/thumbs/' . $jenjang_pendidikan->gambar) ?>"
										class="img img-thumbnail">
								<?php } ?>
							</td>
							<td><a
									href="<?php echo base_url('admin/jenjang_pendidikan/edit/' . $jenjang_pendidikan->id_jenjang_pendidikan) ?>">
									<?php echo $jenjang_pendidikan->judul_jenjang_pendidikan ?>
								</a>
								<small>
									<br><i class="fa fa-calendar-check"></i>
									<?php echo $this->website->tanggal_bulan_menit($jenjang_pendidikan->tanggal_publish) ?>
									<br><i class="fa fa-calendar-plus"></i>
									<?php echo $this->website->tanggal_bulan_menit($jenjang_pendidikan->tanggal_post) ?>
									<br><i class="fa fa-eye"></i> <?php echo $jenjang_pendidikan->hits ?> | <i
										class="fa fa-sort-numeric-up"></i> <?php echo $jenjang_pendidikan->urutan ?>
								</small>
							</td>
							<td><small>

									<br><i class="fa fa-home"></i> <a
										href="<?php echo base_url('admin/jenjang_pendidikan/jenis_jenjang_pendidikan/' . $jenjang_pendidikan->jenis_jenjang_pendidikan) ?>">
										<?php echo $jenjang_pendidikan->jenis_jenjang_pendidikan ?>
									</a>
									<br><i class="fa fa-user"></i> <a
										href="<?php echo base_url('admin/jenjang_pendidikan/author/' . $jenjang_pendidikan->id_admin) ?>">
										<?php echo $jenjang_pendidikan->nama ?>
									</a>
								</small>
							</td>
							<td class="text-center">
								<a
									href="<?php echo base_url('admin/jenjang_pendidikan/status_jenjang_pendidikan/' . $jenjang_pendidikan->status_jenjang_pendidikan) ?>">
									<?php if ($jenjang_pendidikan->status_jenjang_pendidikan == 'Publish') { ?>
										<span class="badge bg-info">
											<i class="fa fa-eye"></i>
											<?php echo $jenjang_pendidikan->status_jenjang_pendidikan ?>
										</span>
									<?php } else { ?>
										<span class="badge bg-secondary">
											<i class="fa fa-eye-slash"></i> Not Published
										</span>
									<?php } ?>
								</a>
							</td>
							<td class="text-center">
								<a href="<?php echo base_url('jenjang_pendidikan/read/' . $jenjang_pendidikan->slug_jenjang_pendidikan) ?>"
									class="btn btn-secondary btn-sm mt-1" target="_blank" title="Baca"><i
										class="fa fa-eye"></i></a>
								<a href="<?php echo base_url('admin/jenjang_pendidikan/edit/' . $jenjang_pendidikan->id_jenjang_pendidikan) ?>"
									class="btn btn-secondary btn-sm mt-1" title="Edit"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url('admin/jenjang_pendidikan/delete/' . $jenjang_pendidikan->id_jenjang_pendidikan) ?>"
									class="btn btn-secondary btn-sm mt-1 delete-link" title="Hapus"><i
										class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php echo form_close(); ?>