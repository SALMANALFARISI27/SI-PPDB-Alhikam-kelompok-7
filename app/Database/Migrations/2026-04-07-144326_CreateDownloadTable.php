<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDownloadTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_download' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_download' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'judul_download' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'file_ext' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'file_size' => [
                'type' => 'DECIMAL',
                'constraint' => '4,3',
                'null' => false,
            ],
            'status_download' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_download', true);
        $this->forge->addForeignKey('id_kategori_download', 'kategori_download', 'id_kategori_download', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('download');
    }

    public function down()
    {
        $this->forge->dropTable('download');
    }
}