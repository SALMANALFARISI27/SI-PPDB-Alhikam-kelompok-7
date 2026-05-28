<?php namespace App\Models;

use CodeIgniter\Model;

class Portofolio_model extends Model
{

	protected $table = 'portofolio';
    protected $primaryKey = 'id_portofolio';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('portofolio');
        $builder->select('portofolio.*, admin.nama');
        $builder->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // read
    public function read($slug_portofolio)
    {
        $builder = $this->db->table('portofolio');
        $builder->select('portofolio.*, admin.nama');
        $builder->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $builder->where('portofolio.slug_portofolio',$slug_portofolio);
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // home
    public function home($limit,$status_portofolio)
    {
        $builder = $this->db->table('portofolio');
        $builder->select('portofolio.*, admin.nama');
        $builder->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $builder->where('portofolio.status_portofolio',$status_portofolio);
        $builder->limit((int)$limit);
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // status
    public function status_portofolio($limit,$start,$status_portofolio)
    {
        $builder = $this->db->table('portofolio');
        $builder->select('portofolio.*, admin.nama');
        $builder->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $builder->where('portofolio.status_portofolio',$status_portofolio);
        $builder->limit($limit,$start);
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_status
    public function total_status_portofolio($status_portofolio)
    {
        $builder = $this->db->table('portofolio');
        $builder->where('status_portofolio',$status_portofolio);
        $query = $builder->get();
        return $query->getNumRows();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('portofolio');
        $this->select('portofolio.*, admin.nama');
        $this->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('portofolio.id_portofolio','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('portofolio');
        $this->select('portofolio.*, admin.nama');
        $this->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $this->like('portofolio.judul_portofolio',$keywords,'BOTH');
        $this->orLike('portofolio.isi',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('portofolio.id_portofolio','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('portofolio');
        $this->select('portofolio.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $this->like('portofolio.judul_portofolio',$keywords,'BOTH');
        $this->orLike('portofolio.isi',$keywords,'BOTH');
        $this->orderBy('portofolio.id_portofolio','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('portofolio');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_portofolio)
    {
        $builder = $this->db->table('portofolio');
        $builder->select('portofolio.*, admin.nama');
        $builder->join('admin','admin.id_admin = portofolio.id_admin','LEFT');
        $builder->where('portofolio.id_portofolio',$id_portofolio);
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('portofolio');
        $builder->insert($data);
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('portofolio');
        $builder->where('id_portofolio',$data['id_portofolio']);
        $builder->update($data);
    }



    // jenis


    // jenis_1


    // portofolio
    public function portofolio()
    {
        $builder = $this->db->table('portofolio');
        $builder->where('jenis_portofolio','Portofolio');
        $builder->orderBy('portofolio.id_portofolio','DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
