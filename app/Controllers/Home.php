<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Berita_model;
use App\Models\Staff_model;
use App\Models\Prestasi_model;
use App\Models\Fasilitas_model;
use App\Models\Jenjang_pendidikan_model;

class Home extends BaseController
{
    protected $konfigurasi_model;
    protected $galeri_model;
    protected $berita_model;
    protected $staff_model;
    protected $prestasi_model;
    protected $fasilitas_model;
    protected $jenjang_pendidikan_model;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->konfigurasi_model = new Konfigurasi_model();
        $this->galeri_model = new Galeri_model();
        $this->berita_model = new Berita_model();
        $this->staff_model = new Staff_model();
        $this->prestasi_model = new Prestasi_model();

        $this->fasilitas_model = new Fasilitas_model();

        $this->jenjang_pendidikan_model = new Jenjang_pendidikan_model();
    }

    // index
    public function index()
    {
        $site = $this->konfigurasi_model->listing();
        $galeri = $this->galeri_model->jenis_galeri_pop('Homepage');
        $berita = $this->berita_model->beranda('Berita', 6);
        $staff = $this->staff_model->home(6);
        $prestasi = $this->prestasi_model->home(6, 'Publish');
        $fasilitas = $this->fasilitas_model->home(6, 'Publish');


        $jenjang_pendidikan = $this->jenjang_pendidikan_model->main();

        $data = [
            'title' => $site->namaweb . ' | ' . $site->tagline,
            'description' => $site->deskripsi,
            'site' => $site,
            'slider' => $galeri,
            'berita' => $berita,
            'staff' => $staff,
            'prestasi' => $prestasi,
            'fasilitas' => $fasilitas,


            'jenjang_pendidikan' => $jenjang_pendidikan,
            'content' => 'home/index'
        ];
        return view('layout/wrapper', $data);
    }

    // oops
    public function oops()
    {
        $m_site = new Konfigurasi_model();
        $site = $m_site->listing();
        $data = [
            'title' => 'Oops... Mohon Maaf',
            'description' => 'Oops... Mohon Maaf',
            'site' => $site,
            'content' => 'home/oops'
        ];
        return view('layout/wrapper', $data);
    }


    // kontak
    public function kontak()
    {
        $site = $this->konfigurasi_model->listing();
        $data = [
            'title'       => 'KONTAK KAMI',
            'description' => 'Kontak Kami ' . $site->namaweb . ', ' . $site->tentang,
            'keywords'    => 'Kontak Kami ' . $site->namaweb,
            'konfigurasi' => $site,
            'site'        => $site,
            'content'     => 'kontak/index',
        ];

        return view('layout/wrapper', $data);
    }
}