<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabel: admin
        $this->forge->addField([
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'kode_rahasia' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('admin', true);

        // Tabel: akun
        $this->forge->addField([
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_akun' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_akun' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'kode_akun' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'link_reset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_akun', true);
        $this->forge->createTable('akun', true);

        // Tabel: kategori
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori', true);

        // Tabel: berita
        $this->forge->addField([
            'id_berita' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ringkasan' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'status_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jenis_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal_publish' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori', 'CASCADE', 'CASCADE');
        $this->forge->createTable('berita', true);

        // Tabel: gelombang
        $this->forge->addField([
            'id_gelombang' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tahap' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tahun' => [
                'type' => 'YEAR',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'tanggal_buka' => [
                'type' => 'DATE',
            ],
            'tanggal_tutup' => [
                'type' => 'DATE',
            ],
            'tanggal_pengumuman' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status_gelombang' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_gelombang', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gelombang', true);

        // Tabel: jenjang_pendidikan
        $this->forge->addField([
            'id_jenjang_pendidikan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ringkasan' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'status_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jenis_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal_publish' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_jenjang_pendidikan', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jenjang_pendidikan', true);

        // Tabel: calon_peserta_didik
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
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_jenjang_pendidikan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'agama' => [
                'type' => 'ENUM',
                'constraint' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'],
                'null' => true,
            ],
            'kode_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
            'slug_calon_peserta_didik' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
            ],
            'berkebutuhan_khusus' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak', 'Ya'],
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
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_calon_peserta_didik', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_gelombang', 'gelombang', 'id_gelombang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenjang_pendidikan', 'jenjang_pendidikan', 'id_jenjang_pendidikan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('calon_peserta_didik', true);

        // Tabel: jenis_dokumen
        $this->forge->addField([
            'id_jenis_dokumen' => [
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
            'slug_jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_jenis_dokumen', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'SET NULL');
        $this->forge->createTable('jenis_dokumen', true);

        // Tabel: dokumen
        $this->forge->addField([
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_calon_peserta_didik' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_jenis_dokumen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'kode_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_size' => [
                'type' => 'DECIMAL',
                'constraint' => '4,3',
            ],
            'file_ext' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('id_dokumen', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_calon_peserta_didik', 'calon_peserta_didik', 'id_calon_peserta_didik', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenis_dokumen', 'jenis_dokumen', 'id_jenis_dokumen', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokumen', true);

        // Tabel: kategori_download
        $this->forge->addField([
            'id_kategori_download' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_download' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_download' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_download' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_download', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_download', true);

        // Tabel: download
        $this->forge->addField([
            'id_download' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_download' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'judul_download' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'file_ext' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'file_size' => [
                'type' => 'DECIMAL',
                'constraint' => '4,3',
            ],
            'status_download' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_download', true);
        $this->forge->addForeignKey('id_kategori_download', 'kategori_download', 'id_kategori_download', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('download', true);

        // Tabel: kategori_ekstrakurikuler
        $this->forge->addField([
            'id_kategori_ekstrakurikuler' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_ekstrakurikuler', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_ekstrakurikuler', true);

        // Tabel: ekstrakurikuler
        $this->forge->addField([
            'id_ekstrakurikuler' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_ekstrakurikuler' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'nama_penanggung_jawab' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_ekstrakurikuler' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_ekstrakurikuler', true);
        $this->forge->addForeignKey('id_kategori_ekstrakurikuler', 'kategori_ekstrakurikuler', 'id_kategori_ekstrakurikuler', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler', true);

        // Tabel: kategori_fasilitas
        $this->forge->addField([
            'id_kategori_fasilitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_fasilitas', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_fasilitas', true);

        // Tabel: fasilitas
        $this->forge->addField([
            'id_fasilitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_fasilitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'kode_nomor_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kondisi_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'tanggal_fasilitas' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_fasilitas', true);
        $this->forge->addForeignKey('id_kategori_fasilitas', 'kategori_fasilitas', 'id_kategori_fasilitas', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('fasilitas', true);

        // Tabel: kategori_galeri
        $this->forge->addField([
            'id_kategori_galeri' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_galeri', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_galeri', true);

        // Tabel: galeri
        $this->forge->addField([
            'id_galeri' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_galeri' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'judul_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'jenis_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_galeri', true);
        $this->forge->addForeignKey('id_kategori_galeri', 'kategori_galeri', 'id_kategori_galeri', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('galeri', true);

        // Tabel: kategori_portfolio
        $this->forge->addField([
            'id_kategori_portfolio' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_portfolio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_portfolio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_portfolio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_portfolio', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_portfolio', true);

        // Tabel: portfolio
        $this->forge->addField([
            'id_portfolio' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_portfolio' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'judul_portfolio' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_portfolio' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_portfolio', true);
        $this->forge->addForeignKey('id_kategori_portfolio', 'kategori_portfolio', 'id_kategori_portfolio', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio', true);

        // Tabel: kategori_prestasi
        $this->forge->addField([
            'id_kategori_prestasi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_kategori_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_kategori_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kategori_prestasi', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kategori_prestasi', true);

        // Tabel: prestasi
        $this->forge->addField([
            'id_prestasi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori_prestasi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'penyelenggara' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hadiah_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenjang_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'tanggal_prestasi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hits' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_prestasi', true);
        $this->forge->addForeignKey('id_kategori_prestasi', 'kategori_prestasi', 'id_kategori_prestasi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('prestasi', true);

        // Tabel: kategori_staff
        $this->forge->addField([
            'id_kategori_staff' => [
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
            'slug_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_kategori_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_kategori_staff', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'SET NULL');
        $this->forge->createTable('kategori_staff', true);

        // Tabel: staff
        $this->forge->addField([
            'id_staff' => [
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
            'id_kategori_staff' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P', ''],
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'keahlian' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'status_staff' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_staff', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_kategori_staff', 'kategori_staff', 'id_kategori_staff', 'CASCADE', 'SET NULL');
        $this->forge->createTable('staff', true);

        // Tabel: konfigurasi
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
            ],
            'namaweb' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
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
            ],
            'pesan_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
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
            ],
            'smtp_host' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_port' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'smtp_timeout' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'smtp_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_pass' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_konfigurasi', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('konfigurasi', true);

        // Tabel: link_website
        $this->forge->addField([
            'id_link_website' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_link_website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_link_website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'link_website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'metode_link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_link_website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_link_website', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('link_website', true);

        // Tabel: media
        $this->forge->addField([
            'id_media' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_ext' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'file_size' => [
                'type' => 'DECIMAL',
                'constraint' => '4,3',
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_media', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('media', true);

        // Tabel: video
        $this->forge->addField([
            'id_video' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'slug_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'video' => [
                'type' => 'TEXT',
            ],
            'status_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'posisi_video' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_video', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('video', true);

        // Tabel: yayasan
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
            ],
            'nsp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_yayasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'luas_tanah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'luas_bangunan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_tanah' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'imb' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'nomor_sertifikat' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'nama_yayasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_berdiri' => [
                'type' => 'DATE',
            ],
            'jumlah_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_akreditasi' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_akreditasi' => [
                'type' => 'DATE',
            ],
            'tanggal_kadaluarsa' => [
                'type' => 'DATE',
            ],
            'nomor_izin' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'tanggal_post' => [
                'type' => 'DATETIME',
            ],
            'tanggal_update' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_yayasan', true);
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('yayasan', true);
    }

    public function down()
    {
        // Drop tables in reverse order (children first)
        $this->forge->dropTable('yayasan', true);
        $this->forge->dropTable('video', true);
        $this->forge->dropTable('media', true);
        $this->forge->dropTable('link_website', true);
        $this->forge->dropTable('konfigurasi', true);
        $this->forge->dropTable('staff', true);
        $this->forge->dropTable('kategori_staff', true);
        $this->forge->dropTable('prestasi', true);
        $this->forge->dropTable('kategori_prestasi', true);
        $this->forge->dropTable('portfolio', true);
        $this->forge->dropTable('kategori_portfolio', true);
        $this->forge->dropTable('galeri', true);
        $this->forge->dropTable('kategori_galeri', true);
        $this->forge->dropTable('fasilitas', true);
        $this->forge->dropTable('kategori_fasilitas', true);
        $this->forge->dropTable('ekstrakurikuler', true);
        $this->forge->dropTable('kategori_ekstrakurikuler', true);
        $this->forge->dropTable('download', true);
        $this->forge->dropTable('kategori_download', true);
        $this->forge->dropTable('dokumen', true);
        $this->forge->dropTable('jenis_dokumen', true);
        $this->forge->dropTable('calon_peserta_didik', true);
        $this->forge->dropTable('jenjang_pendidikan', true);
        $this->forge->dropTable('gelombang', true);
        $this->forge->dropTable('berita', true);
        $this->forge->dropTable('kategori', true);
        $this->forge->dropTable('akun', true);
        $this->forge->dropTable('admin', true);
    }
}