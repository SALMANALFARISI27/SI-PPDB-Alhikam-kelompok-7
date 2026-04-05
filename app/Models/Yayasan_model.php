<?php 
namespace App\Models;

use CodeIgniter\Model;

class Yayasan_model extends Model
{

    // Listing
    public function listing()
    {
        $builder = $this->db->table('yayasan');
        $builder->select('*');
        $query = $builder->get();
        return $query->getRow();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('yayasan');
        $builder->where('id_yayasan', $data['id_yayasan']);
        $builder->update($data);
    }
}
