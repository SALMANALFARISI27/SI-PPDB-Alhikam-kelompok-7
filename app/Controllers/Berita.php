<?php
namespace App\Controllers;
use App\Models\Konfigurasi_model;
use App\Models\Berita_model;
use App\Models\Kategori_berita_profile_model;

class Berita extends BaseController
{
    // index
    public function index()
    {
        $pager = service('pager');
        $m_site = new Konfigurasi_model();
        $site = $m_site->listing();
        $m_berita = new Berita_model();
        $status_berita = 'Publish';
        $jenis_berita = 'Berita';
        $total = $m_berita->total_jenis_status_berita($jenis_berita, $status_berita);
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = $this->website->paginasi_depan();
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
        $page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
        $berita = $m_berita->jenis_status_berita_all($jenis_berita, $status_berita, $perPage, $page);

        $data = [
            'title' => 'Berita Terbaru',
            'description' => 'Berita Terbaru',
            'keywords' => 'Berita Terbaru',
            'site' => $site,
            'berita' => $berita,
            'pagination' => $pager_links,
            'content' => 'berita/index'
        ];
        return view('layout/wrapper', $data);
    }

    // kategori
    public function kategori($slug_kategori)
    {
        $pager = service('pager');
        $m_site = new Konfigurasi_model();
        $site = $m_site->listing();
        $m_berita = new Berita_model();
        $m_kategori = new Kategori_berita_profile_model();
        $kategori = $m_kategori->read_slug($slug_kategori);
        if (!$kategori) {
            return redirect()->to(base_url('berita'));
        }
        $id_kategori_berita_profile = $kategori->id_kategori_berita_profile;
        $status_berita = 'Publish';
        $jenis_berita = 'Berita';
        $total = $m_berita->total_kategori_status_jenis($id_kategori_berita_profile, $jenis_berita, $status_berita);
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = $this->website->paginasi_depan();
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
        $page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
        $berita = $m_berita->kategori_status_jenis_all($id_kategori_berita_profile, $jenis_berita, $status_berita, $perPage, $page);


        $data = [
            'title' => $kategori->nama_kategori,
            'description' => $kategori->nama_kategori,
            'keywords' => $kategori->nama_kategori,
            'site' => $site,
            'berita' => $berita,
            'pagination' => $pager_links,
            'content' => 'berita/index'
        ];
        return view('layout/wrapper', $data);
    }

    // read
    public function read($slug_berita)
    {
        $m_berita = new Berita_model();
        $berita = $m_berita->read($slug_berita);
        $news = $m_berita->sidebar();

        $data = array(
            'id_berita' => $berita->id_berita,
            'hits' => $berita->hits + 1
        );
        $m_berita->edit($data);

        $data = [
            'title' => $berita->judul_berita,
            'description' => $berita->ringkasan,
            'berita' => $berita,
            'news' => $news,
            'content' => 'berita/read'
        ];
        return view('layout/wrapper', $data);
    }

    // profile
    public function profile($slug_berita)
    {
        $m_berita = new Berita_model();
        $berita = $m_berita->read($slug_berita);
        $news = $m_berita->nav_profile('Profile');

        $data = array(
            'id_berita' => $berita->id_berita,
            'hits' => $berita->hits + 1
        );
        $m_berita->edit($data);

        $data = [
            'title' => $berita->judul_berita,
            'description' => $berita->ringkasan,
            'berita' => $berita,
            'news' => $news,
            'content' => 'berita/profile'
        ];
        return view('layout/wrapper', $data);
    }
}