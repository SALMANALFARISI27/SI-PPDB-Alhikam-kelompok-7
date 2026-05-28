<?php
namespace App\Controllers\Admin;

use App\Models\Portofolio_model;

class Portofolio extends BaseController
{

	// index
	public function index()
	{

		$m_portofolio = new Portofolio_model();
		$portofolio = $m_portofolio->listing();
		$title = 'Portofolio (' . count($portofolio) . ')';

		$data = [
			'title' => $title,
			'portofolio' => $portofolio,
			'content' => 'admin/portofolio/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{

		$m_portofolio = new Portofolio_model();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_portofolio' => 'required',
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
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_portofolio' => strtolower(url_title($this->request->getVar('judul_portofolio'))),
					'judul_portofolio' => $this->request->getVar('judul_portofolio'),
					'isi' => $this->request->getVar('isi'),
					'gambar' => $namabaru,
					'status_portofolio' => $this->request->getVar('status_portofolio'),
					'tanggal_post' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i:s', strtotime($this->request->getVar('jam')))
				);
				$m_portofolio->tambah($data);
				return redirect()->to(base_url('admin/portofolio'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_portofolio' => strtolower(url_title($this->request->getVar('judul_portofolio'))),
					'judul_portofolio' => $this->request->getVar('judul_portofolio'),
					'isi' => $this->request->getVar('isi'),
					'status_portofolio' => $this->request->getVar('status_portofolio'),
					'tanggal_post' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i:s', strtotime($this->request->getVar('jam')))
				);
				$m_portofolio->tambah($data);
				return redirect()->to(base_url('admin/portofolio'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Tambah Portofolio',
			'content' => 'admin/portofolio/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_portofolio = new Portofolio_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_portofolio = $this->request->getVar('id_portofolio');
		// check portofolio
		if (empty($this->request->getVar('id_portofolio'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih portofolio. Pilih salah satu portofolio');
		}
		// end check portofolio
		// proses
		if ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_portofolio ?? []); $i++) {
				$data = array(
					'id_portofolio' => $id_portofolio[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_portofolio' => 'Publish'
				);
				$m_portofolio->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Portofolio berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_portofolio ?? []); $i++) {
				$data = array(
					'id_portofolio' => $id_portofolio[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_portofolio' => 'Draft'
				);
				$m_portofolio->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Portofolio berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_portofolio ?? []); $i++) {
				$data = array('id_portofolio' => $id_portofolio[$i]);
				$m_portofolio->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// edit
	public function edit($id_portofolio)
	{

		$m_portofolio = new Portofolio_model();
		$portofolio = $m_portofolio->detail($id_portofolio);
		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_portofolio' => 'required',
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
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_portofolio' => $id_portofolio,
					'id_admin' => $this->session->get('id_admin'),
					'slug_portofolio' => strtolower(url_title($this->request->getVar('judul_portofolio'))),
					'judul_portofolio' => $this->request->getVar('judul_portofolio'),
					'isi' => $this->request->getVar('isi'),
					'gambar' => $namabaru,
					'status_portofolio' => $this->request->getVar('status_portofolio'),
					'tanggal_post' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i:s', strtotime($this->request->getVar('jam')))
				);
				$m_portofolio->edit($data);
				return redirect()->to(base_url('admin/portofolio'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_portofolio' => $id_portofolio,
					'id_admin' => $this->session->get('id_admin'),
					'slug_portofolio' => strtolower(url_title($this->request->getVar('judul_portofolio'))),
					'judul_portofolio' => $this->request->getVar('judul_portofolio'),
					'isi' => $this->request->getVar('isi'),
					'status_portofolio' => $this->request->getVar('status_portofolio'),
					'tanggal_post' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i:s', strtotime($this->request->getVar('jam')))
				);
				$m_portofolio->edit($data);
				return redirect()->to(base_url('admin/portofolio'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Edit Portofolio: ' . $portofolio->judul_portofolio,
			'portofolio' => $portofolio,
			'content' => 'admin/portofolio/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Delete
	public function delete($id_portofolio)
	{

		$m_portofolio = new Portofolio_model();
		$data = ['id_portofolio' => $id_portofolio];
		$m_portofolio->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/portofolio'));
	}
}
