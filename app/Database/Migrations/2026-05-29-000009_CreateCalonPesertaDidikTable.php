<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateCalonPesertaDidikTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_calon_peserta_didik' => [
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
            'id_gelombang' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'id_akun' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'id_jenjang_pendidikan' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 11,
                'null'       => false,
            ],
            'agama' => [
                'type'       => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'default'    => null,
                'null'       => true,
            ],
            'kode_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 8,
                'null'       => false,
            ],
            'slug_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'nis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'status_wn' => [
                'type'       => 'ENUM',
                'constraint' => ['WNI', 'WNA'],
                'default'    => 'WNI',
                'null'       => false,
            ],
            'negara_asal' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tanggal_lahir' => [
                'type'    => 'DATE',
                'default' => null,
                'null'    => true,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'default'    => null,
                'null'       => true,
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'kode_pos' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => null,
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
                'null'       => false,
            ],
            'berkebutuhan_khusus' => [
                'type'       => 'ENUM',
                'constraint' => ['Tidak', 'Ya'],
                'default'    => 'Tidak',
                'null'       => false,
            ],
            'isi' => [
                'type'    => 'TEXT',
                'default' => null,
                'null'    => true,
            ],
            'nama_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'agama_ayah' => [
                'type'       => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'default'    => null,
                'null'       => true,
            ],
            'jenjang_ayah' => [
                'type'       => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'default'    => null,
                'null'       => true,
            ],
            'pekerjaan_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => null,
                'null'       => true,
            ],
            'alamat_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'telepon_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'agama_ibu' => [
                'type'       => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'default'    => null,
                'null'       => true,
            ],
            'jenjang_ibu' => [
                'type'       => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'default'    => null,
                'null'       => true,
            ],
            'pekerjaan_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => null,
                'null'       => true,
            ],
            'alamat_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'telepon_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'nama_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'agama_wali' => [
                'type'       => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'default'    => null,
                'null'       => true,
            ],
            'jenjang_wali' => [
                'type'       => 'ENUM',
                'constraint' => ['Tidak Sekolah', 'SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
                'default'    => null,
                'null'       => true,
            ],
            'pekerjaan_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => null,
                'null'       => true,
            ],
            'alamat_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'telepon_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'identitas_wali' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'goldar_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'hobi_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'penyakit_calon_peserta_didik' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tinggi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'berat' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'jenis_calon_peserta_didik' => [
                'type'       => 'ENUM',
                'constraint' => ['Langsung', 'Pindahan', 'Lainnya'],
                'default'    => 'Langsung',
                'null'       => false,
            ],
            'asal_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'alamat_sekolah_asal' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'tanggal_pindah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
                'null'       => true,
            ],
            'anak_ke' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'jumlah_saudara' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => null,
                'null'       => true,
            ],
            'status_pendaftaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => false,
            ],
            'tanggal' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        // Primary key
        $this->forge->addKey('id_calon_peserta_didik', true);

        // Regular indexes
        $this->forge->addKey('id_admin');
        $this->forge->addKey('id_gelombang');
        $this->forge->addKey('id_akun');
        $this->forge->addKey('id_jenjang_pendidikan');

        // Foreign keys
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', '', '', 'calon_peserta_didik_ibfk_1');
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', '', '', 'calon_peserta_didik_ibfk_2');
        $this->forge->addForeignKey('id_jenjang_pendidikan', 'jenjang_pendidikan', 'id_jenjang_pendidikan', '', '', 'calon_peserta_didik_ibfk_3');

        $this->forge->createTable('calon_peserta_didik', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropForeignKey('calon_peserta_didik', 'calon_peserta_didik_ibfk_1');
        $this->forge->dropForeignKey('calon_peserta_didik', 'calon_peserta_didik_ibfk_2');
        $this->forge->dropForeignKey('calon_peserta_didik', 'calon_peserta_didik_ibfk_3');
        $this->forge->dropTable('calon_peserta_didik', true);
    }
}
