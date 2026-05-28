<?php 
namespace App\Models;

use CodeIgniter\Model;

class Kategori_berita_profile_model extends Model
{

   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'kategori_berita_profile';
    protected $primaryKey = 'id_kategori_berita_profile';
    protected $allowedFields = ['*'];

    // listing
    public function listing()
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->select('*');
        $builder->orderBy('kategori_berita_profile.urutan','ASC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_berita_profile.urutan','ASC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($id_kategori_berita_profile)
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->where('id_kategori_berita_profile',$id_kategori_berita_profile);
        $builder->orderBy('kategori_berita_profile.urutan','ASC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read
    public function read($id_kategori_berita_profile)
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->where('id_kategori_berita_profile',$id_kategori_berita_profile);
        $builder->orderBy('kategori_berita_profile.urutan','ASC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read_slug
    public function read_slug($slug_kategori)
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->where('slug_kategori',$slug_kategori);
        $builder->orderBy('kategori_berita_profile.urutan','ASC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->where('id_kategori_berita_profile',$data['id_kategori_berita_profile']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('kategori_berita_profile');
        $builder->insert($data);
    }

    // tambah  log

}