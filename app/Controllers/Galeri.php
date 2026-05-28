<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;

class Galeri extends BaseController
{
	// Galeri Foto
	public function index()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_galeri = new Galeri_model();
		$konfigurasi = $m_konfigurasi->listing();
		$total = $m_galeri->total_jenis('Foto');
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$galeri = $m_galeri->paginasi_jenis('Foto', $perPage, $page);

		$data = [
			'title' => 'GALERI FOTO',
			'description' => 'Galeri Foto ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'keywords' => 'Galeri Foto ' . $konfigurasi->namaweb,
			'galeri' => $galeri,
			'pagination' => $pager_links,
			'konfigurasi' => $konfigurasi,
			'content' => 'galeri/index'
		];
		return view('layout/wrapper', $data);
	}

	// Galeri Video
	public function video()
	{
		$pager = service('pager');
		$m_konfigurasi = new Konfigurasi_model();
		$m_galeri = new Galeri_model();
		$konfigurasi = $m_konfigurasi->listing();
		$total = $m_galeri->total_jenis('Video');
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = $this->website->paginasi_depan();
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$galeri = $m_galeri->paginasi_jenis('Video', $perPage, $page);

		$data = [
			'title' => 'GALERI VIDEO',
			'description' => 'Galeri Video ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'keywords' => 'Galeri Video ' . $konfigurasi->namaweb,
			'galeri' => $galeri,
			'pagination' => $pager_links,
			'konfigurasi' => $konfigurasi,
			'content' => 'galeri/video'
		];
		return view('layout/wrapper', $data);
	}

	// Read
	public function read($slug_galeri)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_galeri = new Galeri_model();
		$konfigurasi = $m_konfigurasi->listing();
		$galeri = $m_galeri->read($slug_galeri);
		if (!$galeri) {
			return redirect()->to(base_url('galeri'));
		}
		$galeri_list = $m_galeri->home($this->website->paginasi_depan());

		// Update hits
		$data = [
			'id_galeri' => $galeri->id_galeri,
			'hits' => $galeri->hits + 1
		];
		$m_galeri->edit($data);
		// Update hits

		$data = [
			'title' => $galeri->judul_galeri,
			'description' => $galeri->judul_galeri,
			'keywords' => $galeri->judul_galeri,
			'galeri' => $galeri,
			'galeri_list' => $galeri_list,
			'content' => 'galeri/read'
		];
		return view('layout/wrapper', $data);
	}

}