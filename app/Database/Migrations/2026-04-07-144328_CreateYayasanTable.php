<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateYayasanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_yayasan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'nsp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'status_yayasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => false,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'luas_tanah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'luas_bangunan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'status_tanah' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
            ],
            'imb' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
            ],
            'nomor_sertifikat' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
            ],
            'nama_yayasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'tanggal_berdiri' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'jumlah_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'nilai_akreditasi' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'tanggal_akreditasi' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_kadaluarsa' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'nomor_izin' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tanggal_update' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_yayasan', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('yayasan');
    }

    public function down()
    {
        $this->forge->dropTable('yayasan');
    }
}