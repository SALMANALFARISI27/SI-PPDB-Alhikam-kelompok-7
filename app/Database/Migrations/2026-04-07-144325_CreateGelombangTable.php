<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGelombangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gelombang' => [
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
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'tahap' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'null' => false,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'tanggal_buka' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_tutup' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_pengumuman' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status_gelombang' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_gelombang', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gelombang');
    }

    public function down()
    {
        $this->forge->dropTable('gelombang');
    }
}