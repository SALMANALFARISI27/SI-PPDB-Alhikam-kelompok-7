<?php
namespace App\Models;

use CodeIgniter\Model;

class Akun_model extends Model
{

    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = [];

    // total
    public function total()
    {
        $builder = $this->db->table('akun');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // login
    public function login($username, $password)
    {
        $builder = $this->db->table('akun');
        $builder->select('akun.*, calon_peserta_didik.nama_calon_peserta_didik, calon_peserta_didik.slug_calon_peserta_didik, calon_peserta_didik.nis, calon_peserta_didik.nisn');
        $builder->join('calon_peserta_didik', 'calon_peserta_didik.id_akun = akun.id_akun', 'LEFT');
        $builder->groupStart();
            $builder->where('akun.email', $username);
            $builder->orWhere('akun.username', $username);
        $builder->groupEnd();
        $builder->where('akun.password', $password);
        $builder->orderBy('akun.id_akun', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // login_nis
    public function login_nis($username, $password)
    {
        $builder = $this->db->table('akun');
        $builder->select('akun.*, calon_peserta_didik.nama_calon_peserta_didik, calon_peserta_didik.slug_calon_peserta_didik, calon_peserta_didik.nis, calon_peserta_didik.nisn');
        $builder->join('calon_peserta_didik', 'calon_peserta_didik.id_akun = akun.id_akun', 'LEFT');

        $builder->where('akun.id_akun', $username);
        $builder->where('akun.password', $password);
        $builder->orderBy('akun.id_akun', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function kode_akun($kode_akun)
    {
        $builder = $this->db->table('akun');
        $builder->select('akun.*, calon_peserta_didik.nama_calon_peserta_didik, calon_peserta_didik.slug_calon_peserta_didik, calon_peserta_didik.nis, calon_peserta_didik.nisn');
        $builder->join('calon_peserta_didik', 'calon_peserta_didik.id_akun = akun.id_akun', 'LEFT');

        $builder->where('akun.kode_akun', $kode_akun);
        $builder->orderBy('akun.id_akun', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // email
    public function email($email)
    {
        $builder = $this->db->table('akun');
        $builder->select('akun.*, calon_peserta_didik.nama_calon_peserta_didik, calon_peserta_didik.slug_calon_peserta_didik, calon_peserta_didik.nis, calon_peserta_didik.nisn');
        $builder->join('calon_peserta_didik', 'calon_peserta_didik.id_akun = akun.id_akun', 'LEFT');

        $builder->where('akun.email', $email);
        $builder->orderBy('akun.id_akun', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // detail
    public function detail($id_akun)
    {
        $builder = $this->db->table('akun');
        $builder->select('akun.*, calon_peserta_didik.nama_calon_peserta_didik, calon_peserta_didik.slug_calon_peserta_didik, calon_peserta_didik.nis, calon_peserta_didik.nisn');
        $builder->join('calon_peserta_didik', 'calon_peserta_didik.id_akun = akun.id_akun', 'LEFT');

        $builder->where('akun.id_akun', $id_akun);
        $builder->orderBy('akun.id_akun', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('akun');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('akun');
        $builder->where('id_akun', $data['id_akun']);
        $builder->update($data);
    }

}
