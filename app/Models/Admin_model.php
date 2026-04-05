<?php 
namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
   public function __construct()
    {
        parent::__construct();
        $this->db       = \Config\Database::connect();
    }

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['*'];

    // login
    public function login($username,$password)
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->where([   'username'  => $username,
                            'password'  => SHA1($password)]);
        $query = $builder->get();
        return $query->getRow();
    }

    // listing
    public function listing()
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->orderBy('id_admin','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('admin');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('id_admin','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($id_admin)
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->where('id_admin',$id_admin);
        $builder->orderBy('id_admin','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // kode_rahasia
    public function kode_rahasia($kode_rahasia)
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->where('kode_rahasia',$kode_rahasia);
        $builder->orderBy('id_admin','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // check
    public function check($email)
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->where('email',$email);
        $builder->orderBy('id_admin','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('admin');
        $builder->where('id_admin',$data['id_admin']);
        $builder->update($data);
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('admin');
        $builder->insert($data);
    }
}