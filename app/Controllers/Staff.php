<?php
namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Staff_model;

class Staff extends BaseController
{
	// Staff
	public function index()
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_staff = new Staff_model();
		$konfigurasi = $m_konfigurasi->listing();
		$staff = $m_staff->home(100);

		$data = [
			'title' => 'Guru, Staff, dan Pimpinan',
			'description' => 'Guru, Staff, dan Pimpinan ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
			'keywords' => 'Guru, Staff, dan Pimpinan ' . $konfigurasi->namaweb,
			'staff' => $staff,
			'konfigurasi' => $konfigurasi,
			'content' => 'staff/index'
		];
		return view('layout/wrapper', $data);
	}

	// detail
	public function detail($slug_staff)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_staff = new Staff_model();
		$konfigurasi = $m_konfigurasi->listing();
		$staff = $m_staff->read($slug_staff);
		if (!$staff) {
			return redirect()->to(base_url('staff'));
		}

		$data = [
			'title' => $staff->nama,
			'description' => $staff->nama,
			'keywords' => $staff->nama,
			'staff' => $staff,
			'konfigurasi' => $konfigurasi,
			'content' => 'staff/detail'
		];
		return view('layout/wrapper', $data);
	}
}