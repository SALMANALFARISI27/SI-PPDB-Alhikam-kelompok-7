<?php 
namespace App\Controllers\Admin;

use App\Models\Kategori_berita_profile_model;

class Kategori_berita_profile extends BaseController
{

	// mainpage
	public function index()
	{
		
		$m_kategori = new Kategori_berita_profile_model();
		$kategori 	= $m_kategori->listing();
		$total 		= $m_kategori->total();

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
            'nama_kategori' 	=> 'required|min_length[3]|is_unique[kategori_berita_profile.nama_kategori]',
        	])) {
			// masuk database
			$slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE); 
			$data = [	'id_admin' => $this->session->get('id_admin'),
						'nama_kategori'	=> $this->request->getPost('nama_kategori'),
						'slug_kategori'	=> $slug,
						'urutan'		=> $this->request->getPost('urutan')
					];
			$m_kategori->tambah($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/kategori_berita_profile'));
	    }else{
			$data = [	'title'			=> 'Kategori Berita, Profile: '.$total->total,
						'kategori'		=> $kategori,
						'content'		=> 'admin/kategori_berita_profile/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_kategori_berita_profile)
	{
		
		$m_kategori = new Kategori_berita_profile_model();
		$kategori 	= $m_kategori->detail($id_kategori_berita_profile);
		$total 		= $m_kategori->total();

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
            'nama_kategori' 	=> 'required|min_length[3]',
        	])) {
			// masuk database
			$slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE); 
			$data = [	'id_kategori_berita_profile'	=> $id_kategori_berita_profile,
						'id_admin' => $this->session->get('id_admin'),
						'nama_kategori'	=> $this->request->getPost('nama_kategori'),
						'slug_kategori'	=> $slug,
						'urutan'		=> $this->request->getPost('urutan')
					];
			$m_kategori->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/kategori_berita_profile'));
	    }else{
			$data = [	'title'			=> 'Edit kategori berita: '.$kategori->nama_kategori,
						'kategori'		=> $kategori,
						'content'		=> 'admin/kategori_berita_profile/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_kategori_berita_profile)
	{
		
		$m_kategori = new Kategori_berita_profile_model();
		$data = ['id_kategori_berita_profile'	=> $id_kategori_berita_profile];
		$m_kategori->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/kategori_berita_profile'));
	}
}

