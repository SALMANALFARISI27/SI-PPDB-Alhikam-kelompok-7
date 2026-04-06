<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Berita_model;
use App\Models\Calon_peserta_didik_model;
use App\Models\Akun_model;
use App\Models\Jenis_dokumen_model;
use App\Models\Dokumen_model;


class Check extends BaseController
{

	// index
	public function index()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$m_akun = new Akun_model();
		$kode_akun = strtoupper(random_string('alnum', 64));

		$data = [
			'title' => 'Cek Status Pendaftaran',
			'description' => 'Cek Status Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'keywords' => 'Cek Status Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb,
			'm_calon_peserta_didik' => new Calon_peserta_didik_model(),
			'konfigurasi' => $konfigurasi,
			'content' => 'check/index'
		];
		echo view('layout/wrapper-pendaftaran', $data);
	}



}