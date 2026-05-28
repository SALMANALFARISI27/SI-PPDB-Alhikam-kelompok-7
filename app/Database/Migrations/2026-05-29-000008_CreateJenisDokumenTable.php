<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisDokumenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_dokumen' => [
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
                'default'    => null,
                'null'       => true,
            ],
            'slug_jenis_dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'nama_jenis_dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'keterangan' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'status_jenis_dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_jenis_dokumen', true);
        $this->forge->addKey('id_admin');

        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'jenis_dokumen_ibfk_1');

        $this->forge->createTable('jenis_dokumen', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('jenis_dokumen', 'jenis_dokumen_ibfk_1');
        $this->forge->dropTable('jenis_dokumen', true);
    }
}
