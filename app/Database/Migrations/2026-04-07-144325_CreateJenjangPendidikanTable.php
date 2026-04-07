<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenjangPendidikanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenjang_pendidikan' => [
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
            'slug_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'judul_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'ringkasan' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'status_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'jenis_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tanggal_publish' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_jenjang_pendidikan', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jenjang_pendidikan');
    }

    public function down()
    {
        $this->forge->dropTable('jenjang_pendidikan');
    }
}