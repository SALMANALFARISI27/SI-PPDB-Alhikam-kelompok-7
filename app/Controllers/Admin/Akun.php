<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin_model;

class Akun extends BaseController
{

	// mainpage
	public function index()
	{
		
		$m_admin 			= new Admin_model();
		$id_admin 			= $this->session->get('id_admin');
		$admin 				= $m_admin->detail($id_admin);
		

		// Start validasi
		if($this->request->getMethod() === 'POST' && $this->validate(
			[
				'nama' 		=> 'required',
        	])) {
			// update user
			if(isset($_POST['user'])) {
				if(!empty($_FILES['gambar']['name'])) {
					// Image upload
					$avatar  	= $this->request->getFile('gambar');
					$nama_baru 	= $avatar->getRandomName();
		            $avatar->move(FCPATH . 'assets/upload/image/',$nama_baru);
		            // Create thumb
		            $image = \Config\Services::image()
				    ->withFile(FCPATH . 'assets/upload/image/'.$nama_baru)
				    ->fit(100, 100, 'center')
				    ->save(FCPATH . 'assets/upload/image/thumbs/'.$nama_baru);
		        	// masuk database
				    $data = [	'id_admin'		=> $id_admin,
								'nama'			=> $this->request->getPost('nama'),
								'email'			=> $this->request->getPost('email'),
								'gambar'		=> $nama_baru,
						];
					$m_admin->edit($data);
				}else{
					$data = [	'id_admin'		=> $id_admin,
								'nama'			=> $this->request->getPost('nama'),
								'email'			=> $this->request->getPost('email'),
						];
					$m_admin->edit($data);
				}
				$this->session->setFlashdata('sukses','Data telah diupdate');
				return redirect()->to(base_url('admin/akun#user'));
			}
			// end update user
			// update password
			if(isset($_POST['pwd'])) {
				
				if(strlen($this->request->getPost('password')) < 6 && strlen($this->request->getPost('password')) > 32) {
					$this->session->setFlashdata('warning','Password minimal 6 dan maksimal 32 karakter');
					return redirect()->to(base_url('admin/akun#pwd'));
				}elseif($this->request->getPost('password')!= $this->request->getPost('konfirmasi_password')) {
					$this->session->setFlashdata('warning','Password tidak sama');
					return redirect()->to(base_url('admin/akun#pwd'));
				}else{
					$data = [	'id_admin'		=> $id_admin,
								'password'		=> sha1($this->request->getPost('password')),
						];
					$m_admin->edit($data);
					$this->session->setFlashdata('sukses','Password telah diupdate');
					return redirect()->to(base_url('admin/akun#pwd'));
				}  
			}
			// end update password

	    }
		$data = [	'title'			=> 'Profil Saya',
					'user'			=> $admin,
					'content'		=> 'admin/akun/index'
				];
		echo view('admin/layout/wrapper',$data);
		
	}
}
