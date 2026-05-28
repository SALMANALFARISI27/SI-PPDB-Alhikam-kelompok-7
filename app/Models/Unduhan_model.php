<?php
namespace App\Models;

use CodeIgniter\Model;

class Unduhan_model extends Model
{

    protected $table = 'unduhan';
    protected $primaryKey = 'id_unduhan';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin($limit, $start)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->limit((int) $limit, (int) $start);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords, $limit, $start)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->like('unduhan.judul_unduhan', $keywords, 'BOTH');
        $this->orLike('unduhan.isi', $keywords, 'BOTH');
        $this->limit((int) $limit, (int) $start);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->like('unduhan.judul_unduhan', $keywords, 'BOTH');
        $this->orLike('unduhan.isi', $keywords, 'BOTH');
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getNumRows();
    }



    // author
    public function author_all($id_admin)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->where(['unduhan.id_admin' => $id_admin]);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_author($id_admin)
    {
        $this->table('unduhan')->where('id_admin', $id_admin);
        $query = $this->get();
        return $query->getNumRows();
    }

    // status_unduhan
    public function status_unduhan_all($status_unduhan, $limit, $start)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->where(['unduhan.status_unduhan' => $status_unduhan]);
        $this->limit((int) $limit, (int) $start);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // status_unduhan
    public function status_unduhan($status_unduhan)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->where(['unduhan.status_unduhan' => $status_unduhan]);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }


    // total
    public function total_status_unduhan($status_unduhan)
    {
        $this->table('unduhan')->where('status_unduhan', $status_unduhan);
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $this->table('unduhan');
        $query = $this->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_unduhan)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->where('unduhan.id_unduhan', $id_unduhan);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getRow();
    }


    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('unduhan');
        $builder->insert($data);
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('unduhan');
        $builder->where('id_unduhan', $data['id_unduhan']);
        $builder->update($data);
    }

    // read
    public function read($slug_unduhan)
    {
        $this->table('unduhan');
        $this->select('unduhan.*, admin.nama');
        $this->join('admin', 'admin.id_admin = unduhan.id_admin', 'LEFT');
        $this->where('unduhan.slug_unduhan', $slug_unduhan);
        $this->orderBy('unduhan.id_unduhan', 'DESC');
        $query = $this->get();
        return $query->getRow();
    }


}