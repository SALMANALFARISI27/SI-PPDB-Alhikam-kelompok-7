<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreatePortofolioTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_portofolio' => [
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
            'slug_portofolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'judul_portofolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => null,
                'null'       => true,
            ],
            'isi' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'hits' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'status_portofolio' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'tanggal_post' => [
                'type'    => 'DATETIME',
                'default' => null,
                'null'    => true,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        // Primary key
        $this->forge->addKey('id_portofolio', true);

        // Regular indexes
        $this->forge->addKey('id_admin');

        // Foreign keys
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'portofolio_ibfk_1');

        $this->forge->createTable('portofolio', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('portofolio', 'portofolio_ibfk_1');
        $this->forge->dropTable('portofolio', true);
    }
}
