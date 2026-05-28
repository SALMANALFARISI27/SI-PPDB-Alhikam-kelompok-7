<?php namespace App\Models;
use CodeIgniter\Model;
class Galeri_model extends Model
{

	protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // jenis


    // home
    public function home($limit)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.status_galeri', 'Publish');
        $builder->limit((int)$limit);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // jenis_galeri_pop
    public function jenis_galeri_pop($jenis_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.jenis_galeri', $jenis_galeri);
        $builder->where('galeri.status_galeri', 'Publish');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // Listing
    public function paginasi_admin($limit, $start)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.status_galeri', 'Publish');
        $builder->limit((int)$limit, (int)$start);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // Listing jenis
    public function paginasi_jenis($jenis_galeri, $limit, $start)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.status_galeri', 'Publish');
        $builder->where('galeri.jenis_galeri', $jenis_galeri);
        $builder->limit((int)$limit, (int)$start);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords, $limit, $start)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->like('galeri.judul_galeri', $keywords, 'BOTH');
        $builder->orLike('galeri.isi', $keywords, 'BOTH');
        $builder->limit((int)$limit, (int)$start);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama AS nama_user');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->like('galeri.judul_galeri', $keywords, 'BOTH');
        $builder->orLike('galeri.isi', $keywords, 'BOTH');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('galeri');
        $builder->where('status_galeri', 'Publish');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // total jenis
    public function total_jenis($jenis_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->where('status_galeri', 'Publish');
        $builder->where('jenis_galeri', $jenis_galeri);
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.id_galeri', $id_galeri);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // Read by slug
    public function read($slug_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, admin.nama');
        $builder->join('admin', 'admin.id_admin = galeri.id_admin', 'LEFT');
        $builder->where('galeri.slug_galeri', $slug_galeri);
        $builder->where('galeri.status_galeri', 'Publish');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('galeri');
        $builder->insert($data);
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('galeri');
        $builder->where('id_galeri', $data['id_galeri']);
        $builder->update($data);
    }
    
    // galeri
    public function jenis_galeri($jenis_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->where('jenis_galeri', $jenis_galeri);
        $builder->where('status_galeri', 'Publish');
        $builder->limit(5);
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // galeri


    // galeri
    public function galeri()
    {
        $builder = $this->db->table('galeri');
        $builder->where('jenis_galeri', 'Galeri');
        $builder->where('status_galeri', 'Publish');
        $builder->orderBy('galeri.id_galeri', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}