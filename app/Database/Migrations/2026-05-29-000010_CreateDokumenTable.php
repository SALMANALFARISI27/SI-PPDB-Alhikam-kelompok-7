<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokumenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_akun' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'id_calon_peserta_didik' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'id_jenis_dokumen' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'kode_dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
                'null'       => false,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'file_size' => [
                'type'       => 'DECIMAL',
                'constraint' => '4,3',
                'null'       => false,
            ],
            'file_ext' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_dokumen', true);
        $this->forge->addKey(['id_akun', 'id_calon_peserta_didik']);
        $this->forge->addKey('id_calon_peserta_didik');
        $this->forge->addKey('id_jenis_dokumen');

        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', '', '', 'dokumen_ibfk_1');
        $this->forge->addForeignKey('id_jenis_dokumen', 'jenis_dokumen', 'id_jenis_dokumen', '', '', 'dokumen_ibfk_2');
        $this->forge->addForeignKey('id_calon_peserta_didik', 'calon_peserta_didik', 'id_calon_peserta_didik', '', '', 'dokumen_ibfk_3');

        $this->forge->createTable('dokumen', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('dokumen', 'dokumen_ibfk_1');
        $this->forge->dropForeignKey('dokumen', 'dokumen_ibfk_2');
        $this->forge->dropForeignKey('dokumen', 'dokumen_ibfk_3');
        $this->forge->dropTable('dokumen', true);
    }
}
