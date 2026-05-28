<?php
namespace App\Controllers\Admin;

use App\Models\Konfigurasi_model;
use App\Models\Calon_peserta_didik_model;
use App\Models\Akun_model;
use App\Models\Jenis_dokumen_model;
use App\Models\Dokumen_model;
use App\Models\Gelombang_model;
use App\Models\Jenjang_pendidikan_model;

class Gelombang extends BaseController
{

	// index
	public function index()
	{
		$m_gelombang = new Gelombang_model();
		$gelombang = $m_gelombang->listing();
		$total = $m_gelombang->total();

		$data = [
			'title' => 'Data Periode PPDB: ' . $total->total,
			'gelombang' => $gelombang,
			'm_gelombang' => $m_gelombang,
			'm_calon_peserta_didik' => new Calon_peserta_didik_model(),
			'content' => 'admin/gelombang/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// detail
	public function detail($id_gelombang, $status_pendaftaran = 'Semua', $id_jenjang_pendidikan = 'Semua')
	{
		$m_gelombang = new Gelombang_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$gelombang = $m_gelombang->detail($id_gelombang);
		$calon_peserta_didik = $m_calon_peserta_didik->gelombang_status_calon_peserta_didik($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan);
		$akumulasi = $m_calon_peserta_didik->gelombang($id_gelombang);
		if ($id_jenjang_pendidikan == 'Semua') {
			$judul_jenjang_pendidikan = 'Semua Program/Jenjang Pendidikan';
		} else {
			$jenjang_pendidikan = $m_jenjang_pendidikan->detail($id_jenjang_pendidikan);
			$judul_jenjang_pendidikan = $jenjang_pendidikan->judul_jenjang_pendidikan;
		}
		if (isset($_POST['submit'])) {
			$pengalihan = $this->request->getVar('pengalihan');
			$id_calon_peserta_didik = $this->request->getVar('id_calon_peserta_didik');

			for ($i = 0; $i < sizeof($id_calon_peserta_didik ?? []); $i++) {
				$data = array(
					'id_calon_peserta_didik' => $id_calon_peserta_didik[$i],
					'id_admin' => $this->session->get('id_admin'),
					'status_pendaftaran' => $this->request->getVar('status_pendaftaran')
				);
				$m_calon_peserta_didik->edit($data);
			}
			return redirect()->to($pengalihan)->with('sukses', 'Data Calon Peserta Didik berhasil diupdate statusnya');
		}

		$data = [
			'title' => $gelombang->judul,
			'judul_jenjang_pendidikan' => $judul_jenjang_pendidikan,
			'gelombang' => $gelombang,
			'm_gelombang' => $m_gelombang,
			'calon_peserta_didik' => $calon_peserta_didik,
			'status_pendaftaran' => $status_pendaftaran,
			'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
			'id_gelombang' => $id_gelombang,
			'm_calon_peserta_didik' => $m_calon_peserta_didik,
			'akumulasi' => $akumulasi,
			'm_jenis_dokumen' => new Jenis_dokumen_model(),
			'm_dokumen' => new Dokumen_model(),
			'content' => 'admin/gelombang/detail'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// export
	public function export($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan)
	{
		$m_gelombang = new Gelombang_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$gelombang = $m_gelombang->detail($id_gelombang);
		$calon_peserta_didik = $m_calon_peserta_didik->gelombang_status_calon_peserta_didik($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan);
		$akumulasi = $m_calon_peserta_didik->gelombang($id_gelombang);
		if ($id_jenjang_pendidikan == 'Semua') {
			$judul_jenjang_pendidikan = 'Semua Program/Jenjang Pendidikan';
		} else {
			$jenjang_pendidikan = $m_jenjang_pendidikan->detail($id_jenjang_pendidikan);
			$judul_jenjang_pendidikan = $jenjang_pendidikan->judul_jenjang_pendidikan;
		}

		$data = [
			'title' => $gelombang->judul,
			'judul_jenjang_pendidikan' => $judul_jenjang_pendidikan,
			'gelombang' => $gelombang,
			'm_gelombang' => $m_gelombang,
			'calon_peserta_didik' => $calon_peserta_didik,
			'status_pendaftaran' => $status_pendaftaran,
			'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
			'id_gelombang' => $id_gelombang,
			'm_calon_peserta_didik' => $m_calon_peserta_didik,
			'm_jenis_dokumen' => new Jenis_dokumen_model(),
			'm_dokumen' => new Dokumen_model(),
			'content' => 'admin/gelombang/export'
		];
		echo view('admin/layout/wrapper-export', $data);
	}

	// unduh_data
	public function unduh_data($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan)
	{
		$m_gelombang = new Gelombang_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$gelombang = $m_gelombang->detail($id_gelombang);
		$calon_peserta_didik = $m_calon_peserta_didik->gelombang_status_calon_peserta_didik($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan);
		$akumulasi = $m_calon_peserta_didik->gelombang($id_gelombang);
		if ($id_jenjang_pendidikan == 'Semua') {
			$judul_jenjang_pendidikan = 'Semua Program/Jenjang Pendidikan';
		} else {
			$jenjang_pendidikan = $m_jenjang_pendidikan->detail($id_jenjang_pendidikan);
			$judul_jenjang_pendidikan = $jenjang_pendidikan->judul_jenjang_pendidikan;
		}

		$data = [
			'title' => $gelombang->judul,
			'judul_jenjang_pendidikan' => $judul_jenjang_pendidikan,
			'gelombang' => $gelombang,
			'm_gelombang' => $m_gelombang,
			'calon_peserta_didik' => $calon_peserta_didik,
			'status_pendaftaran' => $status_pendaftaran,
			'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
			'id_gelombang' => $id_gelombang,
			'm_calon_peserta_didik' => $m_calon_peserta_didik,
			'm_jenis_dokumen' => new Jenis_dokumen_model(),
			'm_dokumen' => new Dokumen_model(),
		];
		// echo view('layout/wrapper',$data);
		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 10,
			'default_font' => 'dejavusans',
			'margin_left' => 10,
			'margin_right' => 10,
		]);
		$html = view('admin/gelombang/unduh_data', $data);
		$mpdf->WriteHTML($html);
		$filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $gelombang->judul) . '.pdf';
		$this->response->setHeader('Content-Type', 'application/pdf');
		// buka di browser
		$mpdf->Output($filename, 'I');
	}

	// unduh_pengumuman
	public function unduh_pengumuman($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan)
	{
		$m_gelombang = new Gelombang_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$gelombang = $m_gelombang->detail($id_gelombang);
		$calon_peserta_didik = $m_calon_peserta_didik->gelombang_status_calon_peserta_didik($id_gelombang, $status_pendaftaran, $id_jenjang_pendidikan);
		$akumulasi = $m_calon_peserta_didik->gelombang($id_gelombang);
		if ($id_jenjang_pendidikan == 'Semua') {
			$judul_jenjang_pendidikan = 'Semua Program/Jenjang Pendidikan';
		} else {
			$jenjang_pendidikan = $m_jenjang_pendidikan->detail($id_jenjang_pendidikan);
			$judul_jenjang_pendidikan = $jenjang_pendidikan->judul_jenjang_pendidikan;
		}

		$data = [
			'title' => $gelombang->judul,
			'judul_jenjang_pendidikan' => $judul_jenjang_pendidikan,
			'gelombang' => $gelombang,
			'm_gelombang' => $m_gelombang,
			'calon_peserta_didik' => $calon_peserta_didik,
			'status_pendaftaran' => $status_pendaftaran,
			'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
			'id_gelombang' => $id_gelombang,
			'm_calon_peserta_didik' => $m_calon_peserta_didik,
			'm_jenis_dokumen' => new Jenis_dokumen_model(),
			'm_dokumen' => new Dokumen_model(),
		];
		// echo view('layout/wrapper',$data);
		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 10,
			'default_font' => 'dejavusans',
			'margin_left' => 10,
			'margin_right' => 10,
		]);
		$html = view('admin/gelombang/unduh_pengumuman', $data);
		$mpdf->WriteHTML($html);
		$filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $gelombang->judul) . '.pdf';
		$this->response->setHeader('Content-Type', 'application/pdf');
		// buka di browser
		$mpdf->Output($filename, 'I');
	}

	// mainpage
	public function tambah()
	{

		$m_gelombang = new Gelombang_model();
		$gelombang = $m_gelombang->listing();
		$total = $m_gelombang->total();
		$tahun_ajaran = (date('Y') + 1) . "/" . (date('Y') + 2);
		$akhir = $m_gelombang->akhir($tahun_ajaran);
		if ($akhir) {
			$tahap = $akhir->tahap + 1;
		} else {
			$tahap = 1;
		}
		$nama_gelombang = 'PPDB Tahap ' . $tahap . ' - Tahun Ajaran ' . $tahun_ajaran;

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul' => 'required',
					'gambar' => [
						'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
						'max_size[gambar,4096]',
					],
				]
			)
		) {
			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$judulbaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $judulbaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $judulbaru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $judulbaru);
				// masuk database
				$slug = strtolower(url_title($this->request->getVar('judul')));
				$data = [
					'id_admin' => $this->session->get('id_admin'),
					'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
					'tahap' => $tahap,
					'tahun' => $this->request->getPost('tahun'),
					'slug' => $slug,
					'judul' => $this->request->getPost('judul'),
					'isi' => $this->request->getPost('isi'),
					'tanggal_buka' => $this->website->tanggal_input($this->request->getPost('tanggal_buka')),
					'tanggal_tutup' => $this->website->tanggal_input($this->request->getPost('tanggal_tutup')),
					'tanggal_pengumuman' => $this->website->tanggal_input($this->request->getPost('tanggal_pengumuman')),
					'status_gelombang' => $this->request->getPost('status_gelombang'),
					'gambar' => $judulbaru
				];
				$m_gelombang->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('admin/gelombang'));
			} else {
				// masuk database
				$slug = strtolower(url_title($this->request->getVar('judul')));
				$data = [
					'id_admin' => $this->session->get('id_admin'),
					'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
					'tahap' => $tahap,
					'tahun' => $this->request->getPost('tahun'),
					'slug' => $slug,
					'judul' => $this->request->getPost('judul'),
					'isi' => $this->request->getPost('isi'),
					'tanggal_buka' => $this->website->tanggal_input($this->request->getPost('tanggal_buka')),
					'tanggal_tutup' => $this->website->tanggal_input($this->request->getPost('tanggal_tutup')),
					'tanggal_pengumuman' => $this->website->tanggal_input($this->request->getPost('tanggal_pengumuman')),
					'status_gelombang' => $this->request->getPost('status_gelombang')
				];
				$m_gelombang->tambah($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('admin/gelombang'));
			}
		} else {
			$data = [
				'title' => 'Tambah Periode PPDB',
				'gelombang' => $gelombang,
				'm_gelombang' => $m_gelombang,
				'nama_gelombang' => $nama_gelombang,
				'content' => 'admin/gelombang/tambah'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// edit
	public function edit($id_gelombang)
	{

		$m_gelombang = new Gelombang_model();
		$gelombang = $m_gelombang->detail($id_gelombang);

		// Start validasi
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'judul' => 'required',
					'gambar' => [
						'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
						'max_size[gambar,4096]',
					],
				]
			)
		) {
			if (!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar = $this->request->getFile('gambar');
				$judulbaru = $avatar->getRandomName();
				$avatar->move(FCPATH . 'assets/upload/image/', $judulbaru);
				// Create thumb
				$image = \Config\Services::image()
					->withFile(FCPATH . 'assets/upload/image/' . $judulbaru)
					->fit(100, 100, 'center')
					->save(FCPATH . 'assets/upload/image/thumbs/' . $judulbaru);
				// masuk database
				$slug = strtolower(url_title($this->request->getVar('judul')));
				$data = [
					'id_gelombang' => $id_gelombang,
					'id_admin' => $this->session->get('id_admin'),
					'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
					'tahun' => $this->request->getPost('tahun'),
					'slug' => $slug,
					'judul' => $this->request->getPost('judul'),
					'isi' => $this->request->getPost('isi'),
					'tanggal_buka' => $this->website->tanggal_input($this->request->getPost('tanggal_buka')),
					'tanggal_tutup' => $this->website->tanggal_input($this->request->getPost('tanggal_tutup')),
					'tanggal_pengumuman' => $this->website->tanggal_input($this->request->getPost('tanggal_pengumuman')),
					'status_gelombang' => $this->request->getPost('status_gelombang'),
					'gambar' => $judulbaru
				];
				$m_gelombang->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah disimpan');
				return redirect()->to(base_url('admin/gelombang'));
			} else {
				// masuk database
				$slug = strtolower(url_title($this->request->getVar('judul')));
				$data = [
					'id_gelombang' => $id_gelombang,
					'id_admin' => $this->session->get('id_admin'),
					'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
					'tahun' => $this->request->getPost('tahun'),
					'slug' => $slug,
					'judul' => $this->request->getPost('judul'),
					'isi' => $this->request->getPost('isi'),
					'tanggal_buka' => $this->website->tanggal_input($this->request->getPost('tanggal_buka')),
					'tanggal_tutup' => $this->website->tanggal_input($this->request->getPost('tanggal_tutup')),
					'tanggal_pengumuman' => $this->website->tanggal_input($this->request->getPost('tanggal_pengumuman')),
					'status_gelombang' => $this->request->getPost('status_gelombang')
				];
				$m_gelombang->edit($data);
				// masuk database
				$this->session->setFlashdata('sukses', 'Data telah disimpan');
				return redirect()->to(base_url('admin/gelombang'));
			}
		} else {
			$data = [
				'title' => 'Edit Periode Pendaftaran PPDB: ' . $gelombang->judul,
				'gelombang' => $gelombang,
				'content' => 'admin/gelombang/edit'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// edit
	public function edit_calon_peserta_didik($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_jenjang_pendidikan = new Jenjang_pendidikan_model();
		$m_gelombang = new Gelombang_model();

		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$id_gelombang = $calon_peserta_didik->id_gelombang;
		$konfigurasi = $m_konfigurasi->listing();
		$akun = $m_akun->listing();
		$jenjang_pendidikan = $m_jenjang_pendidikan->nav_jenjang();
		$gelombang = $m_gelombang->detail($id_gelombang);

		// Start validasi
		if ($this->request->getMethod() === 'POST' && $this->validate(['nama_calon_peserta_didik' => 'required'])) {

			if ($this->request->getPost('identitas_wali') == 'Ayah') {
				$agama_wali = $this->request->getPost('agama_ayah');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_ayah');
				$id_jenjang_wali = $this->request->getPost('jenjang_ayah');
				$nama_wali = $this->request->getPost('nama_ayah');
				$alamat_wali = $this->request->getPost('alamat_ayah');
				$telepon_wali = $this->request->getPost('telepon_ayah');
			} elseif ($this->request->getPost('identitas_wali') == 'Ibu') {
				$agama_wali = $this->request->getPost('agama_ibu');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_ibu');
				$id_jenjang_wali = $this->request->getPost('jenjang_ibu');
				$nama_wali = $this->request->getPost('nama_ibu');
				$alamat_wali = $this->request->getPost('alamat_ibu');
				$telepon_wali = $this->request->getPost('telepon_ibu');
			} else {
				$agama_wali = $this->request->getPost('agama_wali');
				$id_pekerjaan_wali = $this->request->getPost('pekerjaan_wali');
				$id_jenjang_wali = $this->request->getPost('jenjang_wali');
				$nama_wali = $this->request->getPost('nama_wali');
				$alamat_wali = $this->request->getPost('alamat_wali');
				$telepon_wali = $this->request->getPost('telepon_wali');
			}
			$data = [
				'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
				'id_admin' => $this->session->get('id_admin'),
				'id_gelombang' => $id_gelombang,
				'agama' => $this->request->getPost('agama'),
				'agama_ayah' => $this->request->getPost('agama_ayah'),
				'agama_ibu' => $this->request->getPost('agama_ibu'),
				'agama_wali' => $agama_wali,
				'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
				'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
				'pekerjaan_wali' => $id_pekerjaan_wali,
				'jenjang_ayah' => $this->request->getPost('jenjang_ayah'),
				'jenjang_ibu' => $this->request->getPost('jenjang_ibu'),
				'jenjang_wali' => $id_jenjang_wali,
				'id_akun' => $calon_peserta_didik->id_akun,
				'id_jenjang_pendidikan' => $this->request->getPost('id_jenjang_pendidikan'),
				'nis' => $this->request->getPost('nis'),
				'nisn' => $this->request->getPost('nisn'),
				'status_wn' => $this->request->getPost('status_wn'),
				'negara_asal' => $this->request->getPost('negara_asal'),
				'nama_calon_peserta_didik' => $this->request->getPost('nama_calon_peserta_didik'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tanggal_lahir' => $this->website->tanggal_input($this->request->getPost('tanggal_lahir')),
				'alamat' => $this->request->getPost('alamat'),
				'telepon' => $this->request->getPost('telepon'),
				'kode_pos' => $this->request->getPost('kode_pos'),
				'email' => $this->request->getPost('email'),
				'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
				'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus'),
				'isi' => $this->request->getPost('isi'),
				'nama_ayah' => $this->request->getPost('nama_ayah'),
				'nama_ibu' => $this->request->getPost('nama_ibu'),
				'nama_wali' => $nama_wali,
				'alamat_ayah' => $this->request->getPost('alamat_ayah'),
				'alamat_ibu' => $this->request->getPost('alamat_ibu'),
				'alamat_wali' => $alamat_wali,
				'telepon_ayah' => $this->request->getPost('telepon_ayah'),
				'telepon_ibu' => $this->request->getPost('telepon_ibu'),
				'telepon_wali' => $telepon_wali,
				'goldar_calon_peserta_didik' => $this->request->getPost('goldar_calon_peserta_didik'),
				'hobi_calon_peserta_didik' => $this->request->getPost('hobi_calon_peserta_didik'),
				'penyakit_calon_peserta_didik' => $this->request->getPost('penyakit_calon_peserta_didik'),
				'tinggi' => $this->request->getPost('tinggi'),
				'berat' => $this->request->getPost('berat'),
				'jenis_calon_peserta_didik' => $this->request->getPost('jenis_calon_peserta_didik'),
				'asal_sekolah' => $this->request->getPost('asal_sekolah'),
				'alamat_sekolah_asal' => $this->request->getPost('alamat_sekolah_asal'),
				'tanggal_pindah' => $this->website->tanggal_input($this->request->getPost('tanggal_pindah')),
				'anak_ke' => $this->request->getPost('anak_ke'),
				'jumlah_saudara' => $this->request->getPost('jumlah_saudara'),
				'identitas_wali' => $this->request->getPost('identitas_wali'),
				'status_pendaftaran' => $this->request->getPost('status_pendaftaran')
			];
			$m_calon_peserta_didik->edit($data);
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/gelombang/detail/' . $id_gelombang . '/' . $this->request->getPost('status_pendaftaran') . '/' . $this->request->getPost('id_jenjang_pendidikan')));
		} else {

			$data = [
				'title' => 'Update Biodata Calon Peserta Didik',
				'description' => 'Update Data Calon Peserta Didik Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
				'keywords' => 'Update Data Calon Peserta Didik Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb,
				'konfigurasi' => $konfigurasi,
				'akun' => $akun,
				'jenjang_pendidikan' => $jenjang_pendidikan,
				'gelombang' => $gelombang,
				'calon_peserta_didik' => $calon_peserta_didik,
				'content' => 'admin/gelombang/edit_calon_peserta_didik'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// dokumen
	public function dokumen($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_jenis_dokumen = new Jenis_dokumen_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$konfigurasi = $m_konfigurasi->listing();
		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$jenis_dokumen = $m_jenis_dokumen->listing();
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		// proses update
		if (isset($_POST['status'])) {
			$data = [
				'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
				'id_admin' => $this->session->get('id_admin'),
				'status_pendaftaran' => $this->request->getPost('status_pendaftaran')
			];
			// masuk database
			$m_calon_peserta_didik->edit($data);
			$this->session->setFlashdata('sukses', 'Data telah diupdate');
			return redirect()->to(base_url('admin/gelombang/dokumen/' . $calon_peserta_didik->slug_calon_peserta_didik));
		}
		// end update
		// Start tambah
		if (
			$this->request->getMethod() === 'POST' && $this->validate(
				[
					'id_jenis_dokumen' => 'required',
					'gambar' => [
						'uploaded[gambar]',
						'ext_in[gambar,jpg,jpeg,png,gif,zip,rar,doc,docx,xls,xlsx,ppt,pptx,pdf]',
						'max_size[gambar,24096]',
					],
				]
			)
		) {
			// Image upload
			$avatar = $this->request->getFile('gambar');
			$namabaru = $avatar->getRandomName();
			$file_ext = $avatar->guessExtension();
			$file_size = $avatar->getSizeByUnit('mb');
			$avatar->move(FCPATH . 'assets/upload/pendaftaran/', $namabaru);
			// masuk database
			$data = array(
				'id_akun' => $akun->id_akun,
				'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
				'id_jenis_dokumen' => $this->request->getVar('id_jenis_dokumen'),
				'kode_dokumen' => strtoupper(random_string('alnum', 32)),
				'gambar' => $namabaru,
				'file_ext' => $file_ext,
				'file_size' => $file_size
			);
			$m_dokumen->tambah($data);
			return redirect()->to(base_url('admin/gelombang/dokumen/' . $slug_calon_peserta_didik))->with('sukses', 'Data Berhasil di Simpan');
		} else {

			$data = [
				'title' => 'Unggah Dokumen',
				'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,

				'konfigurasi' => $konfigurasi,
				'akun' => $akun,
				'jenis_dokumen' => $jenis_dokumen,
				'calon_peserta_didik' => $calon_peserta_didik,
				'm_dokumen' => $m_dokumen,
				'content' => 'admin/gelombang/dokumen'
			];
			echo view('admin/layout/wrapper', $data);
		}
	}

	// dokumen_batch
	public function dokumen_batch($slug_calon_peserta_didik)
	{
		$m_akun = new Akun_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		
		if (!$calon_peserta_didik) {
			return redirect()->back()->with('warning', 'Data calon peserta didik tidak ditemukan.');
		}

		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		if ($this->request->is('post')) {
			$uploaded_count = 0;
			$files = $this->request->getFiles();

			// Loop through each jenis_dokumen file input
			if (isset($files['dokumen'])) {
				foreach ($files['dokumen'] as $id_jenis_dokumen => $file) {
					if ($file->isValid() && !$file->hasMoved()) {
						$namabaru = $file->getRandomName();
						$file_ext = $file->getClientExtension();
						$file_size = $file->getSizeByUnit('mb');

						// Validate extension
						$allowed = ['jpg', 'jpeg', 'png', 'gif', 'zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf'];
						if (!in_array(strtolower($file_ext), $allowed)) {
							continue;
						}

						// Move file using CI4 method
						$file->move(FCPATH . 'assets/upload/pendaftaran/', $namabaru);

						// Save to database
						$data = array(
							'id_akun' => $akun->id_akun,
							'id_calon_peserta_didik' => $calon_peserta_didik->id_calon_peserta_didik,
							'id_jenis_dokumen' => $id_jenis_dokumen,
							'kode_dokumen' => strtoupper(random_string('alnum', 32)),
							'gambar' => $namabaru,
							'file_ext' => $file_ext,
							'file_size' => round($file_size, 2),
						);
						$m_dokumen->tambah($data);
						$uploaded_count++;
					}
				}
			}

			if ($uploaded_count > 0) {
				$this->session->setFlashdata('sukses', $uploaded_count . ' dokumen berhasil diunggah.');
			} else {
				$this->session->setFlashdata('warning', 'Tidak ada dokumen yang dipilih atau dokumen tidak valid.');
			}
		}

		return redirect()->to(base_url('admin/gelombang/dokumen/' . $slug_calon_peserta_didik));
	}

	// cetak
	public function cetak($slug_calon_peserta_didik)
	{
		$m_konfigurasi = new Konfigurasi_model();
		$m_akun = new Akun_model();
		$m_jenis_dokumen = new Jenis_dokumen_model();
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$m_dokumen = new Dokumen_model();

		$konfigurasi = $m_konfigurasi->listing();
		$calon_peserta_didik = $m_calon_peserta_didik->read($slug_calon_peserta_didik);
		$jenis_dokumen = $m_jenis_dokumen->listing();
		$akun = $m_akun->detail($calon_peserta_didik->id_akun);

		$data = [
			'title' => 'Pendaftaran Peserta Didik Baru - Pendaftaran Berhasil',
			'description' => 'Pendaftaran Peserta Didik Baru ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,

			'konfigurasi' => $konfigurasi,
			'akun' => $akun,
			'jenis_dokumen' => $jenis_dokumen,
			'calon_peserta_didik' => $calon_peserta_didik,
			'm_dokumen' => $m_dokumen,
		];
		// echo view('layout/wrapper',$data);
		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 11,
			'default_font' => 'nunito-regular'
		]);
		$html = view('admin/gelombang/cetak', $data);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		// buka di browser
		$mpdf->Output('Informasi-Pendaftaran-' . $calon_peserta_didik->nama_calon_peserta_didik . '.pdf', 'I');
	}

	// Unduh
	public function unduh($kode_dokumen, $kode_calon_peserta_didik)
	{
		$m_dokumen = new Dokumen_model();
		$dokumen = $m_dokumen->kode_dokumen($kode_dokumen);
		if (!file_exists(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar)) {
			$this->session->setFlashdata('warning', 'Mohon maaf, file tidak ditemukan.');
			return redirect()->to(base_url('admin/gelombang/dokumen/' . $kode_calon_peserta_didik));
		} else {
			return $this->response->download(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar, null);
		}
	}

	// hapus
	public function hapus($kode_dokumen, $kode_calon_peserta_didik)
	{
		$m_dokumen = new Dokumen_model();
		$data = ['kode_dokumen' => $kode_dokumen];
		$m_dokumen->hapus($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/gelombang/dokumen/' . $kode_calon_peserta_didik));
	}

	// hapus
	public function delete_calon_peserta_didik($slug_calon_peserta_didik, $id_gelombang)
	{
		$m_calon_peserta_didik = new Calon_peserta_didik_model();
		$this->session = \Config\Services::session();

		// Ambil data calon peserta didik dulu untuk mendapatkan id_akun-nya
		$calon = $m_calon_peserta_didik->read($slug_calon_peserta_didik);

		if ($calon) {
			$m_dokumen = new Dokumen_model();
			$id_calon_peserta_didik = $calon->id_calon_peserta_didik;

			// Ambil semua dokumen calon peserta didik
			$list_dokumen = $m_dokumen->listing_calon($id_calon_peserta_didik);

			if ($list_dokumen) {
				foreach ($list_dokumen as $dokumen) {
					// Hapus file fisik jika ada
					if (!empty($dokumen->gambar) && file_exists(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar)) {
						unlink(FCPATH . 'assets/upload/pendaftaran/' . $dokumen->gambar);
					}
				}
				// Hapus data dokumen dari database
				$m_dokumen->hapus_calon($id_calon_peserta_didik);
			}

			// Akhirnya hapus data calon peserta didik
			$data = [
				'slug_calon_peserta_didik' => $slug_calon_peserta_didik,
				'id_akun' => $calon->id_akun
			];
			$m_calon_peserta_didik->hapus($data);
			$this->session->setFlashdata('sukses', 'Data ' . $calon->nama_calon_peserta_didik . ' dan seluruh dokumen pendukung telah dihapus');
		} else {
			$this->session->setFlashdata('warning', 'Data tidak ditemukan');
		}

		return redirect()->to(base_url('admin/gelombang/detail/' . $id_gelombang));
	}

	// delete
	public function delete($id_gelombang)
	{

		$m_gelombang = new Gelombang_model();
		$data = ['id_gelombang' => $id_gelombang];
		$m_gelombang->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/gelombang'));
	}
}
