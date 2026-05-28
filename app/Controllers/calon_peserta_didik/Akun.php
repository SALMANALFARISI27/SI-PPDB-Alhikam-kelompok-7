<?php
namespace App\Controllers\Calon_peserta_didik;
use App\Models\Akun_model;

class Akun extends BaseController
{
	public function index()
	{
		$m_akun = new Akun_model();
		$id_akun = Session()->get('id_akun');
		$akun = $m_akun->detail($id_akun);

		// proses
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'username' => 'required',
					'email' => 'required|valid_email',
					'password' => 'min_length[6]|max_length[32]',
					'telepon' => 'required',
					'konfirmasi_password' => 'required|matches[password]',
				]
			)
		) {
			$data = array(
				'id_akun' => $id_akun,
				'username' => $this->request->getVar('username'),
				'status_akun' => $akun->status_akun,
				'email' => $this->request->getVar('email'),
				'telepon' => $this->request->getVar('telepon'),
			);
			// Only update password if user actually typed a new one (min 6 chars)
			if (strlen($this->request->getVar('password')) >= 6) {
				$data['password'] = sha1($this->request->getVar('password'));
			}
			$m_akun->edit($data);
			return redirect()->to(base_url('calon_peserta_didik/akun'))->with('sukses', 'Akun berhasil diupdate');
		} else {
			$data = [
				'title' => 'Data Akun',
				'description' => 'Data Akun',
				'keywords' => 'Data Akun',
				'akun' => $akun,
				'content' => 'calon_peserta_didik/akun/index'
			];
			return view('calon_peserta_didik/layout/wrapper', $data);
		}
	}
}