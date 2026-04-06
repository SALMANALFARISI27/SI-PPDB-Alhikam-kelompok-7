<?php

namespace App\Controllers;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Berita_model;
use App\Models\Staff_model;
use App\Models\Prestasi_model;
use App\Models\Video_model;
use App\Models\Fasilitas_model;

use App\Models\Jenjang_pendidikan_model;

class Home extends BaseController
{
    protected $konfigurasi_model;
    protected $galeri_model;
    protected $berita_model;
    protected $staff_model;
    protected $prestasi_model;
    protected $video_model;
    protected $fasilitas_model;
    protected $jenjang_pendidikan_model;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->konfigurasi_model    = new Konfigurasi_model();
        $this->galeri_model         = new Galeri_model();
        $this->berita_model         = new Berita_model();
        $this->staff_model          = new Staff_model();
        $this->prestasi_model       = new Prestasi_model();
        $this->video_model          = new Video_model();
        $this->fasilitas_model      = new Fasilitas_model();

        $this->jenjang_pendidikan_model   = new Jenjang_pendidikan_model();
    }

    // index
    public function index()
    {
        $site       = $this->konfigurasi_model->listing();
        $galeri     = $this->galeri_model->jenis_galeri_pop('Homepage');
        $popup      = $this->galeri_model->jenis_galeri_pop('Pop Up');
        $keunggulan = $this->berita_model->jenis_publish('Keunggulan');
        $berita     = $this->berita_model->beranda('Berita',6);
        $staff      = $this->staff_model->home(6);
        $prestasi   = $this->prestasi_model->home(6,'Publish');
        $fasilitas  = $this->fasilitas_model->home(6,'Publish');
        $video      = $this->video_model->home();

        $jenjang_pendidikan     = $this->jenjang_pendidikan_model->main();

        $data = [   'title'         => $site->namaweb.' | '.$site->tagline,
                    'description'   => $site->deskripsi,
                    'site'          => $site,
                    'slider'        => $galeri,
                    'popup'         => $popup,
                    'keunggulan'    => $keunggulan,
                    'berita'        => $berita,
                    'staff'         => $staff,
                    'prestasi'      => $prestasi,
                    'fasilitas'     => $fasilitas,
                    'video'         => $video,

                    'jenjang_pendidikan'    => $jenjang_pendidikan,
                    'content'       => 'home/index'
                ];
        return view('layout/wrapper',$data);
    }

    // oops
    public function oops()
    {
        $m_site     = new Konfigurasi_model();
        $site       = $m_site->listing();
        $data = [   'title'         => 'Oops... Mohon Maaf',
                    'description'   => 'Oops... Mohon Maaf',
                    'site'          => $site,
                    'content'       => 'home/oops'
                ];
        return view('layout/wrapper',$data);
    }

    // welcome
    public function welcome()
    {
        return view('welcome_message');
    }

}