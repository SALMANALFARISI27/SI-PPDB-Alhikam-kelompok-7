<?php namespace App\Models;

use CodeIgniter\Model;

class Fasilitas_model extends Model
{

	protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.*, admin.nama');
        $builder->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // read
    public function read($slug_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.*, admin.nama');
        $builder->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $builder->where('fasilitas.slug_fasilitas',$slug_fasilitas);
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // home
    public function home($limit,$status_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.*, admin.nama');
        $builder->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $builder->where('fasilitas.status_fasilitas',$status_fasilitas);
        $builder->limit((int)$limit);
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // jenis
    public function status_fasilitas($limit,$start,$status_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.*, admin.nama');
        $builder->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $builder->where('fasilitas.status_fasilitas',$status_fasilitas);
        $builder->limit($limit,$start);
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_status_fasilitas
    public function total_status_fasilitas($status_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->where('status_fasilitas',$status_fasilitas);
        $query = $builder->get();
        return $query->getNumRows();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('fasilitas');
        $this->select('fasilitas.*, admin.nama');
        $this->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('fasilitas');
        $this->select('fasilitas.*, admin.nama');
        $this->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $this->like('fasilitas.judul_fasilitas',$keywords,'BOTH');
        $this->orLike('fasilitas.isi',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('fasilitas');
        $this->select('fasilitas.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $this->like('fasilitas.judul_fasilitas',$keywords,'BOTH');
        $this->orLike('fasilitas.isi',$keywords,'BOTH');
        $this->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('fasilitas');
        $query = $builder->get();
        return $query->getNumRows();
    }


    // detail
    public function detail($id_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.*, admin.nama');
        $builder->join('admin','admin.id_admin = fasilitas.id_admin','LEFT');
        $builder->where('fasilitas.id_fasilitas',$id_fasilitas);
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('fasilitas');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('fasilitas');
        $builder->where('id_fasilitas',$data['id_fasilitas']);
        $builder->update($data);
    }
    


    // fasilitas


    // fasilitas


    // fasilitas
    public function fasilitas()
    {
        $builder = $this->db->table('fasilitas');
        $builder->where('status_fasilitas','Publish');
        $builder->orderBy('fasilitas.id_fasilitas','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // Nav fasilitas
    public function nav_fasilitas()
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.judul_fasilitas, fasilitas.slug_fasilitas, fasilitas.hits, fasilitas.gambar, fasilitas.id_fasilitas');
        $builder->where(array('fasilitas.status_fasilitas' => 'Publish'));
        $builder->limit(15);
        $builder->orderBy('fasilitas.id_fasilitas', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}


