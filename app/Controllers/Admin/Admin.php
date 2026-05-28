<?php
namespace App\Controllers\Admin;

use App\Models\Admin_model;

class Admin extends BaseController
{

	// mainpage
	public function index()
	{

		$m_admin = new Admin_model();
		$user = $m_admin->listing();
		$total = $m_admin->total();

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama' => 'required',
					'username' => 'required|min_length[3]|is_unique[admin.username]',
				]
			)
		) {
			// masuk database
			$data = [
				'nama' => $this->request->getPost('nama'),
				'email' => $this->request->getPost('email'),
				'username' => $this->request->getPost('username'),
				'password' => sha1($this->request->getPost('password')),

			];
			$m_admin->tambah($data);
			// masuk database
			$this->session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('admin/admin'));
		} else {
			$data = [
				'title' => 'Data Admin: ' . $total->total,
				'user' => $user,
				'content' => 'admin/admin/index'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// edit
	public function edit($id_admin)
	{

		$m_admin = new Admin_model();
		$user = $m_admin->detail($id_admin);

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama' => 'required|min_length[3]',
				]
			)
		) {
			// masuk database
			if (strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32) {
				$data = [
					'id_admin' => $id_admin,
					'nama' => $this->request->getPost('nama'),
					'email' => $this->request->getPost('email'),
					'username' => $this->request->getPost('username'),
					'password' => sha1($this->request->getPost('password'))
				];
			} else {
				$data = [
					'id_admin' => $id_admin,
					'nama' => $this->request->getPost('nama'),
					'email' => $this->request->getPost('email'),
					'username' => $this->request->getPost('username')
				];
			}
			$m_admin->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses', 'Data telah diedit');
			return redirect()->to(base_url('admin/admin'));
		} else {
			$data = [
				'title' => 'Edit Pengguna: ' . $user->nama,
				'user' => $user,
				'content' => 'admin/admin/edit'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// delete
	public function delete($id_admin)
	{

		$m_admin = new Admin_model();
		$data = ['id_admin' => $id_admin];
		$m_admin->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/admin'));
	}
}
