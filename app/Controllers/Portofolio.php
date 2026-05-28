<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Portofolio_model;

class Portofolio extends BaseController
{
	// Portofolio
	public function index()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_portofolio = new Portofolio_model();
		$konfigurasi = $m_konfigurasi->listing();
		$status_portofolio = 'Publish';
		$total = $m_portofolio->total_status_portofolio($status_portofolio);
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$portofolio = $m_portofolio->status_portofolio($perPage, $page, $status_portofolio);

		$data = [
			'title' => 'PORTOFOLIO ' . $konfigurasi->namaweb,
			'description' => 'Portofolio ' . $konfigurasi->namaweb,
			'keywords' => 'Portofolio ' . $konfigurasi->namaweb,
			'portofolio' => $portofolio,
			'konfigurasi' => $konfigurasi,
			'pagination' => $pager_links,
			'content' => 'portofolio/index'
		];
		return view('layout/wrapper', $data);
	}

	// read
	public function read($slug_portofolio)
	{
		$m_portofolio = new Portofolio_model();
		$portofolio = $m_portofolio->read($slug_portofolio);
		if (!$portofolio) {
			return redirect()->to(base_url('portofolio'));
		}
		$portofolio_list = $m_portofolio->home(10, 'Publish');
		// Update hits
		$data = [
			'id_portofolio' => $portofolio->id_portofolio,
			'hits' => $portofolio->hits + 1
		];
		$m_portofolio->edit($data);
		// Update hits
		$data = [
			'title' => $portofolio->judul_portofolio,
			'description' => $portofolio->judul_portofolio,
			'keywords' => $portofolio->judul_portofolio,
			'portofolio' => $portofolio,
			'portofolio_list' => $portofolio_list,
			'content' => 'portofolio/read'
		];
		return view('layout/wrapper', $data);
	}
}