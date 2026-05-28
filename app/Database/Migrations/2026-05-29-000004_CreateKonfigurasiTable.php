<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateKonfigurasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konfigurasi' => [
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
            'namaweb' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'singkatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tagline' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => null,
                'null'       => true,
            ],
            'tentang' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'deskripsi' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'email_cadangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'alamat' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => null,
                'null'       => true,
            ],
            'whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => 24,
                'null'       => false,
            ],
            'pesan_whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],
            'hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => null,
                'null'       => true,
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'youtube' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tiktok' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_youtube' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_tiktok' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'google_map' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'protocol' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'smtp_host' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'smtp_port' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'smtp_timeout' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'smtp_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'smtp_pass' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'paginasi_depan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'banner' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'ringkasan' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'fitur_pendaftaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'mulai_pendaftaran' => [
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'selesai_pendaftaran' => [
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'pengumuman_pendaftaran' => [
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'keterangan_pendaftaran' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'login' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id_konfigurasi', true);
        $this->forge->addKey('id_admin');

        $this->forge->createTable('konfigurasi', true, ['ENGINE' => 'MyISAM']);
    }

    public function down()
    {
        $this->forge->dropTable('konfigurasi', true);
    }
}
