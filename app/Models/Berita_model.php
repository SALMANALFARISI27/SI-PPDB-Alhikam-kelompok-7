<?php 
namespace App\Models;

use CodeIgniter\Model;

class Berita_model extends Model
{

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->like('berita.judul_berita',$keywords,'BOTH');
        $this->orLike('berita.isi',$keywords,'BOTH');
        $this->orLike('berita.ringkasan',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->like('berita.judul_berita',$keywords,'BOTH');
        $this->orLike('berita.isi',$keywords,'BOTH');
        $this->orLike('berita.ringkasan',$keywords,'BOTH');
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }


    // home
    public function beranda($jenis_berita,$jumlah)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [     'status_berita' => 'Publish',
                            'jenis_berita'  => $jenis_berita]);
        $this->orderBy('berita.tanggal_publish','DESC');
        $this->limit($jumlah);
        $query = $this->get();
        return $query->getResult();
    }

    // home
    public function sidebar()
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [  'status_berita' => 'Publish',
                            'jenis_berita'  => 'Berita']);
        $this->orderBy('berita.tanggal_publish','DESC');
        $this->limit(10);
        $query = $this->get();
        return $query->getResult();
    }


    // home
    public function home()
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [     'status_berita' => 'Publish',
                            'jenis_berita'  => 'Berita']);
        $this->orderBy('berita.tanggal_publish','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // home
    public function jenis_publish($jenis_berita)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [     'status_berita'    => 'Publish',
                            'jenis_berita'  => $jenis_berita
                        ]);
        $this->orderBy('berita.urutan','ASC');
        $query = $this->get();
        return $query->getResult();
    }

    // kategori
    public function kategori($id_kategori_berita_profile)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [  'status_berita'         => 'Publish',
                            'jenis_berita'          => 'Berita',
                            'berita.id_kategori_berita_profile'    => $id_kategori_berita_profile]);
        $this->orderBy('berita.tanggal_publish','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // kategori
    public function kategori_status_jenis_all($id_kategori_berita_profile,$jenis_berita,$status_berita,$limit,$start)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [ 'berita.id_kategori_berita_profile'    => $id_kategori_berita_profile,
                        'berita.jenis_berita'   => $jenis_berita,
                        'berita.status_berita'  => $status_berita,
                    ]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('berita.tanggal_publish','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_kategori_status_jenis($id_kategori_berita_profile,$jenis_berita,$status_berita)
    {
        $this->table('berita');
        $this->where( [ 'berita.id_kategori_berita_profile'    => $id_kategori_berita_profile,
                        'berita.jenis_berita'   => $jenis_berita,
                        'berita.status_berita'  => $status_berita,
                    ]);
        $query = $this->get();
        return $query->getNumRows();
    }

    // kategori


    // total


    // author
    public function author_all($id_admin)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [  'berita.id_admin'    => $id_admin]);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_author($id_admin)
    {
        $this->table('berita')->where('id_admin',$id_admin);
        $query = $this->get();
        return $query->getNumRows();
    }

    // kategori


    // total


    // status_berita
    public function status_berita_all($status_berita,$limit,$start)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [  'berita.status_berita'    => $status_berita]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // kategori
    public function jenis_status_berita_all($jenis_berita,$status_berita,$limit,$start)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where( [     'berita.jenis_berita'   => $jenis_berita,
                            'berita.status_berita'  => $status_berita,  
                        ]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_jenis_status_berita($jenis_berita,$status_berita)
    {
        $this->table('berita')->where('jenis_berita',$jenis_berita)->where('status_berita',$status_berita);
        $query = $this->get();
        return $query->getNumRows();
    }

    // status_berita


    // total
    public function total()
    {
        $this->table('berita');
        $query = $this->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_berita)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where('berita.id_berita',$id_berita);
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getRow();
    }


    // read
    public function read($slug_berita)
    {
        $this->table('berita');
        $this->select('berita.*, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori, admin.nama');
        $this->join('kategori_berita_profile','kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile','LEFT');
        $this->join('admin','admin.id_admin = berita.id_admin','LEFT');
        $this->where('berita.slug_berita',$slug_berita);
        $this->where('berita.status_berita','Publish');
        $this->orderBy('berita.id_berita','DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('berita');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('berita');
        $builder->where('id_berita',$data['id_berita']);
        $builder->update($data);
    }

    // Nav berita
    public function nav_berita()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.id_kategori_berita_profile as id_kategori, MAX(berita.ringkasan) AS ringkasan, MAX(berita.gambar) AS gambar, kategori_berita_profile.nama_kategori, kategori_berita_profile.slug_kategori');
        $builder->join('kategori_berita_profile', 'kategori_berita_profile.id_kategori_berita_profile = berita.id_kategori_berita_profile');
        $builder->where(array('status_berita' => 'Publish', 'jenis_berita' => 'Berita'));
        $builder->groupBy('berita.id_kategori_berita_profile');
        $query = $builder->get();
        return $query->getResult();
    }

    // Nav profile
    public function nav_profile($jenis_berita)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.judul_berita, berita.hits, berita.ringkasan, berita.gambar, berita.slug_berita, berita.id_berita');
        $builder->where(array('status_berita' => 'Publish', 'jenis_berita' => $jenis_berita));
        $query = $builder->get();
        return $query->getResult();
    }

    // Nav faq



}


