<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateFasilitasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fasilitas' => [
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
            'slug_fasilitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul_fasilitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => null,
                'null'       => true,
            ],
            'kode_nomor_fasilitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'kondisi_fasilitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => null,
                'null'       => true,
            ],
            'tanggal_fasilitas' => [
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'isi' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
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
                'default'    => null,
                'null'       => true,
            ],
            'status_fasilitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => null,
                'null'       => true,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_fasilitas', true);
        $this->forge->addKey('id_admin');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'fasilitas_ibfk_1');
        $this->forge->createTable('fasilitas', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('fasilitas', 'fasilitas_ibfk_1');
        $this->forge->dropTable('fasilitas', true);
    }
}
