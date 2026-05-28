<?php 
namespace App\Controllers\Calon_peserta_didik;

class Dasbor extends BaseController
{
	public function index()
	{
		$data = [   'title'     	=> 'Dasbor Pendaftar',
					'description'   => 'Dasbor Pendaftar',
                    'keywords'      => 'Dasbor Pendaftar',
					'content'		=> 'calon_peserta_didik/dasbor/index'
                ];
        return view('calon_peserta_didik/layout/wrapper',$data);
	}
}