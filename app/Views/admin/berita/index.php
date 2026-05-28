<div class="row">
	<div class="col-md-6">
		<?php echo form_open(base_url('admin/berita'), ' method="get"') ?>
		<div class="input-group">
			<span class="input-group-append">
				<a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-info">
					<i class="fa fa-plus"></i> Tambah Baru
				</a>
			</span>
		</div>
		<?php echo form_close() ?>
	</div>
</div>
<hr>

<?php echo form_open(base_url('admin/berita/proses')) ?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php', '', CURRENT_URL()) ?>">
<div class="mailbox-controls">
	<div class="input-group">
		<button type="submit" name="submit" value="Delete" class="btn btn-secondary" title="Hapus Berita"
			onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
			<i class="fa fa-trash"></i>
		</button>
		<button type="submit" name="submit" value="Draft" class="btn btn-dark" title="Jangan Publikasikan">
			<i class="fa fa-eye-slash"></i>
		</button>
		<button type="submit" name="submit" value="Publish" class="btn btn-info" title="Publikasikan">
			<i class="fa fa-eye"></i>
		</button>
		<select name="id_kategori_berita_profile" class="form-control">
			<?php foreach($kategori as $kategori_item) { ?>
			<option value="<?php echo $kategori_item->id_kategori_berita_profile ?>"><?php echo $kategori_item->nama_kategori ?></option>
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
				<tr class="text-left bg-light">
					<th width="5%" class="text-center">
						<button type="button" class="btn btn-default btn-sm checkbox-toggle">
							<i class="far fa-square"></i>
						</button>
					</th>
					<th width="8%" class="text-center">Gambar</th>
					<th width="35%" class="text-center">Judul</th>
					<th width="15%" class="text-center">Kategori - Jenis - Author</th>
					<th width="5%" class="text-center">Urutan</th>
					<th width="10%" class="text-center">Status</th>
					<th width="10%" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($berita as $berita) { ?>
					<tr>
						<td class="text-center">
							<div class="icheck-primary">
								<input type="checkbox" name="id_berita[]" value="<?php echo $berita->id_berita ?>"
									id="check_<?php echo $no ?>">
								<label for="check_<?php echo $no ?>"></label>
							</div>
							<?php echo $no ?>
						</td>
						<td>
							<?php if ($berita->gambar == "") {
								echo '-';
							} else {
								$img_dipublic = FCPATH . 'assets/upload/image/thumbs/' . $berita->gambar;
								$img_diluar = FCPATH . 'thumbs/' . $berita->gambar;
								if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
									@copy($img_diluar, $img_dipublic);
								}
								?>
								<img src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar) ?>"
									class="img img-thumbnail">
							<?php } ?>
						</td>
						<td><a href="<?php echo base_url('admin/berita/edit/' . $berita->id_berita) ?>">
								<?php echo $berita->judul_berita ?>
							</a>
							<small>
								<br><i class="fa fa-calendar-check"></i>
								<?php echo $this->website->tanggal_bulan_menit($berita->tanggal_publish) ?>
								<br><i class="fa fa-calendar-plus"></i>
								<?php echo $this->website->tanggal_bulan_menit($berita->tanggal_post) ?>
							</small>
						</td>
						<td><small>
								<i class="fa fa-tags"></i> <?php echo $berita->nama_kategori ?>
								<br><i class="fa fa-home"></i> <?php echo $berita->jenis_berita ?>
								<br><i class="fa fa-user"></i> <?php echo $berita->nama ?>
							</small>
						</td>
						<td class="text-center">
							<?php echo $berita->urutan ?>
						</td>
						<td class="text-center">
							<?php if ($berita->status_berita == 'Publish') { ?>
								<span class="badge bg-info">
									<i class="fa fa-eye"></i> <?php echo $berita->status_berita ?>
								</span>
							<?php } else { ?>
								<span class="badge bg-secondary">
									<i class="fa fa-eye-slash"></i> Not Published
								</span>
							<?php } ?>
						</td>
						<td class="text-center">
							<a href="<?php echo base_url('berita/read/' . $berita->slug_berita) ?>"
								class="btn btn-secondary btn-xs mt-1" target="_blank" title="Baca"><i
									class="fa fa-eye"></i></a>
							<a href="<?php echo base_url('admin/berita/edit/' . $berita->id_berita) ?>"
								class="btn btn-secondary btn-xs mt-1" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo base_url('admin/berita/delete/' . $berita->id_berita) ?>"
								class="btn btn-secondary btn-xs mt-1 delete-link" title="Hapus"><i
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