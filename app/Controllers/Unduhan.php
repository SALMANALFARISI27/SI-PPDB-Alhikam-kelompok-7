<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Unduhan_model;


class Unduhan extends BaseController
{
	// Download
	public function index()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_unduhan = new Unduhan_model();
		$konfigurasi = $m_konfigurasi->listing();
		$pager = service('pager');
		$total = $m_unduhan->total_status_unduhan('Publish');
		$page = (int) ($this->request->getGet('page') ?? 1);
		$perPage = 1000;
		$pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
		$page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
		$unduhan = $m_unduhan->status_unduhan_all('Publish', $perPage, $page);

		$data = [
			'title' => 'DOWNLOAD',
			'description' => 'Download File ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,

			'unduhan' => $unduhan,
			'konfigurasi' => $konfigurasi,
			'pagination' => $pager_links,
			'content' => 'unduhan/index'
		];
		return view('layout/wrapper', $data);
	}



	// Unduh
	public function baca($slug_unduhan)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_unduhan = new Unduhan_model();
		$konfigurasi = $m_konfigurasi->listing();
		$unduhan = $m_unduhan->read($slug_unduhan);
		if (!$unduhan) {
			return redirect()->to(base_url('unduhan'));
		}
		// Update hits
		$data = [
			'id_unduhan' => $unduhan->id_unduhan,
			'hits' => $unduhan->hits + 1
		];
		$m_unduhan->edit($data);
		// Update hits
		$data = [
			'title' => $unduhan->judul_unduhan,
			'description' => $unduhan->judul_unduhan,
			'keywords' => $unduhan->judul_unduhan,
			'unduhan' => $unduhan,
			'konfigurasi' => $konfigurasi,
			'content' => 'unduhan/baca'
		];
		return view('layout/wrapper', $data);
	}

	// Unduh
	public function unduh($slug_unduhan)
	{
		$m_unduhan = new Unduhan_model();
		$unduhan = $m_unduhan->read($slug_unduhan);
		if (!$unduhan) {
			return redirect()->to(base_url('unduhan'));
		}
		// Update hits
		$data = [
			'id_unduhan' => $unduhan->id_unduhan,
			'hits' => $unduhan->hits + 1
		];
		$m_unduhan->edit($data);
		// Update hits
		if (!file_exists(FCPATH . 'assets/upload/file/' . $unduhan->file)) {
			$this->session->setFlashdata('warning', 'Mohon maaf, file tidak ditemukan.');
			return redirect()->to(base_url('unduhan'));
		} else {
			return $this->response->download(FCPATH . 'assets/upload/file/' . $unduhan->file, null);
		}
	}
}