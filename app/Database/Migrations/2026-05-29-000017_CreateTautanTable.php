<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTautanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tautan' => [
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
            'slug_tautan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'nama_tautan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'keterangan' => [
                'type'    => 'TEXT',
                'null'    => true,
                'default' => null,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'default'    => null,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
            'link_tautan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'metode_tautan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
            'status_tautan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'tanggal_post' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_tautan', true);
        $this->forge->addKey('id_admin');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'tautan_ibfk_1');
        $this->forge->createTable('tautan', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('tautan', 'tautan_ibfk_1');
        $this->forge->dropTable('tautan', true);
    }
}
