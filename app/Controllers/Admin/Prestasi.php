<?php 
namespace App\Controllers\Admin;

use App\Models\Prestasi_model;

class Prestasi extends BaseController
{
	
	// index
	public function index()
	{
		
		$m_prestasi = new Prestasi_model();
		$prestasi = $m_prestasi->listing();
		$title = 'Prestasi dan Penghargaan (' . count($prestasi) . ')';

		$data = [	'title'				=> $title,
					'prestasi'			=> $prestasi,
					'content'			=> 'admin/prestasi/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Tambah
	public function tambah()
	{
		
		$m_prestasi = new Prestasi_model();

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
				'judul_prestasi' 	=> 'required|is_unique[prestasi.judul_prestasi]',
				'gambar'	 	=> [
					                'ext_in[gambar,jpg,jpeg,gif,png,svg]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= $avatar->getRandomName();
	            $avatar->move(FCPATH . 'assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(FCPATH . 'assets/upload/image/'.$namabaru)
			    ->fit(300,200, 'center')
			    ->save(FCPATH . 'assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
	        	$data = array(
	        		'id_admin' => $this->session->get('id_admin'),
					'slug_prestasi'			=> strtolower(url_title($this->request->getVar('judul_prestasi'))),
					'judul_prestasi'		=> $this->request->getVar('judul_prestasi'),
					'nama_penerima'			=> $this->request->getVar('nama_penerima'),
					'penyelenggara'			=> $this->request->getVar('penyelenggara'),
					'hadiah_prestasi'		=> $this->request->getVar('hadiah_prestasi'),
					'jenjang_prestasi'		=> $this->request->getVar('jenjang_prestasi'),
					'tanggal_prestasi'		=> $this->website->tanggal_input($this->request->getVar('tanggal_prestasi')),
					'isi'					=> $this->request->getVar('isi'),
					'gambar' 				=> $namabaru,
					'status_prestasi'		=> $this->request->getVar('status_prestasi'),
					'tanggal_post'			=> date('Y-m-d H:i:s')
	        	);
	        	$m_prestasi->tambah($data);
        		return redirect()->to(base_url('admin/prestasi'))->with('sukses', 'Data Berhasil di Simpan');
        	}else{
        		$data = array(
	        		'id_admin' => $this->session->get('id_admin'),
					'slug_prestasi'			=> strtolower(url_title($this->request->getVar('judul_prestasi'))),
					'judul_prestasi'		=> $this->request->getVar('judul_prestasi'),
					'nama_penerima'			=> $this->request->getVar('nama_penerima'),
					'penyelenggara'			=> $this->request->getVar('penyelenggara'),
					'hadiah_prestasi'		=> $this->request->getVar('hadiah_prestasi'),
					'jenjang_prestasi'		=> $this->request->getVar('jenjang_prestasi'),
					'tanggal_prestasi'		=> $this->website->tanggal_input($this->request->getVar('tanggal_prestasi')),
					'isi'					=> $this->request->getVar('isi'),
					'status_prestasi'		=> $this->request->getVar('status_prestasi'),
					'tanggal_post'			=> date('Y-m-d H:i:s')
	        	);
	        	$m_prestasi->tambah($data);
        		return redirect()->to(base_url('admin/prestasi'))->with('sukses', 'Data Berhasil di Simpan');
        	}
        }

		$data = [	'title'				=> 'Tambah Prestasi dan Penghargaan',
					'content'			=> 'admin/prestasi/tambah'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// proses
	public function proses()
	{
		
		$m_prestasi = new Prestasi_model();
		// proses
		$pengalihan = $this->request->getVar('pengalihan');
		$submit 	= $this->request->getVar('submit');
		$id_prestasi 	= $this->request->getVar('id_prestasi');
		// check prestasi
		if(empty($this->request->getVar('id_prestasi')))
		{
			return redirect()->to($pengalihan)->with('warning', 'Anda belum memilih prestasi. Pilih salah satu prestasi');
		}
		// end check prestasi
		// proses
		if($submit=='Publish') {
			for($i=0; $i < sizeof($id_prestasi ?? []);$i++) {
				$data = array(	'id_prestasi'		=> $id_prestasi[$i],
								'id_admin' => $this->session->get('id_admin'),
								'status_prestasi'	=> 'Publish'
							);
   				$m_prestasi->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Prestasi berhasil dipublikasikan');
		}elseif($submit=='Draft') {
			for($i=0; $i < sizeof($id_prestasi ?? []);$i++) {
				$data = array(	'id_prestasi'		=> $id_prestasi[$i],
								'id_admin' => $this->session->get('id_admin'),
								'status_prestasi'	=> 'Draft'
							);
   				$m_prestasi->edit($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Prestasi berhasil tidak dipublikasikan');
		}elseif($submit=='Delete') {
			for($i=0; $i < sizeof($id_prestasi ?? []);$i++) {
				$data = array(	'id_prestasi'	=> $id_prestasi[$i]);
   				$m_prestasi->delete($data);
   			}
   			return redirect()->to($pengalihan)->with('sukses', 'Data berhasil dihapus');
		}
		// end proses
	}

	// edit
	public function edit($id_prestasi)
	{
		
		$m_prestasi = new Prestasi_model();
		$prestasi = $m_prestasi->detail($id_prestasi);
		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
				'judul_prestasi' 	=> 'required',
				'gambar'	 	=> [
					                'ext_in[gambar,jpg,jpeg,gif,png,svg]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= $avatar->getRandomName();
	            $avatar->move(FCPATH . 'assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(FCPATH . 'assets/upload/image/'.$namabaru)
			    ->fit(300,200, 'center')
			    ->save(FCPATH . 'assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
			    $data = array(
	        		'id_prestasi'			=> $id_prestasi,
	        		'id_admin' => $this->session->get('id_admin'),
					'slug_prestasi'			=> strtolower(url_title($this->request->getVar('judul_prestasi'))),
					'judul_prestasi'		=> $this->request->getVar('judul_prestasi'),
					'nama_penerima'			=> $this->request->getVar('nama_penerima'),
					'penyelenggara'			=> $this->request->getVar('penyelenggara'),
					'hadiah_prestasi'		=> $this->request->getVar('hadiah_prestasi'),
					'jenjang_prestasi'		=> $this->request->getVar('jenjang_prestasi'),
					'tanggal_prestasi'		=> $this->website->tanggal_input($this->request->getVar('tanggal_prestasi')),
					'isi'					=> $this->request->getVar('isi'),
					'gambar' 				=> $namabaru,
					'status_prestasi'		=> $this->request->getVar('status_prestasi'),
	        	);
	        	$m_prestasi->edit($data);
        		return redirect()->to(base_url('admin/prestasi'))->with('sukses', 'Data Berhasil di Simpan');
			}else{
				$data = array(
	        		'id_prestasi'			=> $id_prestasi,
	        		'id_admin' => $this->session->get('id_admin'),
					'slug_prestasi'			=> strtolower(url_title($this->request->getVar('judul_prestasi'))),
					'judul_prestasi'		=> $this->request->getVar('judul_prestasi'),
					'nama_penerima'			=> $this->request->getVar('nama_penerima'),
					'penyelenggara'			=> $this->request->getVar('penyelenggara'),
					'hadiah_prestasi'		=> $this->request->getVar('hadiah_prestasi'),
					'jenjang_prestasi'		=> $this->request->getVar('jenjang_prestasi'),
					'tanggal_prestasi'		=> $this->website->tanggal_input($this->request->getVar('tanggal_prestasi')),
					'isi'					=> $this->request->getVar('isi'),
					'status_prestasi'		=> $this->request->getVar('status_prestasi'),
	        	);
	        	$m_prestasi->edit($data);
        		return redirect()->to(base_url('admin/prestasi'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [	'title'				=> 'Edit Prestasi dan Penghargaan: '.$prestasi->judul_prestasi,
					'prestasi'			=> $prestasi,
					'content'			=> 'admin/prestasi/edit'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Delete
	public function delete($id_prestasi)
	{
		
		$m_prestasi = new Prestasi_model();
		$data = ['id_prestasi'	=> $id_prestasi];
		$m_prestasi->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/prestasi'));
	}
}
