<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dokumen_model extends Model
{

    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->like('dokumen.judul_dokumen',$keywords,'BOTH');
        $this->orLike('dokumen.isi',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->like('dokumen.judul_dokumen',$keywords,'BOTH');
        $this->orLike('dokumen.isi',$keywords,'BOTH');
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // jenis_dokumen
    public function jenis_dokumen($id_jenis_dokumen)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->where( [  'jenis_dokumen'         => 'Dokumen',
                            'dokumen.id_jenis_dokumen'    => $id_jenis_dokumen]);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // jenis_dokumen
    public function jenis_dokumen_all($id_jenis_dokumen,$jenis_dokumen,$limit,$start)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->where( [ 'dokumen.id_jenis_dokumen' => $id_jenis_dokumen,
                        'dokumen.jenis_dokumen'       => $jenis_dokumen
                    ]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_author($id_calon_peserta_didik)
    {
        $this->table('dokumen')->where('id_calon_peserta_didik',$id_calon_peserta_didik);
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total_jenis_dokumen($jenis_dokumen)
    {
        $this->table('dokumen')->where('jenis_dokumen',$jenis_dokumen);
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $this->table('dokumen');
        $query = $this->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_dokumen)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->where('dokumen.id_dokumen',$id_dokumen);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // kode_dokumen
    public function kode_dokumen($kode_dokumen)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->where('dokumen.kode_dokumen',$kode_dokumen);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // check
    public function check($id_calon_peserta_didik,$id_jenis_dokumen)
    {
        $this->table('dokumen');
        $this->select('dokumen.*, jenis_dokumen.nama_jenis_dokumen, jenis_dokumen.slug_jenis_dokumen, calon_peserta_didik.nama_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen','LEFT');
        $this->join('calon_peserta_didik','calon_peserta_didik.id_calon_peserta_didik = dokumen.id_calon_peserta_didik','LEFT');
        $this->where('dokumen.id_calon_peserta_didik',$id_calon_peserta_didik);
        $this->where('dokumen.id_jenis_dokumen',$id_jenis_dokumen);
        $this->orderBy('dokumen.id_dokumen','DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // check
    public function total_check($id_calon_peserta_didik,$status_jenis_dokumen)
    {
        $this->table('dokumen');
        $this->select('COUNT(dokumen.id_dokumen) AS total,jenis_dokumen.status_jenis_dokumen, max(dokumen.id_calon_peserta_didik) AS id_calon_peserta_didik');
        $this->join('jenis_dokumen','jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen');
        $this->where('dokumen.id_calon_peserta_didik',$id_calon_peserta_didik);
        $this->where('jenis_dokumen.status_jenis_dokumen',$status_jenis_dokumen);
        $this->groupBy('jenis_dokumen.id_jenis_dokumen');
        $this->orderBy('jenis_dokumen.status_jenis_dokumen','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }


    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('dokumen');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('dokumen');
        $builder->where('id_dokumen',$data['id_dokumen']);
        $builder->update($data);
    }

    // hapus
    public function hapus($data)
    {
        $builder = $this->db->table('dokumen');
        $builder->where('kode_dokumen',$data['kode_dokumen']);
        $builder->delete($data);
    }

    // testing
    public function copypaste($data)
    {
        $builder = $this->db->table('dokumen');
        $builder->insert($data);
    }

}