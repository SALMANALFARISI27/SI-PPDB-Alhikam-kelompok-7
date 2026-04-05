<?php  
use App\Libraries\Website;
$this->website          = new Website(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<style><?php echo file_get_contents(FCPATH . 'assets/css/css-print.css'); ?></style>
</head>

<body>
<page size="A4" layout="portrait">
<div class="cetak">

	<table>
		<tbody>
			<tr>
				<td style="width: 1.8cm;">
					<?php
					$icon_url = $this->website->icon();
					// Convert URL ke path file untuk mPDF
					$icon_path = str_replace(base_url(), FCPATH, $icon_url);
					if(file_exists($icon_path)) {
						$icon_src = $icon_path;
					} else {
						$icon_src = $icon_url;
					}
					?>
					<img src="<?php echo $icon_src ?>" style="width: 1.5cm; height: auto;">
				</td>
				<td>
					<h1>INFORMASI SEKOLAH
						<br><?php echo $yayasan->nama_yayasan?>
					</h1>
				</td>
			</tr>
		</tbody>
	</table>
	<hr><br>

	<table class="printer">
	<tbody>
		<tr>
		  <td colspan="2" class="bg-secondary text-center"><h3>DATA DASAR SEKOLAH</h3></td>
	  </tr>
		<tr>
			<td class="bg-light" width="30%">Nama lengkap yayasan</td>
			<td><?php echo $yayasan->nama_yayasan ?></td>
		</tr>

		<tr>
			<td class="bg-light">NSP</td>
			<td><?php echo $yayasan->nsp ?></td>
		</tr>
		<tr>
			<td class="bg-light">Status Yayasan</td>
			<td><?php echo $yayasan->status_yayasan ?></td>
		</tr>
		<tr>
		  <td colspan="2" class="bg-secondary text-center"><h3>KONTAK DAN ALAMAT SEKOLAH</h3></td>
	  </tr>
		<tr>
			<td class="bg-light">Alamat</td>
			<td><?php echo nl2br($yayasan->alamat) ?></td>
		</tr>
		<tr>
			<td class="bg-light">Kelurahan</td>
			<td><?php echo $yayasan->kelurahan ?></td>
		</tr>
		<tr>
			<td class="bg-light">Kecamatan</td>
			<td><?php echo $yayasan->kecamatan ?></td>
		</tr>
		<tr>
			<td class="bg-light">Kabupaten</td>
			<td><?php echo $yayasan->kabupaten ?></td>
		</tr>
		<tr>
			<td class="bg-light">Provinsi</td>
			<td><?php echo $yayasan->provinsi ?></td>
		</tr>
		<tr>
			<td class="bg-light">Kode Pos</td>
			<td><?php echo $yayasan->kode_pos ?></td>
		</tr>
		<tr>
			<td class="bg-light">Telepon</td>
			<td><?php echo $yayasan->telepon ?></td>
		</tr>
		<tr>
			<td class="bg-light">Email</td>
			<td><?php echo $yayasan->email ?></td>
		</tr>
		<tr>
			<td class="bg-light">Website</td>
			<td><?php echo $yayasan->website ?></td>
		</tr>
		<tr>
		  <td colspan="2" class="bg-secondary text-center"><h3>INFORMASI, AKREDITASI DAN YAYASAN</h3></td>
	  </tr>
		<tr>
			<td class="bg-light">Nama Yayasan</td>
			<td><?php echo $yayasan->nama_yayasan ?></td>
		</tr>
		<tr>
			<td class="bg-light">Tanggal berdiri Yayasan/Yayasan</td>
			<td><?php echo $this->website->tanggal_id($yayasan->tanggal_berdiri) ?></td>
		</tr>

		<tr>
			<td class="bg-light">Jumlah Pegawai</td>
			<td><?php echo $yayasan->jumlah_pegawai ?></td>
		</tr>
		<tr>
			<td class="bg-light">Jumlah Akreditasi</td>
			<td><?php echo $yayasan->nilai_akreditasi ?>
			</td>
		</tr>

		<tr>
			<td class="bg-light">Tanggal Akreditasi</td>
			<td><?php echo $this->website->tanggal_id($yayasan->tanggal_berlaku) ?></td>
		</tr>
		<tr>
			<td class="bg-light">Tanggal Kadaluarsa Akreditasi</td>
			<td><?php echo $this->website->tanggal_id($yayasan->tanggal_kadaluarsa) ?></td>
		</tr>
		<tr>
			<td class="bg-light">Nomor Izin Yayasan</td>
			<td><?php echo $yayasan->nomor_izin ?></td>
		</tr>
		<tr>
			<td class="bg-light">Keterangan lain</td>
			<td><?php echo nl2br($yayasan->keterangan) ?></td>
		</tr>
		<tr>
		  <td colspan="2" class="bg-secondary text-center"><h3>INFORMASI TANAH DAN BANGUNAN</h3></td>
	  </tr>
		<tr>
			<td class="bg-light">Luas Tanah</td>
			<td><?php echo $yayasan->luas_tanah ?> m<sup>2</sup></td>
		</tr>
		<tr>
			<td class="bg-light">Luas Bangunan</td>
			<td><?php echo $yayasan->luas_bangunan ?> m<sup>2</sup></td>
		</tr>
		<tr>
			<td class="bg-light">Status Kepemilikan</td>
			<td><?php echo $yayasan->status_tanah ?></td>
		</tr>
		<tr>
			<td class="bg-light">Nomor IMB</td>
			<td><?php echo $yayasan->imb ?></td>
		</tr>
		<tr>
			<td class="bg-light">Nomor Sertifikat Tanah</td>
			<td><?php echo $yayasan->nomor_sertifikat ?></td>
		</tr>
		
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<td width="60%"></td>
			<td>
				<?php echo $yayasan->kabupaten ?>, <?php echo $this->website->tanggal_bulan(date('Y-m-d')) ?>
				<br>
				<br>
				<br>
				<br>
				<br><strong>(........................................)</strong>
				<br>Pemimpin Yayasan
			</td>
		</tr>
	</tbody>
</table>
</div>
</page>
</body>
</html>
