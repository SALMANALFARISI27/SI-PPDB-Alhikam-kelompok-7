<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Jenis_dokumen_model;
use App\Models\Dokumen_model;
use App\Models\Agama_model;
use App\Models\Akun_model;
use App\Models\Gelombang_model;
use App\Models\Calon_peserta_didik_model;

class Pendaftar extends BaseController
{
	public function index()
	{
		$m_gelombang 	= new Gelombang_model();
		$gelombang 		= $m_gelombang->listing();

		$data = [   'title'     	=> 'Data Pendaftar',
					'gelombang'		=> $gelombang,
					'm_calon_peserta_didik'		=> new Calon_peserta_didik_model(),
					'content'		=> 'admin/pendaftar/index'
                ];
        return view('admin/layout/wrapper',$data);
	}

	// gelombang
	public function gelombang($id_gelombang,$status_calon_peserta_didik)
	{
		$m_gelombang 	= new Gelombang_model();
		$m_calon_peserta_didik 		= new Calon_peserta_didik_model();
		$gelombang 		= $m_gelombang->detail($id_gelombang);
		$calon_peserta_didik 			= $m_calon_peserta_didik->gelombang_status_calon_peserta_didik($id_gelombang,$status_calon_peserta_didik);
		$total_calon_peserta_didik	= $m_calon_peserta_didik->status_calon_peserta_didik_gelombang($status_calon_peserta_didik,$id_gelombang);

		$data = [   'title'     	=> 'Data Pendaftar: '.$gelombang->judul,
					'gelombang'		=> $gelombang,
					'm_calon_peserta_didik'		=> new Calon_peserta_didik_model(),
					'calon_peserta_didik'			=> $calon_peserta_didik,
					'content'		=> 'admin/pendaftar/gelombang'
                ];
        return view('admin/layout/wrapper',$data);
	}
}