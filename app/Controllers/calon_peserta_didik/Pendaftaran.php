<?php
namespace App\Controllers\Calon_peserta_didik;

use App\Models\Konfigurasi_model;
use App\Models\Calon_peserta_didik_model;
use App\Models\Akun_model;
use App\Models\Jenis_dokumen_model;
use App\Models\Dokumen_model;
use App\Models\Gelombang_model;
use App\Models\Jenjang_pendidikan_model;

class Pendaftaran extends BaseController
{
	public function index()
	{
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$id_akun = $this->session->get('id_akun');
		$calon_peserta_didik = $m_calon_peserta_didik->akun($id_akun);

		$data = [
			'title' => 'Data Pendaftaran Peserta Didik Baru (PPDB)',
			'description' => 'Data Pendaftaran',
			'keywords' => 'Data Pendaftaran',
			'calon_peserta_didik' => $calon_peserta_didik,
			'm_jenis_dokumen' => new Jenis_dokumen_model(),
			'm_dokumen' => new Dokumen_model(),
			'content' => 'calon_peserta_didik/pendaftaran/index'
		];
		return view('calon_peserta_didik/layout/wrapper', $data);
	}

	// biodata
	public function biodata($id_gelombang)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$m_gelombang = new Gelombang_model();

		$konfigurasi = $m_konfigurasi->listing();
		$id_akun = $this->session->get('id_akun');
		$akun = $m_akun->detail($id_akun);
		$jenjang_pendidikan = $m_jenjang_pendidikan->main();
		$gelombang = $m_gelombang->detail($id_gelombang);

		// Ambil biodata terakhir dari akun ini (untuk auto-fill jika sudah pernah daftar)
		$existing_biodata = $m_calon_peserta_didik->akun_latest($id_akun);

		// Ambil list id_jenjang yang sudah terdaftar di gelombang ini oleh akun ini
		$registered_jenjang = $m_calon_peserta_didik->akun_registered_jenjang($id_akun, $id_gelombang);

		if (empty(Session()->get('username_calon_peserta_didik'))) {
			$this->session->setFlashdata('warning', 'Anda belum login');
			return redirect()->to(base_url('signin'));
		}

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama_calon_peserta_didik' => 'required',
				]
			)
		) {

			if ($this->request->getPost('identitas_wali') == 'Ayah') {
				$agama_wali = $this->request->getPost('agama_ayah');
				$pekerjaan_wali = $this->request->getPost('pekerjaan_ayah');
				$jenjang_wali = $this->request->getPost('jenjang_ayah');
				$nama_wali = $this->request->getPost('nama_ayah');
				$alamat_wali = $this->request->getPost('alamat_ayah');
				$telepon_wali = $this->request->getPost('telepon_ayah');
			} elseif ($this->request->getPost('identitas_wali') == 'Ibu') {
				$agama_wali = $this->request->getPost('agama_ibu');
				$pekerjaan_wali = $this->request->getPost('pekerjaan_ibu');
				$jenjang_wali = $this->request->getPost('jenjang_ibu');
				$nama_wali = $this->request->getPost('nama_ibu');
				$alamat_wali = $this->request->getPost('alamat_ibu');
				$telepon_wali = $this->request->getPost('telepon_ibu');
			} else {
				$agama_wali = $this->request->getPost('agama_wali');
				$pekerjaan_wali = $this->request->getPost('pekerjaan_wali');
				$jenjang_wali = $this->request->getPost('jenjang_wali');
				$nama_wali = $this->request->getPost('nama_wali');
				$alamat_wali = $this->request->getPost('alamat_wali');
				$telepon_wali = $this->request->getPost('telepon_wali');
			}
			$slug_calon_peserta_didik = strtolower(url_title($this->request->getVar('nama_calon_peserta_didik'))) . '-' . strtoupper(random_string('alnum', 8));
			$data = [
				'id_admin' => $this->session->get('id_admin') ? $this->session->get('id_admin') : null,
				'id_gelombang' => $id_gelombang,
				'agama' => $this->request->getPost('agama'),
				'agama_ayah' => $this->request->getPost('agama_ayah'),
				'agama_ibu' => $this->request->getPost('agama_ibu'),
				'agama_wali' => $agama_wali,
				'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
				'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
				'pekerjaan_wali' => $pekerjaan_wali,
				'jenjang_ayah' => $this->request->getPost('jenjang_ayah'),
				'jenjang_ibu' => $this->request->getPost('jenjang_ibu'),
				'jenjang_wali' => $jenjang_wali,
				'id_akun' => $akun->id_akun,
				'id_jenjang_pendidikan' => $this->request->getPost('id_jenjang_pendidikan') ? $this->request->getPost('id_jenjang_pendidikan') : null,
				'kode_calon_peserta_didik' => strtoupper(random_string('alnum', 8)),
				'slug_calon_peserta_didik' => $slug_calon_peserta_didik,
				'nis' => $this->request->getPost('nis'),
				'nisn' => $this->request->getPost('nisn'),
				'status_wn' => $this->request->getPost('status_wn'),
				'negara_asal' => $this->request->getPost('negara_asal'),
				'nama_calon_peserta_didik' => $this->request->getPost('nama_calon_peserta_didik'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tanggal_lahir' => $this->website->tanggal_input($this->request->getPost('tanggal_lahir')),
				'alamat' => $this->request->getPost('alamat'),
				'telepon' => $this->request->getPost('telepon'),
				'kode_pos' => $this->request->getPost('kode_pos'),
				'email' => $akun->email, // email selalu dari akun yang login
				'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
				'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus'),
				'isi' => $this->request->getPost('isi'),
				'nama_ayah' => $this->request->getPost('nama_ayah'),
				'nama_ibu' => $this->request->getPost('nama_ibu'),
				'nama_wali' => $nama_wali,
				'alamat_ayah' => $this->request->getPost('alamat_ayah'),
				'alamat_ibu' => $this->request->getPost('alamat_ibu'),
				'alamat_wali' => $alamat_wali,
				'telepon_ayah' => $this->request->getPost('telepon_ayah'),
				'telepon_ibu' => $this->request->getPost('telepon_ibu'),
				'telepon_wali' => $telepon_wali,
				'goldar_calon_peserta_didik' => $this->request->getPost('goldar_calon_peserta_didik'),
				'hobi_calon_peserta_didik' => $this->request->getPost('hobi_calon_peserta_didik'),
				'penyakit_calon_peserta_didik' => $this->request->getPost('penyakit_calon_peserta_didik'),
				'tinggi' => $this->request->getPost('tinggi'),
				'berat' => $this->request->getPost('berat'),
				'jenis_calon_peserta_didik' => $this->request->getPost('jenis_calon_peserta_didik'),
				'asal_sekolah' => $this->request->getPost('asal_sekolah'),
				'alamat_sekolah_asal' => $this->request->getPost('alamat_sekolah_asal'),
				'tanggal_pindah' => $this->website->tanggal_input($this->request->getPost('tanggal_pindah')),
				'anak_ke' => $this->request->getPost('anak_ke'),
				'jumlah_saudara' => $this->request->getPost('jumlah_saudara'),
				'status_pendaftaran' => 'Menunggu',
				'identitas_wali' => $this->request->getPost('identitas_wali'),
			];

			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$nama_calon_peserta_didik_baru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $nama_calon_peserta_didik_baru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $nama_calon_peserta_didik_baru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $nama_calon_peserta_didik_baru);
				// Add to data array
				$data['gambar'] = $nama_calon_peserta_didik_baru;
			}
			// masuk database
			$m_calon_peserta_didik->tambah($data);


			$this->session->setFlashdata('sukses', 'Data telah disimpan');
			return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $slug_calon_peserta_didik));

		} else {

			$data = [
				'title' => 'Isi Biodata Calon Peserta Didik',
				'description' => 'Isi Data Calon Peserta Didik Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
				'konfigurasi' => $konfigurasi,
				'akun' => $akun,
				'jenjang_pendidikan' => $jenjang_pendidikan,
				'gelombang' => $gelombang,
				'existing_biodata' => $existing_biodata,    // data lama untuk auto-fill
				'registered_jenjang' => $registered_jenjang, // jenjang yang sudah terdaftar di gelombang ini
				'content' => 'calon_peserta_didik/pendaftaran/biodata'
			];
			echo view('calon_peserta_didik/layout/wrapper', $data);
		}
	}


	// edit
	public function edit($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$m_gelombang = new Gelombang_model();

		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$id_gelombang = $calon_peserta_didik->id_gelombang;
		$konfigurasi = $m_konfigurasi->listing();
		$id_akun = $this->session->get('id_akun');
		$akun = $m_akun->detail($id_akun);
		$jenjang_pendidikan = $m_jenjang_pendidikan->nav_jenjang();
		$gelombang = $m_gelombang->detail($id_gelombang);

		if (empty(Session()->get('username_calon_peserta_didik'))) {
			$this->session->setFlashdata('warning', 'Anda belum login');
			return redirect()->to(base_url('signin'));
		}

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama_calon_peserta_didik' => 'required',
				]
			)
		) {

			if ($this->request->getPost('identitas_wali') == 'Ayah') {
				$agama_wali = $this->request->getPost('agama_ayah');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_ayah');
				$id_jenjang_wali = $this->request->getPost('jenjang_ayah');
				$nama_wali = $this->request->getPost('nama_ayah');
				$alamat_wali = $this->request->getPost('alamat_ayah');
				$telepon_wali = $this->request->getPost('telepon_ayah');
			} elseif ($this->request->getPost('identitas_wali') == 'Ibu') {
				$agama_wali = $this->request->getPost('agama_ibu');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_ibu');
				$id_jenjang_wali = $this->request->getPost('jenjang_ibu');
				$nama_wali = $this->request->getPost('nama_ibu');
				$alamat_wali = $this->request->getPost('alamat_ibu');
				$telepon_wali = $this->request->getPost('telepon_ibu');
			} else {
				$agama_wali = $this->request->getPost('agama_wali');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_wali');
				$id_jenjang_wali = $this->request->getPost('jenjang_wali');
				$nama_wali = $this->request->getPost('nama_wali');
				$alamat_wali = $this->request->getPost('alamat_wali');
				$telepon_wali = $this->request->getPost('telepon_wali');
			}
			$data = [
				'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
				'id_admin' => $this->session->get('id_admin'),
				'id_gelombang' => $id_gelombang,
				'agama' => $this->request->getPost('agama'),
				'agama_ayah' => $this->request->getPost('agama_ayah'),
				'agama_ibu' => $this->request->getPost('agama_ibu'),
				'agama_wali' => $agama_wali,
				'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
				'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
				'pekerjaan_wali' => $id_pekerjaan_wali,
				'jenjang_ayah' => $this->request->getPost('jenjang_ayah'),
				'jenjang_ibu' => $this->request->getPost('jenjang_ibu'),
				'jenjang_wali' => $id_jenjang_wali,
				'id_akun' => $akun->id_akun,
				'id_jenjang_pendidikan' => $this->request->getPost('id_jenjang_pendidikan'),
				'nis' => $this->request->getPost('nis'),
				'nisn' => $this->request->getPost('nisn'),
				'status_wn' => $this->request->getPost('status_wn'),
				'negara_asal' => $this->request->getPost('negara_asal'),
				'nama_calon_peserta_didik' => $this->request->getPost('nama_calon_peserta_didik'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tanggal_lahir' => $this->website->tanggal_input($this->request->getPost('tanggal_lahir')),
				'alamat' => $this->request->getPost('alamat'),
				'telepon' => $this->request->getPost('telepon'),
				'kode_pos' => $this->request->getPost('kode_pos'),
				'email' => $akun->email,
				'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
				'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus'),
				'isi' => $this->request->getPost('isi'),
				'nama_ayah' => $this->request->getPost('nama_ayah'),
				'nama_ibu' => $this->request->getPost('nama_ibu'),
				'nama_wali' => $nama_wali,
				'alamat_ayah' => $this->request->getPost('alamat_ayah'),
				'alamat_ibu' => $this->request->getPost('alamat_ibu'),
				'alamat_wali' => $alamat_wali,
				'telepon_ayah' => $this->request->getPost('telepon_ayah'),
				'telepon_ibu' => $this->request->getPost('telepon_ibu'),
				'telepon_wali' => $telepon_wali,
				'goldar_calon_peserta_didik' => $this->request->getPost('goldar_calon_peserta_didik'),
				'hobi_calon_peserta_didik' => $this->request->getPost('hobi_calon_peserta_didik'),
				'penyakit_calon_peserta_didik' => $this->request->getPost('penyakit_calon_peserta_didik'),
				'tinggi' => $this->request->getPost('tinggi'),
				'berat' => $this->request->getPost('berat'),
				'jenis_calon_peserta_didik' => $this->request->getPost('jenis_calon_peserta_didik'),
				'asal_sekolah' => $this->request->getPost('asal_sekolah'),
				'alamat_sekolah_asal' => $this->request->getPost('alamat_sekolah_asal'),
				'tanggal_pindah' => $this->website->tanggal_input($this->request->getPost('tanggal_pindah')),
				'anak_ke' => $this->request->getPost('anak_ke'),
				'jumlah_saudara' => $this->request->getPost('jumlah_saudara'),
				'identitas_wali' => $this->request->getPost('identitas_wali'),
			];

			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$nama_calon_peserta_didik_baru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $nama_calon_peserta_didik_baru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $nama_calon_peserta_didik_baru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $nama_calon_peserta_didik_baru);
				// Add to data array
				$data['gambar'] = $nama_calon_peserta_didik_baru;
			}
			// masuk database
			$m_calon_peserta_didik->edit($data);
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('calon_peserta_didik/pendaftaran'));

		} else {

			$data = [
				'title' => 'Update Biodata Calon Peserta Didik',
				'description' => 'Update Data Calon Peserta Didik Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
				'konfigurasi' => $konfigurasi,
				'akun' => $akun,
				'jenjang_pendidikan' => $jenjang_pendidikan,
				'gelombang' => $gelombang,
				'calon_peserta_didik' => $calon_peserta_didik,
				'content' => 'calon_peserta_didik/pendaftaran/edit'
			];
			echo view('calon_peserta_didik/layout/wrapper', $data);
		}
	}

	// dokumen
	public function dokumen($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_jenis_dokumen = new Jenis_dokumen_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$konfigurasi = $m_konfigurasi->listing();
		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$jenis_dokumen = $m_jenis_dokumen->listing();
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		// Start tambah
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'id_jenis_dokumen' => 'required',
					'gambar' => [
						'uploaded[gambar]',
						'ext_in[gambar,jpg,jpeg,png,pdf]',
						'max_size[gambar,24096]',
					],
				]
			)
		) {
			// Image upload
			$avatar = $this->request->getFile('gambar');
			$namabaru = $avatar->getRandomName();
			$file_ext = $avatar->guessExtension();
			$file_size = $avatar->getSizeByUnit('mb');
			$avatar->move(FCPATH . 'assets/upload/pendaftaran/', $namabaru);
			// masuk database
			$data = array(
				'id_akun' => $akun->id_akun,
				'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
				'id_jenis_dokumen' => $this->request->getVar('id_jenis_dokumen'),
				'kode_dokumen' => strtoupper(random_string('alnum', 32)),
				'gambar' => $namabaru,
				'file_ext' => $file_ext,
				'file_size' => $file_size,
			);
			$m_dokumen->tambah($data);
			return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $slug_calon_peserta_didik))->with('sukses', 'Data Berhasil di Simpan');
		} else {

			$data = [
				'title' => 'Unggah Dokumen',
				'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
				'konfigurasi' => $konfigurasi,
				'akun' => $akun,
				'jenis_dokumen' => $jenis_dokumen,
				'calon_peserta_didik' => $calon_peserta_didik,
				'm_dokumen' => $m_dokumen,
				'content' => 'calon_peserta_didik/pendaftaran/dokumen'
			];
			echo view('calon_peserta_didik/layout/wrapper', $data);
		}
	}

	// Batch upload dokumen (semua berkas sekaligus)
	public function dokumen_batch($slug_calon_peserta_didik)
	{
		$m_akun = new Akun_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		if ($this->request->getMethod() === 'POST') {
			$files = $this->request->getPost('dokumen') ? array_keys($this->request->getPost('dokumen')) : [];
			$uploaded_count = 0;

			// Loop through each jenis_dokumen file input
			foreach ($_FILES['dokumen']['name'] as $id_jenis_dokumen => $filename) {
				if (empty($filename))
					continue; // Skip empty file inputs

				$file = new \CodeIgniter\Files\File($_FILES['dokumen']['tmp_name'][$id_jenis_dokumen]);
				$namabaru = bin2hex(random_bytes(16)) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
				$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
				$file_size = $_FILES['dokumen']['size'][$id_jenis_dokumen] / (1024 * 1024); // Convert to MB

				// Validate extension
				$allowed = ['jpg', 'jpeg', 'png', 'pdf'];
				if (!in_array(strtolower($file_ext), $allowed))
					continue;

				// Move file
				move_uploaded_file(
					$_FILES['dokumen']['tmp_name'][$id_jenis_dokumen],
					FCPATH . 'assets/upload/pendaftaran/' . $namabaru
				);

				// Save to database
				$data = array(
					'id_akun' => $akun->id_akun,
					'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
					'id_jenis_dokumen' => $id_jenis_dokumen,
					'kode_dokumen' => strtoupper(random_string('alnum', 32)),
					'gambar' => $namabaru,
					'file_ext' => $file_ext,
					'file_size' => round($file_size, 2),
				);
				$m_dokumen->tambah($data);
				$uploaded_count++;
			}

			if ($uploaded_count > 0) {
				$this->session->setFlashdata('sukses', $uploaded_count . ' dokumen berhasil diunggah.');
			} else {
				$this->session->setFlashdata('warning', 'Tidak ada dokumen yang dipilih untuk diunggah.');
			}
		}

		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $slug_calon_peserta_didik));
	}

	// selesai
	public function selesai($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_jenis_dokumen = new Jenis_dokumen_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$konfigurasi = $m_konfigurasi->listing();
		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$jenis_dokumen = $m_jenis_dokumen->listing();
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		$data = [
			'title' => 'Pendaftaran Berhasil',
			'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'konfigurasi' => $konfigurasi,
			'akun' => $akun,
			'jenis_dokumen' => $jenis_dokumen,
			'calon_peserta_didik' => $calon_peserta_didik,
			'm_dokumen' => $m_dokumen,
			'content' => 'calon_peserta_didik/pendaftaran/selesai'
		];
		echo view('calon_peserta_didik/layout/wrapper', $data);
	}

	// cetak
	public function cetak($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_jenis_dokumen = new Jenis_dokumen_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$konfigurasi = $m_konfigurasi->listing();
		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$jenis_dokumen = $m_jenis_dokumen->listing();
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		$data = [
			'title' => 'Pendaftaran Peserta Didik Baru - Pendaftaran Berhasil',
			'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'konfigurasi' => $konfigurasi,
			'akun' => $akun,
			'jenis_dokumen' => $jenis_dokumen,
			'calon_peserta_didik' => $calon_peserta_didik,
			'm_dokumen' => $m_dokumen,
			'content' => 'calon_peserta_didik/pendaftaran/selesai'
		];
		// echo view('layout/wrapper',$data);
		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 11,
			'default_font' => 'nunito-regular'
		]);
		$html = view('calon_peserta_didik/pendaftaran/cetak', $data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		// buka di browser
		$mpdf->Output('Informasi-Pendaftaran-' . $calon_peserta_didik->nama_calon_peserta_didik . '.pdf', 'I');
	}

	// Unduh
	public function unduh($kode_dokumen, $kode_calon_peserta_didik)
	{
		$m_dokumen = new Dokumen_model();
		$dokumen = $m_dokumen->kode_dokumen($kode_dokumen);
		if (!file_exists(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar)) {
			$this->session->setFlashdata('warning', 'Mohon maaf, file tidak ditemukan.');
			return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $kode_calon_peserta_didik));
		} else {
			return $this->response->download(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar, null);
		}
	}

	// hapus
	public function hapus($kode_dokumen, $kode_calon_peserta_didik)
	{
		$m_dokumen = new Dokumen_model();
		$data = ['kode_dokumen' => $kode_dokumen];
		$m_dokumen->hapus($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $kode_calon_peserta_didik));
	}

	// hapus
	public function delete($slug_calon_peserta_didik)
	{
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$id_akun = $this->session->get('id_akun');
		$data = [
			'slug_calon_peserta_didik' => $slug_calon_peserta_didik,
			'id_akun' => $id_akun
		];
		$m_calon_peserta_didik->hapus($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran'));
	}
}