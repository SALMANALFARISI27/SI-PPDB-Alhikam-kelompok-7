<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCalonPesertaDidikTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_calon_peserta_didik' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_gelombang' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'id_jenjang_pendidikan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'agama' => [
                'type' => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'null' => true,
            ],
            'kode_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => false,
            ],
            'slug_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'nis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_wn' => [
                'type' => 'ENUM',
                'constraint' => ['WNI', 'WNA'],
                'null' => false,
                'default' => 'WNI',
            ],
            'negara_asal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan', 'L', 'P'],
                'null' => false,
            ],
            'berkebutuhan_khusus' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak', 'Ya'],
                'null' => false,
                'default' => 'Tidak',
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'agama_ayah' => [
                'type' => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'null' => true,
            ],
            'jenjang_ayah' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'null' => true,
            ],
            'pekerjaan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'alamat_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'telepon_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'agama_ibu' => [
                'type' => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'null' => true,
            ],
            'jenjang_ibu' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'null' => true,
            ],
            'pekerjaan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'alamat_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'telepon_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'agama_wali' => [
                'type' => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'null' => true,
            ],
            'jenjang_wali' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'null' => true,
            ],
            'pekerjaan_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'alamat_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'telepon_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'identitas_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'goldar_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hobi_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'penyakit_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tinggi' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'berat' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'jenis_calon_peserta_didik' => [
                'type' => 'ENUM',
                'constraint' => ['Langsung', 'Pindahan', 'Lainnya'],
                'null' => false,
                'default' => 'Langsung',
            ],
            'asal_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat_sekolah_asal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_pindah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'jumlah_saudara' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_pendaftaran' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_calon_peserta_didik', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gelombang', 'gelombang', 'id_gelombang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenjang_pendidikan', 'jenjang_pendidikan', 'id_jenjang_pendidikan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('calon_peserta_didik');
    }

    public function down()
    {
        $this->forge->dropTable('calon_peserta_didik');
    }
}