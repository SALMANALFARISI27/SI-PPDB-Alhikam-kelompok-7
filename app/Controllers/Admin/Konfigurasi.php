<?php
namespace App\Controllers\Admin;

use App\Models\Konfigurasi_model;


class Konfigurasi extends BaseController
{

	// mainpage
	public function index()
	{

		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'namaweb' => 'required|min_length[3]',
				]
			)
		) {
			// masuk database
			$data = [
				'id_konfigurasi' => $konfigurasi->id_konfigurasi,
				'id_admin' => $this->session->get('id_admin'),
				'namaweb' => $this->request->getPost('namaweb'),
				'tagline' => $this->request->getPost('tagline'),
				'tentang' => $this->request->getPost('tentang'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'email' => $this->request->getPost('email'),
				'email_cadangan' => $this->request->getPost('email_cadangan'),
				'alamat' => $this->request->getPost('alamat'),
				'telepon' => $this->request->getPost('telepon'),
				'whatsapp' => $this->request->getPost('whatsapp'),
				'pesan_whatsapp' => $this->request->getPost('pesan_whatsapp'),
				'hp' => $this->request->getPost('hp'),
				'facebook' => $this->request->getPost('facebook'),
				'instagram' => $this->request->getPost('instagram'),
				'youtube' => $this->request->getPost('youtube'),
				'nama_facebook' => $this->request->getPost('nama_facebook'),
				'nama_instagram' => $this->request->getPost('nama_instagram'),
				'nama_youtube' => $this->request->getPost('nama_youtube'),
				'nama_tiktok' => $this->request->getPost('nama_tiktok'),
				'tiktok' => $this->request->getPost('tiktok'),
				'google_map' => $this->request->getPost('google_map'),
				'paginasi_depan' => $this->request->getPost('paginasi_depan'),
				'fitur_pendaftaran' => $this->request->getPost('fitur_pendaftaran'),
				'mulai_pendaftaran' => $this->website->tanggal_input($this->request->getPost('mulai_pendaftaran')),
				'selesai_pendaftaran' => $this->website->tanggal_input($this->request->getPost('selesai_pendaftaran')),
				'pengumuman_pendaftaran' => $this->website->tanggal_input($this->request->getPost('pengumuman_pendaftaran')),
				'keterangan_pendaftaran' => $this->request->getPost('keterangan_pendaftaran'),
			];
			$m_konfigurasi->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi'));
		} else {
			$data = [
				'title' => 'Konfigurasi Website',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/index'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// pendaftaran
	public function pendaftaran()
	{

		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'keterangan_pendaftaran' => 'required|min_length[3]',
				]
			)
		) {
			// masuk database
			$data = [
				'id_konfigurasi' => $konfigurasi->id_konfigurasi,
				'id_admin' => $this->session->get('id_admin'),
				'fitur_pendaftaran' => $this->request->getPost('fitur_pendaftaran'),
				'mulai_pendaftaran' => $this->website->tanggal_input($this->request->getPost('mulai_pendaftaran')),
				'selesai_pendaftaran' => $this->website->tanggal_input($this->request->getPost('selesai_pendaftaran')),
				'pengumuman_pendaftaran' => $this->website->tanggal_input($this->request->getPost('pengumuman_pendaftaran')),
				'keterangan_pendaftaran' => $this->request->getPost('keterangan_pendaftaran'),
			];
			$m_konfigurasi->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/pendaftaran'));
		} else {
			$data = [
				'title' => 'Buka atau Tutup Formulir PPDB Online',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/pendaftaran'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// email
	public function email()
	{

		// $this->simple_login->checkadmin();
		$m_site = new Konfigurasi_model();
		$site = $m_site->listing();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'smtp_user' => 'required|min_length[3]',
				]
			)
		) {
			// masuk database
			$data = [
				'id_konfigurasi' => $this->request->getPost('id_konfigurasi'),
				'id_admin' => $this->session->get('id_admin'),
				'protocol' => $this->request->getPost('protocol'),
				'smtp_host' => $this->request->getPost('smtp_host'),
				'smtp_port' => $this->request->getPost('smtp_port'),
				'smtp_timeout' => $this->request->getPost('smtp_timeout'),
				'smtp_user' => $this->request->getPost('smtp_user'),
				'smtp_pass' => $this->request->getPost('smtp_pass'),
			];
			$m_site->edit($data);
			// UPDATE VERSI
			$this->session->setFlashdata('sukses', 'Konfigurasi email telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/email'));
		} else {

			$data = [
				'title' => 'Setting Email',
				'site' => $site,
				'content' => 'admin/konfigurasi/email'
			];
			return view('admin/layout/wrapper', $data);
		}
	}


	// banner
	public function banner()
	{

		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;
		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'id_konfigurasi' => 'required',
					'banner' => [
						'ext_in[banner,jpg,jpeg,gif,png,svg]',
						'max_size[banner,4096]',
					],
				]
			)
		) {
			if (!empty($_FILES['banner']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('banner');
				$namabaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = [
					'id_konfigurasi' => $konfigurasi->id_konfigurasi,
					'id_admin' => $this->session->get('id_admin'),
					'tentang' => $this->request->getPost('tentang'),
					'banner' => $namabaru,
					'ringkasan' => $this->request->getPost('ringkasan')
				];
				$m_konfigurasi->edit($data);
			} else {
				$data = [
					'id_konfigurasi' => $konfigurasi->id_konfigurasi,
					'id_admin' => $this->session->get('id_admin'),
					'tentang' => $this->request->getPost('tentang'),
					'ringkasan' => $this->request->getPost('ringkasan')
				];
				$m_konfigurasi->edit($data);
			}
			// masuk database
			$this->session->setFlashdata('sukses', 'About Us dan Banner telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/banner'));
		} else {
			$data = [
				'title' => 'About Us dan Banner',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/banner'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}



	// logo
	public function logo()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate([
				'id_konfigurasi' => 'required',
				'logo' => [
					'uploaded[logo]',
					'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[logo,4096]',
				],
			])
		) {
			// Image upload
			$avatar = $this->request->getFile('logo');

			// Generate nama baru secara otomatis
			$namabaru = $avatar->getRandomName();

			// Pindahkan file ke folder yang ditentukan
			$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);

			// Create thumbnail
			$image = \Config\Services::image()
				->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
				->fit(100, 100, 'center')
				->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);

			// Hapus file lama jika ada (opsional)
			if (!empty($konfigurasi->logo) && file_exists(FCPATH . 'assets/upload/image/' . $konfigurasi->logo)) {
				unlink(FCPATH . 'assets/upload/image/' . $konfigurasi->logo);
			}
			if (!empty($konfigurasi->logo) && file_exists(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->logo)) {
				unlink(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->logo);
			}

			// Update database dengan nama file baru
			$data = [
				'id_konfigurasi' => $konfigurasi->id_konfigurasi,
				'id_admin' => $this->session->get('id_admin'),
				'logo' => $namabaru
			];
			$m_konfigurasi->edit($data);

			// Notifikasi sukses
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/logo'));
		} else {
			// End validasi
			$data = [
				'title' => 'Update Logo Website',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/logo'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// login
	public function login()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate([
				'id_konfigurasi' => 'required',
				'login' => [
					'uploaded[login]',
					'mime_in[login,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[login,4096]',
				],
			])
		) {
			// Image upload
			$avatar = $this->request->getFile('login');

			// Generate nama baru secara otomatis
			$namabaru = $avatar->getRandomName();

			// Pindahkan file ke folder yang ditentukan
			$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);

			// Create thumbnail
			$image = \Config\Services::image()
				->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
				->fit(100, 100, 'center')
				->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);

			// Hapus file lama jika ada (opsional)
			if (!empty($konfigurasi->login) && file_exists(FCPATH . 'assets/upload/image/' . $konfigurasi->login)) {
				unlink(FCPATH . 'assets/upload/image/' . $konfigurasi->login);
			}
			if (!empty($konfigurasi->login) && file_exists(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->login)) {
				unlink(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->login);
			}

			// Update database dengan nama file baru
			$data = [
				'id_konfigurasi' => $konfigurasi->id_konfigurasi,
				'id_admin' => $this->session->get('id_admin'),
				'login' => $namabaru
			];
			$m_konfigurasi->edit($data);

			// Notifikasi sukses
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/login'));
		} else {
			// End validasi
			$data = [
				'title' => 'Update Gambar Background Login',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/login'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}


	// icon
	public function icon()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$id_konfigurasi = $konfigurasi->id_konfigurasi;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate([
				'id_konfigurasi' => 'required',
				'icon' => [
					'uploaded[icon]',
					'mime_in[icon,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[icon,4096]',
				],
			])
		) {
			// Image upload
			$avatar = $this->request->getFile('icon');

			// Generate nama baru secara otomatis
			$namabaru = $avatar->getRandomName();

			// Pindahkan file ke folder yang ditentukan
			$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);

			// Create thumbnail
			$image = \Config\Services::image()
				->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
				->fit(100, 100, 'center')
				->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);

			// Hapus file icon lama jika ada
			if (!empty($konfigurasi->icon) && file_exists(FCPATH . 'assets/upload/image/' . $konfigurasi->icon)) {
				unlink(FCPATH . 'assets/upload/image/' . $konfigurasi->icon);
			}
			if (!empty($konfigurasi->icon) && file_exists(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->icon)) {
				unlink(FCPATH . 'assets/upload/image/thumbs/' . $konfigurasi->icon);
			}

			// Update database dengan nama file baru
			$data = [
				'id_konfigurasi' => $konfigurasi->id_konfigurasi,
				'id_admin' => $this->session->get('id_admin'),
				'icon' => $namabaru
			];
			$m_konfigurasi->edit($data);

			// Notifikasi sukses
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/konfigurasi/icon'));
		} else {
			// End validasi
			$data = [
				'title' => 'Update Icon Website',
				'konfigurasi' => $konfigurasi,
				'content' => 'admin/konfigurasi/icon'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

}
