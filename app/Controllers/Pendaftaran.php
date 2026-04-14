<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Akun_model;
use App\Models\Gelombang_model;
use App\Models\Calon_peserta_didik_model;

class Pendaftaran extends BaseController
{

	// index
	public function index()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_gelombang = new Gelombang_model();
		$konfigurasi = $m_konfigurasi->listing();
		$gelombang = $m_gelombang->aktif();

		$m_akun = new Akun_model();
		$m_calon = new Calon_peserta_didik_model();
		$kode_akun = strtoupper(random_string('alnum', 64));

		$registered_ids = [];
		if (Session()->get('id_akun')) {
			$my_registrations = $m_calon->akun(Session()->get('id_akun'));
			foreach ($my_registrations as $reg) {
				$registered_ids[] = $reg->id_gelombang;
			}
		}

		$data = [
			'title' => 'Periode Pendaftaran',
			'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,

			'konfigurasi' => $konfigurasi,
			'gelombang' => $gelombang,
			'gelombang2' => $gelombang,
			'registered_ids' => $registered_ids,
			'content' => 'pendaftaran/index'
		];
		echo view('layout/wrapper-pendaftaran', $data);
	}

	// Kontak
	public function akun()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$m_akun = new Akun_model();
		$kode_akun = strtoupper(random_string('alnum', 64));

		// proses
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'nama' => 'required',
					'email' => 'required|valid_email|is_unique[akun.email]',
					'password' => 'required|min_length[6]|max_length[32]',
					'telepon' => 'required',
					'konfirmasi_password' => 'required|matches[password]',
				]
			)
		) {
			$data = array(
				'jenis_akun' => 'Pendaftar',
				'status_akun' => 'Menunggu',
				'username' => $this->request->getVar('nama'),
				'email' => $this->request->getVar('email'),
				'password' => sha1($this->request->getVar('password')),
				'telepon' => $this->request->getVar('telepon'),
				'kode_akun' => $kode_akun,
				'link_reset' => $kode_akun
			);
			$m_akun->tambah($data);
			// Kirim email aktivasi (jangan auto-login, akun harus diaktivasi dulu)
			$email = $this->request->getVar('email');
			$link_reset = base_url('pendaftaran/aktivasi/' . $kode_akun);
			$subject = 'Pendaftaran Akun Berhasil - ' . $this->website->namaweb();

			// Konfigurasi SMTP
			$clean_host = str_replace(['ssl://', 'tls://'], '', $konfigurasi->smtp_host);
			$email_config = [
				'protocol' => strtolower($konfigurasi->protocol),
				'SMTPHost' => $clean_host,
				'SMTPUser' => $konfigurasi->smtp_user,
				'SMTPPass' => $konfigurasi->smtp_pass,
				'SMTPPort' => (int) $konfigurasi->smtp_port,
				'SMTPCrypto' => ((int) $konfigurasi->smtp_port == 465) ? 'ssl' : (((int) $konfigurasi->smtp_port == 587) ? 'tls' : ''),
				'SMTPTimeout' => (int) $konfigurasi->smtp_timeout,
				'mailType' => 'html',
				'charset' => 'utf-8',
				'CRLF' => "\r\n",
				'newline' => "\r\n"
			];

			// Isi email
			$message = "<p>Hai <strong>{$this->request->getVar('nama')}</strong>,</p>";
			$message .= "<p>Pendaftaran Akun Anda telah berhasil.</p>";
			$message .= "<p>Silakan klik link di bawah ini untuk mengaktifkan akun Anda:</p>";
			$message .= "<p><a href='{$link_reset}' style='background-color: #28a745; color: #ffffff; padding: 10px 20px; text-decoration: none;'>Aktifkan Akun</a></p>";
			$message .= "<p>Jika Anda tidak melakukan pendaftaran ini, abaikan email ini.</p>";
			$message .= "<p>Terima kasih,<br>Tim " . $this->website->namaweb() . "</p>";

			// Load email library
			$email_service = \Config\Services::email();
			$email_service->initialize($email_config);
			$email_service->setFrom($konfigurasi->smtp_user, $this->website->namaweb());
			$email_service->setTo($email);
			$email_service->setSubject($subject);
			$email_service->setMessage($message);

			// Kirim email
			if ($email_service->send()) {
				$this->session->setFlashdata('sukses', 'Akun berhasil dibuat! Silakan cek email Anda untuk mengaktifkan akun sebelum melakukan pendaftaran.');
			} else {
				$this->session->setFlashdata('sukses', 'Akun berhasil dibuat! Silakan cek email Anda untuk mengaktifkan akun. Jika email tidak masuk, hubungi admin.');
			}
			return redirect()->to(base_url('signin'));
			// end login
		} else {
			$data = [
				'title' => 'Buat Akun',
				'description' => 'Buat Akun Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,

				'content' => 'pendaftaran/akun'
			];
			echo view('layout/wrapper-pendaftaran', $data);
		}
	}

	// testing
	public function testing()
	{
		// $this->simple_login->login_calon_peserta_didik_akun('andoyoandoyo@gmail.com','andoyoandoyo');
		echo Session()->get('username_calon_peserta_didik');
	}

	// Aktivasi Akun
	public function aktivasi($kode_akun)
	{
		$m_akun = new Akun_model();
		$akun = $m_akun->kode_akun($kode_akun);
		
		if (!$akun) {
			$this->session->setFlashdata('warning', 'Kode aktivasi tidak valid atau akun tidak ditemukan');
			return redirect()->to(base_url('signin'));
		}
		
		$data = [
			'id_akun' => $akun->id_akun,
			'status_akun' => 'Aktif'
		];
		$m_akun->edit($data);
		$this->session->setFlashdata('sukses', 'Aktivasi akun berhasil. Silakan login menggunakan akun Anda.');
		return redirect()->to(base_url('signin'));
	}

	// biodata
	public function biodata($id_gelombang)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/biodata/' . $id_gelombang));
	}

	// dokumen
	public function dokumen($slug_calon_peserta_didik)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/dokumen/' . $slug_calon_peserta_didik));
	}

	// selesai
	public function selesai($slug_calon_peserta_didik)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/selesai/' . $slug_calon_peserta_didik));
	}

	// cetak
	public function cetak($slug_calon_peserta_didik)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/cetak/' . $slug_calon_peserta_didik));
	}

	// Unduh
	public function unduh($kode_dokumen, $kode_calon_peserta_didik)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/unduh/' . $kode_dokumen . '/' . $kode_calon_peserta_didik));
	}

	// hapus
	public function hapus($kode_dokumen, $kode_calon_peserta_didik)
	{
		return redirect()->to(base_url('calon_peserta_didik/pendaftaran/hapus/' . $kode_dokumen . '/' . $kode_calon_peserta_didik));
	}
}
