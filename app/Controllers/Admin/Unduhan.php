<?php
namespace App\Controllers\Admin;

use App\Models\Unduhan_model;
use App\Models\Admin_model;

class Unduhan extends BaseController
{

	// index
	public function index()
	{

		$m_unduhan = new Unduhan_model();
		$unduhan = $m_unduhan->listing();
		$title = 'Unduhan (' . count($unduhan) . ')';

		$data = [
			'title' => $title,
			'unduhan' => $unduhan,
			'content' => 'admin/unduhan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}




	// author
	public function author($id_admin)
	{

		$m_unduhan = new Unduhan_model();
		$m_admin = new Admin_model();
		$admin = $m_admin->detail($id_admin);
		$unduhan = $m_unduhan->author_all($id_admin);
		$total = $m_unduhan->total_author($id_admin);

		$data = [
			'title' => $admin->nama . ' (' . $total . ')',
			'unduhan' => $unduhan,
			'content' => 'admin/unduhan/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{

		$m_unduhan = new Unduhan_model();

		// Start tambah
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_unduhan' => 'required',
					'file' => [
						'uploaded[file]',
						'mime_in[file,image/jpg,image/jpeg,image/png,image/gif,application/zip,application/x-rar-compressed,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf]',
						'max_size[file,24096]',
					],
				]
			)
		) {
			if (!empty($_FILES['file']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('file');
				$namabaru = $avatar->getRandomName();
				$file_ext = $avatar->guessExtension();
				$file_size = $avatar->getSizeByUnit('mb');
				$avatar->move(FCPATH . 'assets/upload/file/', $namabaru);
				// masuk database
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_unduhan' => strtolower(url_title($this->request->getVar('judul_unduhan'))),
					'judul_unduhan' => $this->request->getVar('judul_unduhan'),

					'isi' => $this->request->getVar('isi'),
					'file' => $namabaru,
					'file_ext' => $file_ext,
					'file_size' => $file_size,
					'status_unduhan' => $this->request->getVar('status_unduhan'),
					'tanggal_post' => date('Y-m-d H:i:s')
				);
				$m_unduhan->tambah($data);
				return redirect()->to(base_url('admin/unduhan'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'slug_unduhan' => strtolower(url_title($this->request->getVar('judul_unduhan'))),
					'judul_unduhan' => $this->request->getVar('judul_unduhan'),

					'isi' => $this->request->getVar('isi'),
					'status_unduhan' => $this->request->getVar('status_unduhan'),
					'tanggal_post' => date('Y-m-d H:i:s')
				);
				$m_unduhan->tambah($data);
				return redirect()->to(base_url('admin/unduhan'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}
		// end database

		$data = [
			'title' => 'Tambah Unduhan',
			'content' => 'admin/unduhan/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// edit
	public function edit($id_unduhan)
	{

		$m_unduhan = new Unduhan_model();
		$unduhan = $m_unduhan->detail($id_unduhan);
		// Start database
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_unduhan' => 'required',
					'file' => [

						'mime_in[file,image/jpg,image/jpeg,image/png,image/gif,application/zip,application/x-rar-compressed,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf]',
						'max_size[file,24096]',
					],
				]
			)
		) {
			if (!empty($_FILES['file']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('file');
				$file_ext = $avatar->guessExtension();
				$file_size = $avatar->getSizeByUnit('mb');
				$namabaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/file/', $namabaru);
				// masuk database
				$data = array(
					'id_unduhan' => $id_unduhan,
					'id_admin' => $this->session->get('id_admin'),
					'slug_unduhan' => strtolower(url_title($this->request->getVar('judul_unduhan'))),
					'judul_unduhan' => $this->request->getVar('judul_unduhan'),

					'isi' => $this->request->getVar('isi'),
					'file' => $namabaru,
					'file_ext' => $file_ext,
					'file_size' => $file_size,
					'status_unduhan' => $this->request->getVar('status_unduhan'),
				);
				$m_unduhan->edit($data);
				return redirect()->to(base_url('admin/unduhan'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_unduhan' => $id_unduhan,
					'id_admin' => $this->session->get('id_admin'),
					'slug_unduhan' => strtolower(url_title($this->request->getVar('judul_unduhan'))),
					'judul_unduhan' => $this->request->getVar('judul_unduhan'),

					'isi' => $this->request->getVar('isi'),
					'status_unduhan' => $this->request->getVar('status_unduhan'),
				);
				$m_unduhan->edit($data);
				return redirect()->to(base_url('admin/unduhan'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}
		// end database
		$data = [
			'title' => 'Edit Unduhan: ' . $unduhan->judul_unduhan,
			'unduhan' => $unduhan,
			'content' => 'admin/unduhan/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_unduhan = new Unduhan_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_unduhan = $this->request->getVar('id_unduhan');
		// check unduhan
		if (empty($this->request->getVar('id_unduhan'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih unduhan. Pilih salah satu unduhan');
		}
		// end check unduhan
		if ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_unduhan ?? []); $i++) {
				$data = array(
					'id_unduhan' => $id_unduhan[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_unduhan' => 'Publish'
				);
				$m_unduhan->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Unduhan berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_unduhan ?? []); $i++) {
				$data = array(
					'id_unduhan' => $id_unduhan[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_unduhan' => 'Draft'
				);
				$m_unduhan->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Unduhan berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_unduhan ?? []); $i++) {
				$data = array('id_unduhan' => $id_unduhan[$i]);
				$m_unduhan->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// unduh
	public function unduh($id_unduhan)
	{

		$m_unduhan = new Unduhan_model();
		$unduhan = $m_unduhan->detail($id_unduhan);
		if (!file_exists(FCPATH . 'assets/upload/file/' . $unduhan->file)) {
			$this->session->setFlashdata('warning', 'Mohon maaf, file tidak ditemukan.');
			return redirect()->to(base_url('admin/unduhan'));
		} else {
			return $this->response->download(FCPATH . 'assets/upload/file/' . $unduhan->file, null);
		}
	}

	// Delete
	public function delete($id_unduhan)
	{

		$m_unduhan = new Unduhan_model();
		$data = ['id_unduhan' => $id_unduhan];
		$m_unduhan->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/unduhan'));
	}
}
