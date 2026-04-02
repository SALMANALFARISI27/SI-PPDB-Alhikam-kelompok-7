<?php
namespace App\Libraries;
use App\Models\User_model;
use App\Models\Calon_peserta_didik_model;
use App\Models\Akun_model;

class Simple_login
{
	// check login
	public function login($username, $password, $pengalihan)
	{
		$this->session = \Config\Services::session();
		$uri = service('uri');
		$m_user = new User_model();
		$user = $m_user->login($username, $password);
		if ($user) {
			// Jika username password benar
			$this->session->set('username', $username);
			$this->session->set('id_user', $user->id_user);
			$this->session->set('id_staff', $user->id_staff);
			$this->session->set('nama', $user->nama);
			$this->session->set('akses_level', $user->akses_level);
			// $this->session->setFlashdata('warning', 'Hai '.$user->nama.', Anda berhasil login');
			// return redirect()->to(base_url('admin/dasbor'));
			if ($pengalihan !== '') {
				header("Location: " . $pengalihan);
			} else {
				header("Location: admin/dasbor");
			}

			exit;
		} else {
			// jika username password salah
			$this->session->setFlashdata('warning', 'Username atau password salah');
			return redirect()->to(base_url('login'));
		}
	}

	// check login
	public function login_calon_peserta_didik_akun($username, $password)
	{
		$this->session = \Config\Services::session();
		$uri = service('uri');
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_akun = new Akun_model();
		$user = $m_akun->login($username, sha1($password));

		if ($user) {
			// Jika username password benar
			$this->session->set('username_calon_peserta_didik', $username);
			$this->session->set('id_akun', $user->id_akun);
			$this->session->set('nama', $user->nama);
			$this->session->set('jenis_akun', $user->jenis_akun);
		}
	}

	// check login
	public function login_calon_peserta_didik($username, $password)
	{
		$this->session = \Config\Services::session();
		$uri = service('uri');
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_akun = new Akun_model();

		$user = $m_akun->login($username, sha1($password));
		$user2 = $m_akun->login_nis($username, sha1($password));

		if ($user) {
			// Jika username password benar
			$this->session->set('username_calon_peserta_didik', $username);
			$this->session->set('id_akun', $user->id_akun);
			$this->session->set('nama_calon_peserta_didik', $user->nama);
			$this->session->set('jenis_akun', $user->jenis_akun);
			header("Location: " . base_url('calon_peserta_didik/dasbor'));
			exit;
		} elseif ($user2) {
			// Jika username password benar
			$this->session->set('username_calon_peserta_didik', $username);
			$this->session->set('id_akun', $user2->id_akun);
			$this->session->set('nama_calon_peserta_didik', $user2->nama_calon_peserta_didik);
			$this->session->set('jenis_akun', $user2->jenis_akun);
			header("Location: " . base_url('calon_peserta_didik/dasbor'));
		} else {
			// jika username password salah
			$this->session->setFlashdata('warning', 'Username atau password salah');
			return redirect()->to(base_url('signin'));
		}
	}

	// check login
	public function checklogin_calon_peserta_didik()
	{
		$this->session = \Config\Services::session();
		if ($this->session->get('username_calon_peserta_didik') == '') {
			$pengalihan = str_replace('index.php/', '', current_url());
			$this->session->set('pengalihan_calon_peserta_didik', $pengalihan);
			$this->session->setFlashdata('warning', 'Anda belum login');
			header("Location: " . base_url('signin')) . '?redirect=' . $pengalihan;
			exit;
		}
	}
	// check login
	public function checklogin()
	{
		$this->session = \Config\Services::session();
		if ($this->session->get('username') == '') {
			$pengalihan = str_replace('index.php/', '', current_url());
			$this->session->set('pengalihan', $pengalihan);
			$this->session->setFlashdata('warning', 'Anda belum login');
			header("Location: " . base_url('login')) . '?redirect=' . $pengalihan;
			exit;
		}
	}



	// check logout
	public function logout()
	{
		$this->session = \Config\Services::session();
		$this->session->remove('username');
		$this->session->remove('id_user');
		$this->session->remove('akses_level');
		$this->session->remove('nama');
		$this->session->remove('pengalihan');
		$this->session->setFlashdata('sukses', 'Anda berhasil logout');
		header("Location: " . base_url('login?logout=sukses'));
		exit;
	}

	// logout_calon_peserta_didik
	public function logout_calon_peserta_didik()
	{
		$this->session = \Config\Services::session();
		$this->session->remove('username_calon_peserta_didik');
		$this->session->remove('id_akun');
		$this->session->remove('jenis_akun');
		$this->session->remove('nama_calon_peserta_didik');
		$this->session->remove('nis');
		$this->session->remove('nisn');
		$this->session->remove('pengalihan_calon_peserta_didik');
		$this->session->setFlashdata('sukses', 'Anda berhasil logout');
		header("Location: " . base_url('signin?logout=sukses'));
		exit;
	}
}