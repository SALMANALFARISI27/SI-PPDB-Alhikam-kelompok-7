<?php 
namespace App\Models;

use CodeIgniter\Model;

class Download_model extends Model
{

    protected $table = 'download';
    protected $primaryKey = 'id_download';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin($limit,$start)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function paginasi_admin_cari($keywords,$limit,$start)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->like('download.judul_download',$keywords,'BOTH');
        $this->orLike('download.isi',$keywords,'BOTH');
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // Listing
    public function total_cari($keywords)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->like('download.judul_download',$keywords,'BOTH');
        $this->orLike('download.isi',$keywords,'BOTH');
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getNumRows();
    }

    // kategori_download
    public function kategori_download($id_kategori_download)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where( [  'download.status_download'         => 'Publish',
                            'download.id_kategori_download'    => $id_kategori_download]);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // kategori_download_all (for backend)
    public function kategori_download_all($id_kategori_download,$limit,$start)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where('download.id_kategori_download', $id_kategori_download);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // kategori_download_status_all (for frontend)
    public function kategori_download_status_all($id_kategori_download,$status_download,$limit,$start)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where( [ 'download.id_kategori_download' => $id_kategori_download,
                        'download.status_download'       => $status_download
                    ]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_kategori_download($id_kategori_download)
    {
        $this->table('download')->where('id_kategori_download',$id_kategori_download);
        $query = $this->get();
        return $query->getNumRows();
    }

    // author
    public function author_all($id_admin)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where( [  'download.id_admin'    => $id_admin]);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // total
    public function total_author($id_admin)
    {
        $this->table('download')->where('id_admin',$id_admin);
        $query = $this->get();
        return $query->getNumRows();
    }

    // status_download
    public function status_download_all($status_download,$limit,$start)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where( [  'download.status_download'    => $status_download]);
        $this->limit((int)$limit,(int)$start);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }

    // status_download
    public function status_download($status_download)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where( [  'download.status_download'    => $status_download]);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getResult();
    }


    // total
    public function total_status_download($status_download)
    {
        $this->table('download')->where('status_download',$status_download);
        $query = $this->get();
        return $query->getNumRows();
    }

    // total
    public function total()
    {
        $this->table('download');
        $query = $this->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_download)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $this->join('admin','admin.id_admin = download.id_admin','LEFT');
        $this->where('download.id_download',$id_download);
        $this->orderBy('download.id_download','DESC');
        $query = $this->get();
        return $query->getRow();
    }


    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('download');
        $builder->insert($data);
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('download');
        $builder->where('id_download',$data['id_download']);
        $builder->update($data);
    }

    // read
    public function read($slug_download)
    {
        $this->table('download');
        $this->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, admin.nama');
        $this->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'LEFT');
        $this->join('admin', 'admin.id_admin = download.id_admin', 'LEFT');
        $this->where('download.slug_download', $slug_download);
        $this->orderBy('download.id_download', 'DESC');
        $query = $this->get();
        return $query->getRow();
    }

    // testing
    public function copypaste($data)
    {
        $builder = $this->db->table('download');
        $builder->insert($data);
    }

}

