<?php 
namespace App\Models;

use CodeIgniter\Model;

class Staff_model extends Model
{

    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->orderBy("CASE 
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA PIMPINAN PONDOK%' THEN 1
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA PONDOK%' THEN 2
            WHEN UPPER(staff.jabatan) LIKE '%WAKIL%' THEN 4
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA SEKOLAH%' THEN 3
            WHEN UPPER(staff.jabatan) LIKE '%GURU%' THEN 5
            ELSE 99
        END", 'ASC', FALSE);
        $this->orderBy('staff.urutan','ASC');
        $query = $this->get();
        return $query->getResult();
    }

    // home
    public function home($jumlah)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->where([ 'status_staff' => 'Publish']);
        $this->limit($jumlah);
        $this->orderBy("CASE 
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA PIMPINAN PONDOK%' THEN 1
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA PONDOK%' THEN 2
            WHEN UPPER(staff.jabatan) LIKE '%WAKIL%' THEN 4
            WHEN UPPER(staff.jabatan) LIKE '%KEPALA SEKOLAH%' THEN 3
            WHEN UPPER(staff.jabatan) LIKE '%GURU%' THEN 5
            ELSE 99
        END", 'ASC', FALSE);
        $this->orderBy('staff.urutan','ASC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('staff.id_staff','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing cari
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->like('staff.nama',$keywords,'BOTH');
        $this->orLike('staff.jabatan',$keywords,'BOTH');
        $this->orLike('staff.keahlian',$keywords,'BOTH');
        $this->orLike('staff.email',$keywords,'BOTH');
        $this->orLike('staff.alamat',$keywords,'BOTH');
        $this->orLike('staff.telepon',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('staff.id_staff','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total cari
    public function total_cari($keywords)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->like('staff.nama',$keywords,'BOTH');
        $this->orLike('staff.jabatan',$keywords,'BOTH');
        $this->orLike('staff.keahlian',$keywords,'BOTH');
        $this->orLike('staff.email',$keywords,'BOTH');
        $this->orLike('staff.alamat',$keywords,'BOTH');
        $this->orLike('staff.telepon',$keywords,'BOTH');
        $this->orderBy('staff.id_staff','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // jenis publish
    public function jenis_publish($jenis_staff)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->where([ 'status_staff' => 'Publish',
                        'jenis_staff'  => $jenis_staff
                        ]);
        $this->orderBy('staff.urutan','ASC');
        $query = $this->get();
        return $query->getResult();
    }

    // jenis all


    // total jenis


    // status


    // total status


    // total
    public function total()
    {
        $this->table('staff');
        $query = $this->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_staff)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->where('staff.id_staff',$id_staff);
        $this->orderBy('staff.id_staff','DESC');
        $query = $this->get();
        return $query->getRow();
    }


    // read
    public function read($slug_staff)
    {
        $this->table('staff');
        $this->select('staff.*, admin.nama AS nama_user');
        $this->join('admin','admin.id_admin = staff.id_admin','LEFT');
        $this->where('staff.slug_staff',$slug_staff);
        $this->where('staff.status_staff','Publish');
        $this->orderBy('staff.id_staff','DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('staff');
        $builder->insert($data);
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('staff');
        $builder->where('id_staff',$data['id_staff']);
        $builder->update($data);
    }


}
