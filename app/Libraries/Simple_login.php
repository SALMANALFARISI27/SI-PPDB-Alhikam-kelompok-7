<?php
namespace App\Libraries;
use App\Models\Admin_model;
use App\Models\Akun_model;

class Simple_login
{
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
	}

	// check login admin
	public function login($username, $password, $pengalihan)
	{
		$m_admin = new Admin_model();
		$admin = $m_admin->login($username, $password);
		if ($admin) {
			// Jika username password benar
			$this->session->set('username', $username);
			$this->session->set('id_admin', $admin->id_admin);
			$this->session->set('nama', $admin->nama);

			session_write_close();
			if ($pengalihan !== '') {
				return redirect()->to($pengalihan);
			} else {
				return redirect()->to(base_url('admin/dasbor'));
			}
		} else {
			// jika username password salah
			$this->session->setFlashdata('warning', 'Username atau password salah');
			session_write_close();
			return redirect()->to(base_url('login'));
		}
	}


	// login calon peserta didik dengan redirect
	public function login_calon_peserta_didik($username, $password)
	{
		$m_akun = new Akun_model();
		$user = $m_akun->login($username, sha1($password));

		if ($user) {
			if ($user->status_akun !== 'Aktif') {
				$this->session->setFlashdata('warning', 'Akun Anda belum diaktivasi. Silakan cek email untuk link aktivasi.');
				session_write_close();
				return redirect()->to(base_url('signin'));
			}

			$this->session->set('username_calon_peserta_didik', $username);
			$this->session->set('id_akun', $user->id_akun);
			$this->session->set('nama_calon_peserta_didik', $user->username);
			$this->session->set('jenis_akun', $user->jenis_akun);

			session_write_close();
			return redirect()->to(base_url('calon_peserta_didik/dasbor'));
		} else {
			$this->session->setFlashdata('warning', 'Username atau password salah');
			session_write_close();
			return redirect()->to(base_url('signin'));
		}
	}

	// check login calon peserta didik (bisa dieksekusi di controller)
	public function checklogin_calon_peserta_didik()
	{
		if (empty($this->session->get('username_calon_peserta_didik'))) {
			$pengalihan = str_replace('index.php/', '', current_url());
			$this->session->set('pengalihan_calon_peserta_didik', $pengalihan);
			$this->session->setFlashdata('warning', 'Anda belum login');
			session_write_close();
			// Gunakan header native hanya sebagai fallback terakhir, tapi idealnya return redirect di controller
			header("Location: " . base_url('signin') . '?redirect=' . $pengalihan);
			exit;
		}
	}

	// check login admin
	public function checklogin()
	{
		if (empty($this->session->get('username'))) {
			$pengalihan = str_replace('index.php/', '', current_url());
			$this->session->set('pengalihan', $pengalihan);
			$this->session->setFlashdata('warning', 'Anda belum login');
			session_write_close();
			header("Location: " . base_url('login') . '?redirect=' . $pengalihan);
			exit;
		}
	}

	// logout admin
	public function logout()
	{
		$this->session->remove('username');
		$this->session->remove('id_admin');
		$this->session->remove('nama');
		$this->session->remove('pengalihan');
		$this->session->setFlashdata('sukses', 'Anda berhasil logout');
		session_write_close();
		return redirect()->to(base_url('login?logout=sukses'));
	}

	// logout calon peserta didik
	public function logout_calon_peserta_didik()
	{
		$this->session->remove('username_calon_peserta_didik');
		$this->session->remove('id_akun');
		$this->session->remove('jenis_akun');
		$this->session->remove('nama_calon_peserta_didik');
		$this->session->remove('nis');
		$this->session->remove('nisn');
		$this->session->remove('pengalihan_calon_peserta_didik');
		$this->session->setFlashdata('sukses', 'Anda berhasil logout');
		session_write_close();
		return redirect()->to(base_url('signin?logout=sukses'));
	}
}
