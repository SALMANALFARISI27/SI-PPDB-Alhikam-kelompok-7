<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriBeritaProfileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori_berita_profile' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_admin' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'slug_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_kategori_berita_profile', true);
        $this->forge->addKey('id_admin');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'kategori_berita_profile_ibfk_1');

        $this->forge->createTable('kategori_berita_profile', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('kategori_berita_profile', 'kategori_berita_profile_ibfk_1');
        $this->forge->dropTable('kategori_berita_profile', true);
    }
}
