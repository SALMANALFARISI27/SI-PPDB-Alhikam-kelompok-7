<?php 
namespace App\Controllers\Calon_peserta_didik;

use CodeIgniter\Controller;

class Profil extends BaseController
{
	public function index()
	{
		$data = [   'title'     	=> 'Data Profil',
					'description'   => 'Data Profil',
                    'keywords'      => 'Data Profil',
					'content'		=> 'calon_peserta_didik/profil/index'
                ];
        return view('calon_peserta_didik/layout/wrapper',$data);
	}
}