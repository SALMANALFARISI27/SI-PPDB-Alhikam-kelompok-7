<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Berita_model;
use App\Models\Kategori_model;
use App\Models\Admin_model;

class Berita extends BaseController
{

	// index
	public function index()
	{

		$m_berita = new Berita_model();
		$m_kategori = new Kategori_model();
		$kategori = $m_kategori->listing();
		$berita = $m_berita->listing();
		$title = 'Berita, Profil, (' . count($berita) . ')';

		$data = [
			'title' => $title,
			'berita' => $berita,
			'kategori' => $kategori,
			'content' => 'admin/berita/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// testing
	public function testing()
	{
		$data = [
			'title' => 'Unggah media',
		];
		echo view('admin/berita/unggah', $data);
	}

	// kategori
	public function kategori($id_kategori)
	{

		$m_berita = new Berita_model();
		$m_kategori = new Kategori_model();
		$kategori = $m_kategori->detail($id_kategori);
		$berita = $m_berita->kategori($id_kategori);
		$total = count($berita);

		$data = [
			'title' => $kategori->nama_kategori . ' (' . $total . ')',
			'berita' => $berita,
			'content' => 'admin/berita/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// jenis_berita
	public function jenis_berita($jenis_berita)
	{

		$m_berita = new Berita_model();
		$m_kategori = new Kategori_model();
		$berita = $m_berita->jenis_publish($jenis_berita);

		$data = [
			'title' => $jenis_berita . ' (' . count($berita) . ')',
			'berita' => $berita,
			'content' => 'admin/berita/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// status_berita
	public function status_berita($status_berita)
	{

		$m_berita = new Berita_model();
		$m_kategori = new Kategori_model();
		$berita = $m_berita->status_berita_all($status_berita, 99999, 0);

		$data = [
			'title' => $status_berita . ' (' . count($berita) . ')',
			'berita' => $berita,
			'content' => 'admin/berita/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// author
	public function author($id_admin)
	{

		$m_berita = new Berita_model();
		$m_kategori = new Kategori_model();
		$m_admin = new Admin_model();
		$admin = $m_admin->detail($id_admin);
		$berita = $m_berita->author_all($id_admin);
		$total = $m_berita->total_author($id_admin);

		$data = [
			'title' => $admin->nama . ' (' . $total . ')',
			'berita' => $berita,
			'content' => 'admin/berita/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{

		$m_kategori = new Kategori_model();
		$m_berita = new Berita_model();
		$kategori = $m_kategori->listing();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_berita' => 'required',
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
				if (!is_dir(FCPATH . 'assets/upload/image/thumbs/')) {
					mkdir(FCPATH . 'assets/upload/image/thumbs/', 0777, true);
				}
				$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'slug_berita' => strtolower(url_title($this->request->getVar('judul_berita'))),
					'judul_berita' => $this->request->getVar('judul_berita'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_berita' => $this->request->getVar('status_berita'),
					'jenis_berita' => $this->request->getVar('jenis_berita'),
					'gambar' => $namabaru,
					'urutan' => $this->request->getVar('urutan'),
					'tanggal_post' => date('Y-m-d H:i:s'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_berita->tambah($data);
				return redirect()->to(base_url('admin/berita'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'slug_berita' => strtolower(url_title($this->request->getVar('judul_berita'))),
					'judul_berita' => $this->request->getVar('judul_berita'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_berita' => $this->request->getVar('status_berita'),
					'jenis_berita' => $this->request->getVar('jenis_berita'),
					'urutan' => $this->request->getVar('urutan'),
					'tanggal_post' => date('Y-m-d H:i:s'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_berita->tambah($data);
				return redirect()->to(base_url('admin/berita'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}


		$data = [
			'title' => 'Tambah Berita',
			'kategori' => $kategori,
			'content' => 'admin/berita/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// edit
	public function edit($id_berita)
	{

		$m_kategori = new Kategori_model();
		$m_berita = new Berita_model();
		$kategori = $m_kategori->listing();
		$berita = $m_berita->detail($id_berita);
		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul_berita' => 'required',
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
				if (!is_dir(FCPATH . 'assets/upload/image/thumbs/')) {
					mkdir(FCPATH . 'assets/upload/image/thumbs/', 0777, true);
				}
				$avatar->move(FCPATH . 'assets/upload/image/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $namabaru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $namabaru);
				// masuk database
				$data = array(
					'id_berita' => $id_berita,
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'slug_berita' => strtolower(url_title($this->request->getVar('judul_berita'))),
					'judul_berita' => $this->request->getVar('judul_berita'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_berita' => $this->request->getVar('status_berita'),
					'jenis_berita' => $this->request->getVar('jenis_berita'),

					'urutan' => $this->request->getVar('urutan'),
					'gambar' => $namabaru,
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_berita->edit($data);
				return redirect()->to(base_url('admin/berita'))->with('sukses', 'Data Berhasil di Simpan');
			} else {
				$data = array(
					'id_berita' => $id_berita,
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'slug_berita' => strtolower(url_title($this->request->getVar('judul_berita'))),
					'judul_berita' => $this->request->getVar('judul_berita'),
					'ringkasan' => $this->request->getVar('ringkasan'),
					'isi' => $this->request->getVar('isi'),
					'status_berita' => $this->request->getVar('status_berita'),
					'jenis_berita' => $this->request->getVar('jenis_berita'),

					'urutan' => $this->request->getVar('urutan'),
					'tanggal_publish' => date('Y-m-d', strtotime($this->request->getVar('tanggal_publish'))) . ' ' . date('H:i', strtotime($this->request->getVar('jam')))
				);
				$m_berita->edit($data);
				return redirect()->to(base_url('admin/berita'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [
			'title' => 'Edit Berita: ' . $berita->judul_berita,
			'kategori' => $kategori,
			'berita' => $berita,
			'content' => 'admin/berita/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_kategori = new Kategori_model();
		$m_berita = new Berita_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_berita = $this->request->getVar('id_berita');
		// check berita
		if (empty($this->request->getVar('id_berita'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih berita. Pilih salah satu berita');
		}
		// end check berita
		// proses
		if ($submit == 'Update') {
			for ($i = 0; $i < sizeof($id_berita ?? []); $i++) {
				$data = array(
					'id_berita' => $id_berita[$i],
					'id_admin' => $this->session->get('id_admin'),
					'jenis_berita' => $this->request->getVar('jenis_berita')
				);
				$m_berita->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Berita berhasil diupdate jenis beritanya');
		} elseif ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_berita ?? []); $i++) {
				$data = array(
					'id_berita' => $id_berita[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_berita' => 'Publish'
				);
				$m_berita->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Berita berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_berita ?? []); $i++) {
				$data = array(
					'id_berita' => $id_berita[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_berita' => 'Draft'
				);
				$m_berita->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Berita berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_berita ?? []); $i++) {
				$data = array('id_berita' => $id_berita[$i]);
				$m_berita->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// Delete
	public function delete($id_berita)
	{

		$m_berita = new Berita_model();
		$data = ['id_berita' => $id_berita];
		$m_berita->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/berita'));
	}
}
