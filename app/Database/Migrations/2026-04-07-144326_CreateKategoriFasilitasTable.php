<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriFasilitasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori_fasilitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'slug_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'nama_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id_kategori_fasilitas', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_fasilitas');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_fasilitas');
    }
}