<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Calon_peserta_didik_model;


class Check extends BaseController
{

	// index
	public function index()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$data = [
			'title' => 'Cek Status Pendaftaran',
			'description' => 'Cek Status Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'keywords' => 'Cek Status Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb,
			'm_calon_peserta_didik' => new Calon_peserta_didik_model(),
			'konfigurasi' => $konfigurasi,
			'content' => 'check/index'
		];
		return view('layout/wrapper-pendaftaran', $data);
	}



}