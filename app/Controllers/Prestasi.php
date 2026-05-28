<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Prestasi_model;


class Prestasi extends BaseController
{
	// Prestasi
	public function index()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_prestasi = new Prestasi_model();
		$konfigurasi = $m_konfigurasi->listing();
		$status_prestasi = 'Publish';
		$total = $m_prestasi->total_status_prestasi($status_prestasi);
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$prestasi = $m_prestasi->status_prestasi($perPage, $page, $status_prestasi);

		$data = [
			'title' => 'PRESTASI ' . $konfigurasi->namaweb,
			'description' => 'Prestasi ' . $konfigurasi->namaweb,
			'keywords' => 'Prestasi ' . $konfigurasi->namaweb,
			'prestasi' => $prestasi,
			'konfigurasi' => $konfigurasi,
			'pagination' => $pager_links,
			'content' => 'prestasi/index'
		];
		return view('layout/wrapper', $data);
	}



	// read
	public function read($slug_prestasi)
	{
		$m_prestasi = new Prestasi_model();
		$prestasi = $m_prestasi->read($slug_prestasi);
		$prestasi_list = $m_prestasi->home(10, 'Publish');
		// Update hits
		$data = [
			'id_prestasi' => $prestasi->id_prestasi,
			'hits' => $prestasi->hits + 1
		];
		$m_prestasi->edit($data);
		// Update hits
		$data = [
			'title' => $prestasi->judul_prestasi,
			'description' => $prestasi->judul_prestasi,
			'keywords' => $prestasi->judul_prestasi,
			'prestasi' => $prestasi,
			'prestasi_list' => $prestasi_list,
			'content' => 'prestasi/read'
		];
		return view('layout/wrapper', $data);
	}
}