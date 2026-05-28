<?php namespace App\Models;

use CodeIgniter\Model;

class Ekstrakurikuler_model extends Model
{

	protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_ekstrakurikuler';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->select('ekstrakurikuler.*, admin.nama');
        $builder->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // read
    public function read($slug_ekstrakurikuler)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->select('ekstrakurikuler.*, admin.nama');
        $builder->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $builder->where('ekstrakurikuler.slug_ekstrakurikuler',$slug_ekstrakurikuler);
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // home
    public function home($limit,$status_ekstrakurikuler)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->select('ekstrakurikuler.*, admin.nama');
        $builder->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $builder->where('ekstrakurikuler.status_ekstrakurikuler',$status_ekstrakurikuler);
        $builder->limit((int)$limit);
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // jenis
    public function status_ekstrakurikuler($limit,$start,$status_ekstrakurikuler)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->select('ekstrakurikuler.*, admin.nama');
        $builder->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $builder->where('ekstrakurikuler.status_ekstrakurikuler',$status_ekstrakurikuler);
        $builder->limit($limit,$start);
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_status_ekstrakurikuler
    public function total_status_ekstrakurikuler($status_ekstrakurikuler)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->where('status_ekstrakurikuler',$status_ekstrakurikuler);
        $query = $builder->get();
        return $query->getNumRows();
    }


    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('ekstrakurikuler');
        $this->select('ekstrakurikuler.*, admin.nama');
        $this->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('ekstrakurikuler');
        $this->select('ekstrakurikuler.*, admin.nama');
        $this->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $this->like('ekstrakurikuler.judul_ekstrakurikuler',$keywords,'BOTH');
        $this->orLike('ekstrakurikuler.isi',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('ekstrakurikuler');
        $this->select('ekstrakurikuler.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $this->like('ekstrakurikuler.judul_ekstrakurikuler',$keywords,'BOTH');
        $this->orLike('ekstrakurikuler.isi',$keywords,'BOTH');
        $this->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('ekstrakurikuler');
        $query = $builder->get();
        return $query->getNumRows();
    }


    // detail
    public function detail($id_ekstrakurikuler)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->select('ekstrakurikuler.*, admin.nama');
        $builder->join('admin','admin.id_admin = ekstrakurikuler.id_admin','LEFT');
        $builder->where('ekstrakurikuler.id_ekstrakurikuler',$id_ekstrakurikuler);
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->where('id_ekstrakurikuler',$data['id_ekstrakurikuler']);
        $builder->update($data);
    }
    


    // ekstrakurikuler


    // ekstrakurikuler


    // ekstrakurikuler
    public function ekstrakurikuler()
    {
        $builder = $this->db->table('ekstrakurikuler');
        $builder->where('status_ekstrakurikuler','Publish');
        $builder->orderBy('ekstrakurikuler.id_ekstrakurikuler','DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}




