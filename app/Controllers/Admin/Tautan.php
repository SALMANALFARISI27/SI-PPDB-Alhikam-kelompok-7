<?php 
namespace App\Controllers\Admin;

use App\Models\Tautan_model;

class Tautan extends BaseController
{

	// mainpage
	public function index()
	{
		
		$m_tautan 	= new Tautan_model();
		$tautan 		= $m_tautan->listing();
		$total 				= $m_tautan->total();

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
				'nama_tautan' 	=> 'required|is_unique[tautan.nama_tautan]',
				'link_tautan' 			=> 'required|is_unique[tautan.link_tautan]',
				'gambar'	 			=> [
								                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
								                'max_size[gambar,4096]',
			            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  					= $this->request->getFile('gambar');
				$nama_tautanbaru 	= $avatar->getRandomName();
	            $avatar->move(FCPATH . 'assets/upload/image/',$nama_tautanbaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(FCPATH . 'assets/upload/image/'.$nama_tautanbaru)
			    ->fit(300,200, 'center')
			    ->save(FCPATH . 'assets/upload/image/thumbs/'.$nama_tautanbaru);
	        	// masuk database
	        	$slug 	= strtolower(url_title($this->request->getVar('nama_tautan')));
				$data = [	'id_admin' => $this->session->get('id_admin'),
							'slug_tautan'			=> $slug,
							'nama_tautan'			=> $this->request->getPost('nama_tautan'),
							'keterangan'				=> $this->request->getPost('keterangan'),
							'status_tautan'		=> $this->request->getPost('status_tautan'),
							'urutan'					=> $this->request->getPost('urutan'),
							'gambar'					=> $nama_tautanbaru,
							'link_tautan'				=> $this->request->getPost('link_tautan'),
							'metode_tautan'				=> $this->request->getPost('metode_tautan'),
							'tanggal_post'				=> date('Y-m-d H:i:s')
						];
				$m_tautan->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah ditambah');
				return redirect()->to(base_url('admin/tautan'));
			}else{
				// masuk database
				$slug 	= strtolower(url_title($this->request->getVar('nama_tautan')));
				$data = [	'id_admin' => $this->session->get('id_admin'),
							'slug_tautan'			=> $slug,
							'nama_tautan'			=> $this->request->getPost('nama_tautan'),
							'keterangan'				=> $this->request->getPost('keterangan'),
							'status_tautan'		=> $this->request->getPost('status_tautan'),
							'urutan'					=> $this->request->getPost('urutan'),
							'link_tautan'				=> $this->request->getPost('link_tautan'),
							'metode_tautan'				=> $this->request->getPost('metode_tautan'),
							'tanggal_post'				=> date('Y-m-d H:i:s')
						];
				$m_tautan->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah ditambah');
				return redirect()->to(base_url('admin/tautan'));
			}
	    }else{
			$data = [	'title'				=> 'Data Tautan Website: '.$total->total,
						'tautan'		=> $tautan,
						'm_tautan'	=> $m_tautan,
						'content'			=> 'admin/tautan/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_tautan)
	{
		
		$m_tautan 	= new Tautan_model();
		$tautan 	= $m_tautan->detail($id_tautan);

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
				'nama_tautan' 	=> 'required',
				'gambar'	 			=> [
								                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
								                'max_size[gambar,4096]',
			            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$nama_tautanbaru 	= $avatar->getRandomName();
	            $avatar->move(FCPATH . 'assets/upload/image/',$nama_tautanbaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(FCPATH . 'assets/upload/image/'.$nama_tautanbaru)
			    ->fit(300,200, 'center')
			    ->save(FCPATH . 'assets/upload/image/thumbs/'.$nama_tautanbaru);
	        	// masuk database
	        	$slug 	= strtolower(url_title($this->request->getVar('nama_tautan')));
				$data = [	'id_tautan'		=> $id_tautan,
							'id_admin' => $this->session->get('id_admin'),
							'slug_tautan'		=> $slug,
							'nama_tautan'		=> $this->request->getPost('nama_tautan'),
							'keterangan'			=> $this->request->getPost('keterangan'),
							'status_tautan'	=> $this->request->getPost('status_tautan'),
							'urutan'				=> $this->request->getPost('urutan'),
							'gambar'				=> $nama_tautanbaru,
							'link_tautan'			=> $this->request->getPost('link_tautan'),
							'metode_tautan'				=> $this->request->getPost('metode_tautan'),
						];
				$m_tautan->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah disimpan');
				return redirect()->to(base_url('admin/tautan'));
			}else{
				// masuk database
				$slug 	= strtolower(url_title($this->request->getVar('nama_tautan')));
				$data = [	'id_tautan'		=> $id_tautan,
							'id_admin' => $this->session->get('id_admin'),
							'slug_tautan'		=> $slug,
							'nama_tautan'		=> $this->request->getPost('nama_tautan'),
							'keterangan'			=> $this->request->getPost('keterangan'),
							'status_tautan'	=> $this->request->getPost('status_tautan'),
							'urutan'				=> $this->request->getPost('urutan'),
							'link_tautan'			=> $this->request->getPost('link_tautan'),
							'metode_tautan'				=> $this->request->getPost('metode_tautan'),
						];
				$m_tautan->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses','Data telah disimpan');
				return redirect()->to(base_url('admin/tautan'));
			}
	    }else{
			$data = [	'title'			=> 'Edit Tautan Website: '.$tautan->nama_tautan,
						'tautan'	=> $tautan,
						'content'		=> 'admin/tautan/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_tautan)
	{
		
		$m_tautan = new Tautan_model();
		$data = ['id_tautan'	=> $id_tautan];
		$m_tautan->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/tautan'));
	}
}
