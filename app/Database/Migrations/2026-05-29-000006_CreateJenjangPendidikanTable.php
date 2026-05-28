<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateJenjangPendidikanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenjang_pendidikan' => [
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
            'slug_jenjang_pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul_jenjang_pendidikan' => [
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
            'status_jenjang_pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'jenis_jenjang_pendidikan' => [
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

        $this->forge->addKey('id_jenjang_pendidikan', true);
        $this->forge->addKey('id_admin');

        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'jenjang_pendidikan_ibfk_1');

        $this->forge->createTable('jenjang_pendidikan', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('jenjang_pendidikan', 'jenjang_pendidikan_ibfk_1');
        $this->forge->dropTable('jenjang_pendidikan', true);
    }
}
