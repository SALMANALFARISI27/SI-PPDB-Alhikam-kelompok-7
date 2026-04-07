<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori_staff' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'slug_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'nama_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_kategori_staff', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_staff');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_staff');
    }
}