<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/galeri'), ' method="get"') ?>
		<div class="input-group">
			<a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-info">
				<i class="fa fa-plus"></i> Tambah Baru
			</a>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/galeri/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php', '', CURRENT_URL()) ?>">
<div class="mailbox-controls">

	<div class="input-group">
		<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Galeri"
			onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
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
					<th width="8%" class="text-center">Gambar</th>
					<th width="35%" class="text-center">Judul</th>
					<th width="10%" class="text-center">Status</th>
					<th width="15%" class="text-center">Jenis</th>
					<th width="15%" class="text-center">Author</th>
					<th width="10%" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($galeri as $galeri) { ?>
					<tr>
						<td class="text-center">
							<div class="icheck-primary">
								<input type="checkbox" name="id_galeri[]" value="<?php echo $galeri->id_galeri ?>"
									id="check_<?php echo $no ?>">
								<label for="check_<?php echo $no ?>"></label>
							</div>
							<?php echo $no ?>
						</td>

						<td class="text-center">
							<?php if ($galeri->gambar == "") {
								echo '-';
							} else { ?>
								<img src="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?>"
									class="img img-thumbnail" style="max-width: 80px;">
							<?php } ?>
						</td>

						<td class="text-left">
							<?php echo $galeri->judul_galeri ?>
						</td>

						<td class="text-center">
							<?php if ($galeri->status_galeri == 'Publish') { ?>
								<span class="badge badge-success"><i class="fa fa-eye"></i> Publish</span>
							<?php } else { ?>
								<span class="badge badge-dark"><i class="fa fa-eye-slash"></i> Draft</span>
							<?php } ?>
						</td>

						<td class="text-center">
							<small>
								<?php if ($galeri->jenis_galeri == "Video") { ?>
									<i class="fa fa-video"></i>
								<?php } else { ?>
									<i class="fa fa-image"></i>
								<?php } ?>
								<?php echo $galeri->jenis_galeri ?>
							</small>
						</td>

						<td class="text-center">
							<?php echo $galeri->nama ?>
						</td>

						<td class="text-center">
							<div style="display: flex; justify-content: center; gap: 5px;">
								<a href="<?php echo base_url('admin/galeri/edit/' . $galeri->id_galeri) ?>"
									class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>

								<a href="<?php echo base_url('admin/galeri/delete/' . $galeri->id_galeri) ?>"
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