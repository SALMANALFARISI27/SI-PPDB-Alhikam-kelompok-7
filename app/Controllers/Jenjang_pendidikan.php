<?php
namespace App\Controllers;
use App\Models\Konfigurasi_model;
use App\Models\Jenjang_pendidikan_model;
use App\Models\Nav_model;


class Jenjang_pendidikan extends BaseController
{
    // index
    public function index()
    {
        $pager = service('pager');
        $m_site = new Konfigurasi_model();
        $site = $m_site->listing();
        $m_jenjang_pendidikan = new Jenjang_pendidikan_model();
        $status_jenjang_pendidikan = 'Publish';
        $total = $m_jenjang_pendidikan->total_status_jenjang_pendidikan($status_jenjang_pendidikan);
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = $this->website->paginasi_depan();
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination');
        $page = ($this->request->getGet('page')) ? ($this->request->getGet('page') - 1) * $perPage : 0;
        $jenjang_pendidikan = $m_jenjang_pendidikan->status_jenjang_pendidikan_all($status_jenjang_pendidikan, $perPage, $page);

        $data = [
            'title' => 'PROGRAM UNGGULAN',
            'description' => 'Program Unggulan',
            'keywords' => 'Program Unggulan',
            'site' => $site,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'pagination' => $pager_links,
            'content' => 'jenjang_pendidikan/index'
        ];
        return view('layout/wrapper', $data);
    }

    // jenjang (Obsolete endpoint, safely returns 404 to gracefully avoid Jenjang_model DBException)
    public function jenjang($id_jenjang)
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }


    // read
    public function read($slug_jenjang_pendidikan)
    {
        $m_jenjang_pendidikan = new Jenjang_pendidikan_model();
        if (is_numeric($slug_jenjang_pendidikan)) {
            $jenjang_pendidikan = $m_jenjang_pendidikan->detail($slug_jenjang_pendidikan);
        } else {
            $jenjang_pendidikan = $m_jenjang_pendidikan->read($slug_jenjang_pendidikan);
        }

        if (!$jenjang_pendidikan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $news = $m_jenjang_pendidikan->sidebar();
        // print_r($jenjang_pendidikan);
        $data = array(
            'id_jenjang_pendidikan' => $jenjang_pendidikan->id_jenjang_pendidikan,
            'hits' => $jenjang_pendidikan->hits + 1
        );
        $m_jenjang_pendidikan->edit($data);


        $data = [
            'title' => $jenjang_pendidikan->judul_jenjang_pendidikan,
            'description' => $jenjang_pendidikan->ringkasan,

            'jenjang_pendidikan' => $jenjang_pendidikan,
            'news' => $news,
            'content' => 'jenjang_pendidikan/read'
        ];
        return view('layout/wrapper', $data);
    }

    // profil
    public function profil($id_jenjang_pendidikan)
    {
        $m_jenjang_pendidikan = new Jenjang_pendidikan_model();
        $m_nav = new Nav_model();
        $jenjang_pendidikan = $m_jenjang_pendidikan->read($id_jenjang_pendidikan);

        if (!$jenjang_pendidikan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $news = $m_nav->profil('Profil');

        $data = array(
            'id_jenjang_pendidikan' => $jenjang_pendidikan->id_jenjang_pendidikan,
            'hits' => $jenjang_pendidikan->hits + 1
        );
        $m_jenjang_pendidikan->edit($data);

        $data = [
            'title' => $jenjang_pendidikan->judul_jenjang_pendidikan,
            'description' => $jenjang_pendidikan->ringkasan,
            'keywords' => $jenjang_pendidikan->judul_jenjang_pendidikan . ', ' . $jenjang_pendidikan->keywords,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'news' => $news,
            'content' => 'jenjang_pendidikan/profil'
        ];
        return view('layout/wrapper', $data);
    }



}
