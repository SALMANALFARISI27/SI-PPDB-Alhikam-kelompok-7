<?php
namespace App\Controllers\Calon_peserta_didik;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Berita_model;
use App\Models\Calon_peserta_didik_model;
use App\Models\Akun_model;
use App\Models\Jenis_dokumen_model;
use App\Models\Dokumen_model;
use App\Models\Gelombang_model;
use App\Models\Jenjang_pendidikan_model;
use App\Models\Nav_model;

class Gelombang extends BaseController
{
	public function index()
	{
		$m_gelombang = new Gelombang_model();
		$gelombang = $m_gelombang->aktif();

		$data = [
			'title' => 'Periode Pendaftaran Peserta Didik Baru (PPDB)',
			'description' => 'Dasbor Pendaftar',
			'keywords' => 'Dasbor Pendaftar',
			'gelombang' => $gelombang,
			'gelombang2' => $gelombang,
			'content' => 'calon_peserta_didik/gelombang/index'
		];
		return view('calon_peserta_didik/layout/wrapper', $data);
	}
}