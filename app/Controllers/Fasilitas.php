<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Fasilitas_model;


class Fasilitas extends BaseController
{
	// Fasilitas
	public function index()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_fasilitas = new Fasilitas_model();
		$konfigurasi = $m_konfigurasi->listing();
		$status_fasilitas = 'Publish';
		$total = $m_fasilitas->total_status_fasilitas($status_fasilitas);
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$fasilitas = $m_fasilitas->status_fasilitas($perPage, $page, $status_fasilitas);

		$data = [
			'title' => 'FASILITAS ' . $konfigurasi->namaweb,
			'description' => 'Fasilitas ' . $konfigurasi->namaweb,
			'keywords' => 'Fasilitas ' . $konfigurasi->namaweb,
			'fasilitas' => $fasilitas,
			'konfigurasi' => $konfigurasi,
			'pagination' => $pager_links,
			'content' => 'fasilitas/index'
		];
		return view('layout/wrapper', $data);
	}



	// read
	public function read($slug_fasilitas)
	{
		$m_fasilitas = new Fasilitas_model();
		$fasilitas = $m_fasilitas->read($slug_fasilitas);
		$fasilitas_list = $m_fasilitas->home(10, 'Publish');
		// Update hits
		$data = [
			'id_fasilitas' => $fasilitas->id_fasilitas,
			'hits' => $fasilitas->hits + 1
		];
		$m_fasilitas->edit($data);
		// Update hits
		$data = [
			'title' => $fasilitas->judul_fasilitas,
			'description' => $fasilitas->judul_fasilitas,
			'keywords' => $fasilitas->judul_fasilitas,
			'fasilitas' => $fasilitas,
			'fasilitas_list' => $fasilitas_list,
			'content' => 'fasilitas/read'
		];
		return view('layout/wrapper', $data);
	}

}