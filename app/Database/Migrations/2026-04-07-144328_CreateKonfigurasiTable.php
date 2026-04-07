<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKonfigurasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konfigurasi' => [
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
            'namaweb' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'singkatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tagline' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'tentang' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_cadangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 24,
                'null' => false,
            ],
            'pesan_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'hp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'youtube' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tiktok' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_youtube' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_tiktok' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'google_map' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'protocol' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'smtp_host' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'smtp_port' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'smtp_timeout' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'smtp_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'smtp_pass' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'paginasi_depan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'banner' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ringkasan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'fitur_pendaftaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'mulai_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'selesai_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'pengumuman_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'keterangan_pendaftaran' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'login' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_konfigurasi', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('konfigurasi');
    }

    public function down()
    {
        $this->forge->dropTable('konfigurasi');
    }
}