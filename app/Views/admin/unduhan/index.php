<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/unduhan'), ' method="get"') ?>
		<div class="input-group">
			<span class="input-group-append">
				<a href="<?php echo base_url('admin/unduhan/tambah') ?>" class="btn btn-info">
					<i class="fa fa-plus"></i> Tambah Baru
				</a>
				<?php if (isset($_GET['keywords'])) { ?>
					<a href="<?php echo base_url('admin/unduhan') ?>" class="btn btn-secondary">
						<i class="fa fa-arrow-left"></i>
					</a>
				<?php } ?>
			</span>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/unduhan/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php', '', CURRENT_URL()) ?>">
<div class="mailbox-controls">
	<div class="input-group">

		<div class="input-group">
			<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Unduhan"
				onclick="return confirm('Apakah Anda yakin ingin menghapus Unduhan ini?')">
				<i class="fa fa-trash"></i>
			</button>

			<button type="submit" name="submit" value="Draft" class="btn btn-dark" title="Jangan Publikasikan">
				<i class="fa fa-eye-slash"></i>
			</button>

			<button type="submit" name="submit" value="Publish" class="btn btn-info" title="Publikasikan">
				<i class="fa fa-eye"></i>
			</button>
		</div>

		<div class="table-responsive mailbox-messages mt-1">

			<table class="tabelku table-sm" id="example2">
				<thead>
					<tr class="text-left bg-light">
						<th width="5%" class="text-center">
							<button type="button" class="btn btn-default btn-sm checkbox-toggle">
								<i class="far fa-square"></i>
							</button>
						</th>
						<th width="50%" class="text-center">Judul</th>
						<th width="20%" class="text-center">Deskripsi</th>
						<th width="10%" class="text-center">Status</th>
						<th width="15%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($unduhan as $unduhan) { ?>
						<tr>
							<td class="text-center">
								<div class="icheck-primary">
									<input type="checkbox" name="id_unduhan[]" value="<?php echo $unduhan->id_unduhan ?>"
										id="check_<?php echo $no ?>">
									<label for="check_<?php echo $no ?>"></label>
								</div>
								<?php echo $no ?>
							</td>

							<td>
								<a href="<?php echo base_url('admin/unduhan/edit/' . $unduhan->id_unduhan) ?>">
									<?php echo $unduhan->judul_unduhan ?>
								</a>
								<small>
									<br><i class="fa fa-download"></i>
									<?php echo base_url('unduhan/unduh/' . $unduhan->id_unduhan) ?>
									<br><i class="fa fa-link"></i> Link file:<br>
									<textarea class="form-control form-control-sm" title="Copy link file ini"
										rows="2"><?php echo base_url('assets/upload/file/' . $unduhan->file) ?></textarea>
									<i class="fa fa-calendar-check"></i>
									<?php echo $this->website->tanggal_bulan_menit($unduhan->tanggal) ?>
									<br><i class="fa fa-calendar-plus"></i>
									<?php echo $this->website->tanggal_bulan_menit($unduhan->tanggal_post) ?>
									<br><i class="fa fa-eye"></i> <?php echo $unduhan->hits ?>
								</small>
							</td>

							<td>
								<small>
									<i class="fa fa-user"></i>
									<a href="<?php echo base_url('admin/unduhan/author/' . $unduhan->id_admin) ?>">
										<?php echo $unduhan->nama ?>
									</a>
									<br><i class="fa fa-file-code"></i> <?php echo strtoupper($unduhan->file_ext) ?>
									<br><i class="fas fa-file"></i> <?php echo $unduhan->file_size ?> MB
								</small>
							</td>

							<td class="text-center">
								<?php if ($unduhan->status_unduhan == 'Publish') { ?>
									<span class="badge bg-info">
										<i class="fa fa-eye"></i> <?php echo $unduhan->status_unduhan ?>
									</span>
								<?php } else { ?>
									<span class="badge bg-secondary">
										<i class="fa fa-eye-slash"></i> Not Published
									</span>
								<?php } ?>
							<td class="text-center">
								<div style="display: flex; justify-content: center; gap: 5px; flex-wrap: wrap;">
									<?php if ($unduhan->file != "") { ?>
										<a href="<?php echo base_url('admin/unduhan/unduh/' . $unduhan->id_unduhan) ?>"
											class="btn btn-info btn-sm" target="_blank">
											<i class="fa fa-download"></i> Unduh
										</a>
									<?php } ?>

									<a href="<?php echo base_url('admin/unduhan/edit/' . $unduhan->id_unduhan) ?>"
										class="btn btn-success btn-sm" title="Edit">
										<i class="fa fa-edit"></i>
									</a>

									<a href="<?php echo base_url('admin/unduhan/delete/' . $unduhan->id_unduhan) ?>"
										class="btn btn-secondary btn-sm delete-link" title="Hapus">
										<i class="fa fa-trash"></i>
									</a>
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
<?php echo form_close(); ?>