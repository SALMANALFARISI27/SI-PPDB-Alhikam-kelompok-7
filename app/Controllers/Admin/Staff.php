<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Staff_model;
use App\Models\Kategori_staff_model;

class Staff extends BaseController
{

	// mainpage
	public function index()
	{

		$m_staff = new Staff_model();
		$m_kategori_staff = new Kategori_staff_model();
		$kategori_staff = $m_kategori_staff->listing();
		$staff = $m_staff->listing();
		$title = 'Staff(' . count($staff) . ')';

		$data = [
			'title' => $title,
			'staff' => $staff,
			'kategori_staff' => $kategori_staff,
			'content' => 'admin/staff/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// proses
	public function proses()
	{

		$m_kategori = new Kategori_staff_model();
		$m_staff = new Staff_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit = $this->request->getVar('submit');
		$id_staff = $this->request->getVar('id_staff');
		// check staff
		if (empty($this->request->getVar('id_staff'))) {
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih staff. Pilih salah satu staff');
		}
		// end check staff
		// proses
		if ($submit == 'Update') {
			for ($i = 0; $i < sizeof($id_staff ?? []); $i++) {
				$data = array(
					'id_staff' => $id_staff[$i],
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori_staff' => $this->request->getVar('id_kategori_staff')
				);
				$m_staff->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Staff berhasil diupdate jenis staffnya');
		} elseif ($submit == 'Publish') {
			for ($i = 0; $i < sizeof($id_staff ?? []); $i++) {
				$data = array(
					'id_staff' => $id_staff[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_staff' => 'Publish'
				);
				$m_staff->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Staff berhasil dipublikasikan');
		} elseif ($submit == 'Draft') {
			for ($i = 0; $i < sizeof($id_staff ?? []); $i++) {
				$data = array(
					'id_staff' => $id_staff[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_staff' => 'Draft'
				);
				$m_staff->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Staff berhasil tidak dipublikasikan');
		} elseif ($submit == 'Delete') {
			for ($i = 0; $i < sizeof($id_staff ?? []); $i++) {
				$data = array('id_staff' => $id_staff[$i]);
				$m_staff->delete($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// tambah
	public function tambah()
	{

		$m_staff = new Staff_model();
		$m_kategori_staff = new Kategori_staff_model();
		$staff = $m_staff->listing();
		$kategori_staff = $m_kategori_staff->listing();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama' => 'required',
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
				$avatar->move(FCPATH . 'assets/upload/staff/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/staff/' . $namabaru)
					->fit(300, 300, 'center')
					->save(FCPATH . 'assets/upload/staff/thumbs/' . $namabaru);
				// masuk database
				// masuk database
				$data = [
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
					'urutan' => $this->request->getPost('urutan'),
					'nama' => $this->request->getPost('nama'),
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
					'jabatan' => $this->request->getPost('jabatan'),
					'alamat' => $this->request->getPost('alamat'),
					'telepon' => $this->request->getPost('telepon'),
					'email' => $this->request->getPost('email'),
					'keahlian' => $this->request->getPost('keahlian'),
					'gambar' => $namabaru,
					'status_staff' => $this->request->getPost('status_staff'),
					'tempat_lahir' => $this->request->getPost('tempat_lahir'),
					'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
					'tanggal_post' => date('Y-m-d H:i:s')
				];
				$m_staff->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('admin/staff'));
			} else {
				// masuk database
				$data = [
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
					'urutan' => $this->request->getPost('urutan'),
					'nama' => $this->request->getPost('nama'),
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
					'jabatan' => $this->request->getPost('jabatan'),
					'alamat' => $this->request->getPost('alamat'),
					'telepon' => $this->request->getPost('telepon'),
					'email' => $this->request->getPost('email'),
					'keahlian' => $this->request->getPost('keahlian'),
					// 'gambar'		=> $namabaru,
					'status_staff' => $this->request->getPost('status_staff'),
					'tempat_lahir' => $this->request->getPost('tempat_lahir'),
					'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
					'tanggal_post' => date('Y-m-d H:i:s')
				];
				$m_staff->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('admin/staff'));
			}
		} else {
			$data = [
				'title' => 'Tambah Data Staff',
				'staff' => $staff,
				'kategori_staff' => $kategori_staff,
				'content' => 'admin/staff/tambah'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// edit
	public function edit($id_staff)
	{

		$m_kategori_staff = new Kategori_staff_model();
		$m_staff = new Staff_model();
		$staff = $m_staff->detail($id_staff);
		$kategori_staff = $m_kategori_staff->listing();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama' => 'required',
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
				$avatar->move(FCPATH . 'assets/upload/staff/', $namabaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/staff/' . $namabaru)
					->fit(300, 300, 'center')
					->save(FCPATH . 'assets/upload/staff/thumbs/' . $namabaru);
				// masuk database
				// masuk database
				$data = [
					'id_staff' => $id_staff,
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
					'urutan' => $this->request->getPost('urutan'),
					'nama' => $this->request->getPost('nama'),
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
					'jabatan' => $this->request->getPost('jabatan'),
					'alamat' => $this->request->getPost('alamat'),
					'telepon' => $this->request->getPost('telepon'),
					'email' => $this->request->getPost('email'),
					'keahlian' => $this->request->getPost('keahlian'),
					'gambar' => $namabaru,
					'status_staff' => $this->request->getPost('status_staff'),
					'tempat_lahir' => $this->request->getPost('tempat_lahir'),
					'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
				];
				$m_staff->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah disimpan');
				return redirect()->to(base_url('admin/staff'));
			} else {
				// masuk database
				$data = [
					'id_staff' => $id_staff,
					'id_admin' => $this->session->get('id_admin'),
					'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
					'urutan' => $this->request->getPost('urutan'),
					'nama' => $this->request->getPost('nama'),
					'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
					'jabatan' => $this->request->getPost('jabatan'),
					'alamat' => $this->request->getPost('alamat'),
					'telepon' => $this->request->getPost('telepon'),
					'email' => $this->request->getPost('email'),
					'keahlian' => $this->request->getPost('keahlian'),
					// 'gambar'		=> $namabaru,
					'status_staff' => $this->request->getPost('status_staff'),
					'tempat_lahir' => $this->request->getPost('tempat_lahir'),
					'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
				];
				$m_staff->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah disimpan');
				return redirect()->to(base_url('admin/staff'));
			}
		} else {
			$data = [
				'title' => 'Edit Data Staff: ' . $staff->nama,
				'staff' => $staff,
				'kategori_staff' => $kategori_staff,
				'content' => 'admin/staff/edit'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// delete
	public function delete($id_staff)
	{

		$m_staff = new Staff_model();
		$data = ['id_staff' => $id_staff];
		$m_staff->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/staff'));
	}
}
