<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/portfolio'), ' method="get"') ?>
		<div class="input-group">
			<span class="input-group-append">
				<a href="<?php echo base_url('admin/portfolio/tambah') ?>" class="btn btn-info">
					<i class="fa fa-plus"></i> Tambah Baru
				</a>
			</span>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/portfolio/proses')) ?>
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
		<select name="id_kategori_portfolio" class="form-control">
			<?php foreach ($kategori_portfolio as $kategori_portfolio) { ?>
				<option value="<?php echo $kategori_portfolio->id_kategori_portfolio ?>">
					<?php echo $kategori_portfolio->nama_kategori_portfolio ?>
				</option>
			<?php } ?>
		</select>
		<span class="input-group-append">
			<button type="submit" name="submit" value="Update" class="btn btn-warning">
				<i class="fa fa-search"></i> Update
			</button>
		</span>
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
					<th width="35%" class="text-center">Judul</th>
					<th width="15%" class="text-center">Kategori</th>
					<th width="10%" class="text-center">Status</th>
					<th width="12%" class="text-center">Tgl/Hits</th>
					<th width="10%" class="text-center">Author</th>
					<th width="10%" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($portfolio as $portfolio) { ?>
					<tr>
						<td class="text-center">
							<div class="icheck-primary">
								<input type="checkbox" name="id_portfolio[]" value="<?php echo $portfolio->id_portfolio ?>"
									id="check_<?php echo $no ?>">
								<label for="check_<?php echo $no ?>"></label>
							</div>
							<?php echo $no ?>
						</td>

						<td class="text-center">
							<?php if ($portfolio->gambar == "") {
								echo '-';
							} else {
								$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $portfolio->gambar;
								$img_diluar = FCPATH . 'thumbs/' . $portfolio->gambar;
								if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
									@copy($img_diluar, $img_dipublic);
								}
								?>
								<img src="<?php echo base_url('assets/upload/image/thumbs/' . $portfolio->gambar) ?>"
									class="img img-thumbnail">
							<?php } ?>
						</td>

						<td>
							<?php echo $portfolio->judul_portfolio ?>
							<small>
								<textarea title="Copy link gambar/file ini"
									class="form-control"><?php echo base_url('assets/upload/image/' . $portfolio->gambar) ?></textarea>
							</small>
						</td>

						<td>
							<small>
								<i class="fa fa-tags"></i> <?php echo $portfolio->nama_kategori_portfolio ?>
							</small>
						</td>

						<td class="text-center">
							<?php if ($portfolio->status_portfolio == 'Publish') { ?>
								<span class="badge bg-info">
									<i class="fa fa-eye"></i> <?php echo $portfolio->status_portfolio ?>
								</span>
							<?php } else { ?>
								<span class="badge bg-secondary">
									<i class="fa fa-eye-slash"></i> Not Published
								</span>
							<?php } ?>
						</td>

						<td>
							<small>
								<i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($portfolio->tanggal_post ? $portfolio->tanggal_post : $portfolio->tanggal)) ?> <br>
								<i class="fa fa-eye"></i> <?php echo $portfolio->hits ?> tayang
							</small>
						</td>

						<td class="text-center">
							<?php echo $portfolio->nama ?>
						</td>

						<td class="text-center">
							<div style="display: flex; justify-content: center; gap: 5px;">
								<a href="<?php echo base_url('admin/portfolio/edit/' . $portfolio->id_portfolio) ?>"
									class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url('admin/portfolio/delete/' . $portfolio->id_portfolio) ?>"
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