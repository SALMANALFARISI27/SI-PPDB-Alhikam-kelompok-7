<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateGaleriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_galeri' => [
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
            'slug_galeri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul_galeri' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => null,
                'null'       => true,
            ],
            'jenis_galeri' => [
                'type'       => 'ENUM',
                'constraint' => ['Foto', 'Video'],
                'null'       => false,
                'default'    => 'Foto',
            ],
            'isi' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'url_video' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'status_galeri' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
                'default'    => 'Publish',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'hits' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
                'null'       => true,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_galeri', true);
        $this->forge->addKey('id_admin');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'galeri_ibfk_1');
        $this->forge->createTable('galeri', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('galeri', 'galeri_ibfk_1');
        $this->forge->dropTable('galeri', true);
    }
}
