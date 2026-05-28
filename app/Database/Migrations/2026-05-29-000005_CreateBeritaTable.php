<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
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
            'id_kategori_berita_profile' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'slug_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'ringkasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'status_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'jenis_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'hits' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
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
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_berita', true);
        $this->forge->addKey('id_admin');
        $this->forge->addKey('id_kategori_berita_profile');

        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'berita_ibfk_1');
        $this->forge->addForeignKey('id_kategori_berita_profile', 'kategori_berita_profile', 'id_kategori_berita_profile', '', '', 'berita_ibfk_2');

        $this->forge->createTable('berita', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('berita', 'berita_ibfk_1');
        $this->forge->dropForeignKey('berita', 'berita_ibfk_2');
        $this->forge->dropTable('berita', true);
    }
}
