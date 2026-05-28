<?php 
namespace App\Models;

use CodeIgniter\Model;

class Tautan_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db               = \Config\Database::connect();
    }

    protected $table            = 'tautan';
    protected $primaryKey       = 'id_tautan';
    protected $allowedFields    = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('tautan');
        $builder->select('*');
        $builder->orderBy('tautan.id_tautan','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

     // listing
    public function tautan($id_tautan)
    {
        $builder = $this->db->table('tautan');
        $builder->select('COUNT(*) AS total');
        $builder->where('id_tautan',$id_tautan);
        $query = $builder->get();
        return $query->getRow();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('tautan');
        $builder->select('COUNT(*) AS total');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($id_tautan)
    {
        $builder = $this->db->table('tautan');
        $builder->where('id_tautan',$id_tautan);
        $builder->orderBy('tautan.id_tautan','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read
    public function read($slug_tautan)
    {
        $builder = $this->db->table('tautan');
        $builder->where('slug_tautan',$slug_tautan);
        $builder->orderBy('tautan.id_tautan','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('tautan');
        $builder->where('id_tautan',$data['id_tautan']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('tautan');
        $builder->insert($data);
    }

    // Nav tautan
    public function nav_tautan($status_tautan)
    {
        $builder = $this->db->table('tautan');
        $builder->select('*');
        $builder->where('status_tautan', $status_tautan);
        $builder->orderBy('urutan', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }

}