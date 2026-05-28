<?php
namespace App\Controllers\Calon_peserta_didik;

use App\Models\Calon_peserta_didik_model;
use App\Models\Gelombang_model;

class Gelombang extends BaseController
{
	public function index()
	{
		$m_gelombang = new Gelombang_model();
		$m_calon = new Calon_peserta_didik_model();
		$gelombang = $m_gelombang->aktif();

		$registered_ids = [];
		if (Session()->get('id_akun')) {
			$my_registrations = $m_calon->akun(Session()->get('id_akun'));
			foreach ($my_registrations as $reg) {
				$registered_ids[] = $reg->id_gelombang;
			}
		}

		$data = [
			'title' => 'Periode Pendaftaran Peserta Didik Baru (PPDB)',
			'description' => 'Dasbor Pendaftar',
			'keywords' => 'Dasbor Pendaftar',
			'gelombang' => $gelombang,
			'gelombang2' => $gelombang,
			'registered_ids' => $registered_ids,
			'content' => 'calon_peserta_didik/gelombang/index'
		];
		return view('calon_peserta_didik/layout/wrapper', $data);
	}
}