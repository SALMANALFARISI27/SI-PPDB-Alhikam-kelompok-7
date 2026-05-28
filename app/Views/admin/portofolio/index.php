<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/portofolio'), ' method="get"') ?>
		<div class="input-group">
			<span class="input-group-append">
				<a href="<?php echo base_url('admin/portofolio/tambah') ?>" class="btn btn-info">
					<i class="fa fa-plus"></i> Tambah Baru
				</a>
			</span>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/portofolio/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php', '', CURRENT_URL()) ?>">
<div class="mailbox-controls">
	<div class="input-group">

		<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Portofolio"
			onclick="return confirm('Apakah Anda yakin ingin menghapus Portofolio ini?')">
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
				<tr class="bg-light">
					<th width="5%" class="text-center">
						<button type="button" class="btn btn-default btn-sm checkbox-toggle">
							<i class="far fa-square"></i>
						</button>
					</th>
					<th width="8%" class="text-center">Gambar</th>
					<th width="50%" class="text-center">Judul</th>
					<th width="10%" class="text-center">Status</th>
					<th width="12%" class="text-center">Tgl/Hits</th>
					<th width="10%" class="text-center">Author</th>
					<th width="10%" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($portofolio as $portofolio) { ?>
					<tr>
						<td class="text-center">
							<div class="icheck-primary">
								<input type="checkbox" name="id_portofolio[]" value="<?php echo $portofolio->id_portofolio ?>"
									id="check_<?php echo $no ?>">
								<label for="check_<?php echo $no ?>"></label>
							</div>
							<?php echo $no ?>
						</td>

						<td class="text-center">
							<?php if ($portofolio->gambar == "") {
								echo '-';
							} else {
								$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $portofolio->gambar;
								$img_diluar = FCPATH . 'thumbs/' . $portofolio->gambar;
								if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
									@copy($img_diluar, $img_dipublic);
								}
								?>
								<img src="<?php echo base_url('assets/upload/image/thumbs/' . $portofolio->gambar) ?>"
									class="img img-thumbnail">
							<?php } ?>
						</td>

						<td>
							<?php echo $portofolio->judul_portofolio ?>
							<small>
								<textarea title="Copy link gambar/file ini"
									class="form-control"><?php echo base_url('assets/upload/image/' . $portofolio->gambar) ?></textarea>
							</small>
						</td>

						<td class="text-center">
							<?php if ($portofolio->status_portofolio == 'Publish') { ?>
								<span class="badge bg-info">
									<i class="fa fa-eye"></i> <?php echo $portofolio->status_portofolio ?>
								</span>
							<?php } else { ?>
								<span class="badge bg-secondary">
									<i class="fa fa-eye-slash"></i> Not Published
								</span>
							<?php } ?>
						</td>

						<td>
							<small>
								<i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($portofolio->tanggal_post ? $portofolio->tanggal_post : $portofolio->tanggal)) ?> <br>
								<i class="fa fa-eye"></i> <?php echo $portofolio->hits ?> tayang
							</small>
						</td>

						<td class="text-center">
							<?php echo $portofolio->nama ?>
						</td>

						<td class="text-center">
							<div style="display: flex; justify-content: center; gap: 5px;">
								<a href="<?php echo base_url('admin/portofolio/edit/' . $portofolio->id_portofolio) ?>"
									class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url('admin/portofolio/delete/' . $portofolio->id_portofolio) ?>"
									class="btn btn-secondary btn-sm delete-link" onclick="confirmation(event)"><i
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
<?php echo form_close(); ?>