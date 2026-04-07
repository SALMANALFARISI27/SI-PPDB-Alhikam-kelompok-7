<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisDokumenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_dokumen' => [
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
            'slug_jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'nama_jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_jenis_dokumen' => [
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
        $this->forge->addKey('id_jenis_dokumen', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jenis_dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_dokumen');
    }
}