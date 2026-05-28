<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Ekstrakurikuler_model;


class Ekstrakurikuler extends BaseController
{
	// Ekstrakurikuler
	public function index()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_ekstrakurikuler = new Ekstrakurikuler_model();
		$konfigurasi = $m_konfigurasi->listing();
		$status_ekstrakurikuler = 'Publish';
		$total = $m_ekstrakurikuler->total_status_ekstrakurikuler($status_ekstrakurikuler);
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$ekstrakurikuler = $m_ekstrakurikuler->status_ekstrakurikuler($perPage, $page, $status_ekstrakurikuler);

		$data = [
			'title' => 'EKSTRAKURIKULER ' . $konfigurasi->namaweb,
			'description' => 'Ekstrakurikuler ' . $konfigurasi->namaweb,
			'keywords' => 'Ekstrakurikuler ' . $konfigurasi->namaweb,
			'ekstrakurikuler' => $ekstrakurikuler,
			'konfigurasi' => $konfigurasi,
			'pagination' => $pager_links,
			'content' => 'ekstrakurikuler/index'
		];
		return view('layout/wrapper', $data);
	}



	// read
	public function read($slug_ekstrakurikuler)
	{
		$m_ekstrakurikuler = new Ekstrakurikuler_model();
		$ekstrakurikuler = $m_ekstrakurikuler->read($slug_ekstrakurikuler);
		$ekstrakurikuler_list = $m_ekstrakurikuler->home(10, 'Publish');
		// Update hits
		$data = [
			'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
			'hits' => $ekstrakurikuler->hits + 1
		];
		$m_ekstrakurikuler->edit($data);
		// Update hits
		$data = [
			'title' => $ekstrakurikuler->judul_ekstrakurikuler,
			'description' => $ekstrakurikuler->judul_ekstrakurikuler,
			'keywords' => $ekstrakurikuler->judul_ekstrakurikuler,
			'ekstrakurikuler' => $ekstrakurikuler,
			'ekstrakurikuler_list' => $ekstrakurikuler_list,
			'content' => 'ekstrakurikuler/read'
		];
		return view('layout/wrapper', $data);
	}
}