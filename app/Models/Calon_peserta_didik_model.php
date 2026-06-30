<?php 
namespace App\Models;

use CodeIgniter\Model;

class Calon_peserta_didik_model extends Model
{

    protected $table            = 'calon_peserta_didik';
    protected $primaryKey       = 'id_calon_peserta_didik';
    protected $allowedFields    = [
        'id_admin', 'id_gelombang', 'id_akun', 'id_jenjang_pendidikan', 'agama', 
        'kode_calon_peserta_didik', 'slug_calon_peserta_didik', 'nis', 'nisn', 
        'status_wn', 'negara_asal', 'nama_calon_peserta_didik', 'tempat_lahir', 
        'tanggal_lahir', 'alamat', 'telepon', 'kode_pos', 'email', 'jenis_kelamin', 
        'berkebutuhan_khusus', 'isi', 'nama_ayah', 'agama_ayah', 'jenjang_ayah', 
        'pekerjaan_ayah', 'alamat_ayah', 'telepon_ayah', 'nama_ibu', 'agama_ibu', 
        'jenjang_ibu', 'pekerjaan_ibu', 'alamat_ibu', 'telepon_ibu', 'nama_wali', 
        'agama_wali', 'jenjang_wali', 'pekerjaan_wali', 'alamat_wali', 'telepon_wali', 
        'identitas_wali', 'goldar_calon_peserta_didik', 'hobi_calon_peserta_didik', 
        'penyakit_calon_peserta_didik', 'tinggi', 'berat', 'jenis_calon_peserta_didik', 
        'asal_sekolah', 'alamat_sekolah_asal', 'tanggal_pindah', 'anak_ke', 
        'jumlah_saudara', 'status_pendaftaran', 'tanggal'
    ];

    // listing
    public function listing()
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                        gelombang.judul,
                        gelombang.tahun_ajaran');
   
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // status_pendaftaran
    public function status_pendaftaran($status_pendaftaran)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
    
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('status_pendaftaran',$status_pendaftaran);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

     // status_calon_peserta_didik
    public function akun($id_akun)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
               
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
     
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('id_akun',$id_akun);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // gelombang
    public function gelombang($id_gelombang)
    {
        $builder = $this->db->table('calon_peserta_didik s');
        $builder->select('jp.judul_jenjang_pendidikan, jp.id_jenjang_pendidikan, s.status_pendaftaran, COUNT(s.id_calon_peserta_didik) AS jumlah_calon_peserta_didik');
        $builder->join('jenjang_pendidikan jp', 's.id_jenjang_pendidikan = jp.id_jenjang_pendidikan');
        $builder->where('s.id_gelombang',$id_gelombang);
        $builder->groupBy('jp.judul_jenjang_pendidikan, s.status_pendaftaran');
        $builder->orderBy('jp.judul_jenjang_pendidikan, s.status_pendaftaran');
        $query = $builder->get();
        return $query->getResult();
    }


    // gelombang_status_calon_peserta_didik
    public function gelombang_status_calon_peserta_didik($id_gelombang,$status_pendaftaran,$id_jenjang_pendidikan)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
              
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
  
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('calon_peserta_didik.id_gelombang',$id_gelombang);

        if($status_pendaftaran != 'Semua') {
            $builder->where('status_pendaftaran',$status_pendaftaran);
        }
        if($id_jenjang_pendidikan != 'Semua') {
            $builder->where('calon_peserta_didik.id_jenjang_pendidikan',$id_jenjang_pendidikan);
        }

        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    // total_gelombang_status_calon_peserta_didik
    public function total_gelombang_status_calon_peserta_didik($id_gelombang,$status_pendaftaran,$id_jenjang_pendidikan)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('COUNT(*) AS total');
        $builder->where('id_gelombang',$id_gelombang);
        if($status_pendaftaran != 'Semua') {
            $builder->where('status_pendaftaran',$status_pendaftaran);
        }
        if($id_jenjang_pendidikan != 'Semua') {
            $builder->where('id_jenjang_pendidikan',$id_jenjang_pendidikan);
        }
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // status_pendaftaran_gelombang


    // paginasi


    // paginasi


    // total
    public function total_cari($keywords)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('COUNT(*) AS total');
        $builder->like('nama_calon_peserta_didik',$keywords,'BOTH');
        $builder->orLike('email',$keywords,'BOTH');
        $builder->orLike('nama_ayah',$keywords,'BOTH');
        $builder->orLike('nama_ibu',$keywords,'BOTH');
        $builder->orLike('nama_wali',$keywords,'BOTH');
        $builder->orLike('alamat',$keywords,'BOTH');
        $builder->orLike('telepon',$keywords,'BOTH');
        $builder->orLike('alamat',$keywords,'BOTH');
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // last_id


    // detail
    public function detail($id_calon_peserta_didik)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                  
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
    
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('id_calon_peserta_didik',$id_calon_peserta_didik);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // listing


    // read
    public function read($slug_calon_peserta_didik)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('slug_calon_peserta_didik',$slug_calon_peserta_didik);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // read
    public function kode_calon_peserta_didik($kode_calon_peserta_didik)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                        gelombang.judul,
                        gelombang.tahun_ajaran,
                        jenjang_pendidikan.judul_jenjang_pendidikan');
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('kode_calon_peserta_didik',$kode_calon_peserta_didik);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    // akun_latest - ambil data biodata terbaru dari akun
    public function akun_latest($id_akun)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('calon_peserta_didik.*,
                        jenjang_pendidikan.judul_jenjang_pendidikan,
                        jenjang_pendidikan.jenis_jenjang_pendidikan,
                        gelombang.judul,
                        gelombang.tahun_ajaran');
        $builder->join('gelombang','gelombang.id_gelombang = calon_peserta_didik.id_gelombang','LEFT');
        $builder->join('jenjang_pendidikan','jenjang_pendidikan.id_jenjang_pendidikan = calon_peserta_didik.id_jenjang_pendidikan','LEFT');
        $builder->where('calon_peserta_didik.id_akun', $id_akun);
        $builder->orderBy('calon_peserta_didik.id_calon_peserta_didik','DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getRow();
    }

    // akun_registered_jenjang - ambil list id_jenjang_pendidikan yang sudah didaftarkan akun ini
    public function akun_registered_jenjang($id_akun, $id_gelombang)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->select('id_jenjang_pendidikan');
        $builder->where('id_akun', $id_akun);
        $builder->where('id_gelombang', $id_gelombang);
        $query = $builder->get();
        $rows = $query->getResult();
        $ids = [];
        foreach ($rows as $row) {
            $ids[] = $row->id_jenjang_pendidikan;
        }
        return $ids;
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->where('id_calon_peserta_didik',$data['id_calon_peserta_didik']);
        $builder->update($data);
    }

    // hapus
    public function hapus($data)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->where('slug_calon_peserta_didik',$data['slug_calon_peserta_didik']);
        $builder->where('id_akun',$data['id_akun']);
        $builder->delete();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('calon_peserta_didik');
        $builder->insert($data);
    }
}