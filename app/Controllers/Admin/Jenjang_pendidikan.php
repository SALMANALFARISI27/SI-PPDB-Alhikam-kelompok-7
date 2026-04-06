<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Jenjang_pendidikan_model;
use App\Models\Admin_model;

class Jenjang_pendidikan extends BaseController
{

	// index
	public function index()
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$jenjang_pendidikan = $m_jenjang_pendidikan->listing();
		$title = 'Jenjang Pendidikan (' . count($jenjang_pendidikan) . ')';

		$data = [
			'title' => $title,
			'jenjang_pendidikan' => $jenjang_pendidikan,
			'content' => 'admin/jenjang_pendidikan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// testing
	public function testing()
	{
		$data = [
			'title' => 'Unggah media',
		];
		echo view('admin/jenjang_pendidikan/unggah', $data);
	}


	// jenis_jenjang_pendidikan
	public function jenis_jenjang_pendidikan($jenis_jenjang_pendidikan)
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$jenjang_pendidikan = $m_jenjang_pendidikan->jenis_jenjang_pendidikan_all($jenis_jenjang_pendidikan, 99999, 0);

		$data = [
			'title' => $jenis_jenjang_pendidikan . ' (' . count($jenjang_pendidikan) . ')',
			'jenjang_pendidikan' => $jenjang_pendidikan,
			'content' => 'admin/jenjang_pendidikan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// status_jenjang_pendidikan
	public function status_jenjang_pendidikan($status_jenjang_pendidikan)
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$jenjang_pendidikan = $m_jenjang_pendidikan->status_jenjang_pendidikan_all($status_jenjang_pendidikan, 99999, 0);

		$data = [
			'title' => $status_jenjang_pendidikan . ' (' . count($jenjang_pendidikan) . ')',
			'jenjang_pendidikan' => $jenjang_pendidikan,
			'content' => 'admin/jenjang_pendidikan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// author
	public function author($id_admin)
	{
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$m_admin = new Admin_model();
		$admin = $m_admin->detail($id_admin);
		$jenjang_pendidikan = $m_jenjang_pendidikan->author_all($id_admin);
		$total = $m_jenjang_pendidikan->total_author($id_admin);

		$data = [
			'title' => $admin->nama . ' (' . $total . ')',
			'jenjang_pendidikan' => $jenjang_pendidikan,
			'content' => 'admin/jenjang_pendidikan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_jenjang_pendidikan' => 'required',
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
					'id_admin' => $this->session->get('id_admin'),
					'slug_jenjang_pendidikan' => strtolower(url_title($this->request->getVar('judul_jenjang_pendidikan'))),
					'judul_jenjang_pendidikan' => $this->request->getVar('judul_jenjang_pendidikan'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_jenjang_pendidikan' => $this->request->getVar('status_jenjang_pendidikan'),
					'jenis_jenjang_pendidikan' => $this->request->getVar('jenis_jenjang_pendidikan'),
					'gambar' => $namabaru,
					'urutan' => $this->request->getVar('urutan'),
					'tanggal_post' => date('Y-m-d H:i:s'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_jenjang_pendidikan->tambah($data);
				return redirect()->to(base_url('admin/jenjang_pendidikan'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_jenjang_pendidikan' => strtolower(url_title($this->request->getVar('judul_jenjang_pendidikan'))),
					'judul_jenjang_pendidikan' => $this->request->getVar('judul_jenjang_pendidikan'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_jenjang_pendidikan' => $this->request->getVar('status_jenjang_pendidikan'),
					'jenis_jenjang_pendidikan' => $this->request->getVar('jenis_jenjang_pendidikan'),
					'urutan' => $this->request->getVar('urutan'),
					'tanggal_post' => date('Y-m-d H:i:s'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_jenjang_pendidikan->tambah($data);
				return redirect()->to(base_url('admin/jenjang_pendidikan'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}


		$data = [
			'title' => 'Tambah Jenjang_pendidikan',
			'content' => 'admin/jenjang_pendidikan/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// edit
	public function edit($id_jenjang_pendidikan)
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$jenjang_pendidikan = $m_jenjang_pendidikan->detail($id_jenjang_pendidikan);
		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_jenjang_pendidikan' => 'required',
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
					'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
					'id_admin' => $this->session->get('id_admin'),
					'slug_jenjang_pendidikan' => strtolower(url_title($this->request->getVar('judul_jenjang_pendidikan'))),
					'judul_jenjang_pendidikan' => $this->request->getVar('judul_jenjang_pendidikan'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_jenjang_pendidikan' => $this->request->getVar('status_jenjang_pendidikan'),
					'jenis_jenjang_pendidikan' => $this->request->getVar('jenis_jenjang_pendidikan'),
					'keywords' => $this->request->getVar('keywords'),
					'urutan' => $this->request->getVar('urutan'),
					'gambar' => $namabaru,
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_jenjang_pendidikan->edit($data);
				return redirect()->to(base_url('admin/jenjang_pendidikan'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
					'id_admin' => $this->session->get('id_admin'),
					'slug_jenjang_pendidikan' => strtolower(url_title($this->request->getVar('judul_jenjang_pendidikan'))),
					'judul_jenjang_pendidikan' => $this->request->getVar('judul_jenjang_pendidikan'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_jenjang_pendidikan' => $this->request->getVar('status_jenjang_pendidikan'),
					'jenis_jenjang_pendidikan' => $this->request->getVar('jenis_jenjang_pendidikan'),
					'urutan' => $this->request->getVar('urutan'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_jenjang_pendidikan->edit($data);
				return redirect()->to(base_url('admin/jenjang_pendidikan'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Edit Jenjang_pendidikan: ' . $jenjang_pendidikan->judul_jenjang_pendidikan,
			'jenjang_pendidikan' => $jenjang_pendidikan,
			'content' => 'admin/jenjang_pendidikan/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_jenjang_pendidikan = $this->request->getVar('id_jenjang_pendidikan');
		// check jenjang_pendidikan
		if (empty($this->request->getVar('id_jenjang_pendidikan'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih jenjang_pendidikan. Pilih salah satu jenjang_pendidikan');
		}
		// end check jenjang_pendidikan
		// proses
		if ($submit == 'Update') {
			for ($i = 0; $i < sizeof($id_jenjang_pendidikan ?? []); $i++) {
				$data = array(
					'id_jenjang_pendidikan' => $id_jenjang_pendidikan[$i],
					'id_admin' => $this->session->get('id_admin'),
					'jenis_jenjang_pendidikan' => $this->request->getVar('jenis_jenjang_pendidikan')
				);
				$m_jenjang_pendidikan->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Jenjang_pendidikan berhasil diupdate jenis jenjang_pendidikannya');
		} elseif ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_jenjang_pendidikan ?? []); $i++) {
				$data = array(
					'id_jenjang_pendidikan' => $id_jenjang_pendidikan[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_jenjang_pendidikan' => 'Publish'
				);
				$m_jenjang_pendidikan->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Jenjang_pendidikan berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_jenjang_pendidikan ?? []); $i++) {
				$data = array(
					'id_jenjang_pendidikan' => $id_jenjang_pendidikan[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_jenjang_pendidikan' => 'Draft'
				);
				$m_jenjang_pendidikan->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Jenjang_pendidikan berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_jenjang_pendidikan ?? []); $i++) {
				$data = array('id_jenjang_pendidikan' => $id_jenjang_pendidikan[$i]);
				$m_jenjang_pendidikan->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// Delete
	public function delete($id_jenjang_pendidikan)
	{

		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$data = ['id_jenjang_pendidikan' => $id_jenjang_pendidikan];
		$m_jenjang_pendidikan->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/jenjang_pendidikan'));
	}
}
