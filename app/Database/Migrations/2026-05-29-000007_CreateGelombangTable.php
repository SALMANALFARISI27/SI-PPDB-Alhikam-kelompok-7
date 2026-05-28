<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateGelombangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gelombang' => [
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
            'tahun_ajaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => false,
            ],
            'tahap' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'tahun' => [
                'type'       => 'YEAR',
                'constraint' => 4,
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
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
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'status_gelombang' => [
                'type'       => 'VARCHAR',
                'constraint' => 11,
                'null'       => false,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_gelombang', true);
        $this->forge->addKey('id_admin');

        $this->forge->createTable('gelombang', true, ['ENGINE' => 'MyISAM']);
    }

    public function down()
    {
        $this->forge->dropTable('gelombang', true);
    }
}
