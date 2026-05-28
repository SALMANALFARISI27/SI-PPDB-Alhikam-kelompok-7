<?php
namespace App\Controllers\Admin;

use App\Models\Galeri_model;

class Galeri extends BaseController
{

	// index
	public function index()
	{

		$m_galeri = new Galeri_model();
		$galeri = $m_galeri->listing();
		$title = 'Galeri (' . count($galeri) . ')';

		$data = [
			'title' => $title,
			'galeri' => $galeri,
			'content' => 'admin/galeri/index'
		];
		echo view('admin/layout/wrapper', $data);
	}


	// Tambah
	public function tambah()
	{

		$m_galeri = new Galeri_model();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_galeri' => 'required',
					'gambar' => [
						'uploaded[gambar]',
						'ext_in[gambar,jpg,jpeg,gif,png,svg]',
						'max_size[gambar,4096]',
					],
				]
			)
		) {
			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$namabaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
					->fit(300, 300, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_galeri' => strtolower(url_title($this->request->getVar('judul_galeri'))),
					'judul_galeri' => $this->request->getVar('judul_galeri'),
					'jenis_galeri' => $this->request->getVar('jenis_galeri'),
					'isi' => $this->request->getVar('isi'),
					'url_video' => $this->request->getVar('url_video'),
					'status_galeri' => $this->request->getVar('status_galeri'),
					'gambar' => $namabaru,
				);
				$m_galeri->tambah($data);
				return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_galeri' => strtolower(url_title($this->request->getVar('judul_galeri'))),
					'judul_galeri' => $this->request->getVar('judul_galeri'),
					'jenis_galeri' => $this->request->getVar('jenis_galeri'),
					'isi' => $this->request->getVar('isi'),
					'url_video' => $this->request->getVar('url_video'),
					'status_galeri' => $this->request->getVar('status_galeri'),
				);
				$m_galeri->tambah($data);
				return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Tambah Galeri',
			'content' => 'admin/galeri/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_galeri = new Galeri_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_galeri = $this->request->getVar('id_galeri');
		// check galeri
		if (empty($this->request->getVar('id_galeri'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih galeri. Pilih salah satu galeri');
		}
		// end check galeri
		// proses
		if ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_galeri ?? []); $i++) {
				$data = array(
					'id_galeri' => $id_galeri[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_galeri' => 'Publish'
				);
				$m_galeri->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Galeri berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_galeri ?? []); $i++) {
				$data = array(
					'id_galeri' => $id_galeri[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_galeri' => 'Draft'
				);
				$m_galeri->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Galeri berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_galeri ?? []); $i++) {
				$data = array('id_galeri' => $id_galeri[$i]);
				$m_galeri->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// edit
	public function edit($id_galeri)
	{

		$m_galeri = new Galeri_model();
		$galeri = $m_galeri->detail($id_galeri);
		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_galeri' => 'required',
					'gambar' => [
						'ext_in[gambar,jpg,jpeg,gif,png,svg]',
						'max_size[gambar,4096]',
					],
				]
			)
		) {
			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$namabaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
					->fit(300, 300, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_galeri' => $id_galeri,
					'id_admin' => $this->session->get('id_admin'),
					'slug_galeri' => strtolower(url_title($this->request->getVar('judul_galeri'))),
					'judul_galeri' => $this->request->getVar('judul_galeri'),
					'jenis_galeri' => $this->request->getVar('jenis_galeri'),
					'isi' => $this->request->getVar('isi'),
					'url_video' => $this->request->getVar('url_video'),
					'status_galeri' => $this->request->getVar('status_galeri'),
					'gambar' => $namabaru,
				);
				$m_galeri->edit($data);
				return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_galeri' => $id_galeri,
					'id_admin' => $this->session->get('id_admin'),
					'slug_galeri' => strtolower(url_title($this->request->getVar('judul_galeri'))),
					'judul_galeri' => $this->request->getVar('judul_galeri'),
					'jenis_galeri' => $this->request->getVar('jenis_galeri'),
					'isi' => $this->request->getVar('isi'),
					'url_video' => $this->request->getVar('url_video'),
					'status_galeri' => $this->request->getVar('status_galeri'),
				);
				$m_galeri->edit($data);
				return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Edit Galeri: ' . $galeri->judul_galeri,
			'galeri' => $galeri,
			'content' => 'admin/galeri/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Delete
	public function delete($id_galeri)
	{

		$m_galeri = new Galeri_model();
		$data = ['id_galeri' => $id_galeri];
		$m_galeri->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/galeri'));
	}
}
