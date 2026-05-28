<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin/dasbor') ?>" class="brand-link">
    <img src="<?php echo $this->website->icon() ?>" alt="<?php echo $this->website->namaweb() ?>"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style="font-size: 11px; line-height: 1.2; display: inline-block; vertical-align: middle; white-space: normal;">
      <?php echo $this->website->namaweb() ?>
    </span>
  </a>

  <style type="text/css" media="screen">
    nav ul li ul li i {
      color: yellow;
      margin-left: 10px;
    }
  </style>
  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if ($this->website->fitur_pendaftaran() == 'On') { ?>

          <!-- berita -->
          <li class="nav-item <?php if ($uri->getSegment(2) == "pendaftar" || $uri->getSegment(2) == "gelombang" || $uri->getSegment(2) == "jenis_dokumen" || ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) == "pendaftaran")) {
            echo 'menu-open';
          } ?>">
            <a href="#" class="nav-link <?php if ($uri->getSegment(2) == "pendaftar" || $uri->getSegment(2) == "gelombang" || $uri->getSegment(2) == "jenis_dokumen" || ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) == "pendaftaran")) {
              echo 'active';
            } ?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>PPDB Online <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo base_url('admin/gelombang') ?>" class="nav-link <?php if ($uri->getSegment(2) == "gelombang") {
                     echo 'active';
                   } ?>">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Periode PPDB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/pendaftaran') ?>" class="nav-link <?php if ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) == "pendaftaran") {
                     echo 'active';
                   } ?>">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Buka/Tutup PPDB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/jenis_dokumen') ?>" class="nav-link <?php if ($uri->getSegment(2) == "jenis_dokumen") {
                     echo 'active';
                   } ?>">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Jenis Dokumen PPDB</p>
                </a>
              </li>
            </ul>
          </li>

        <?php } ?>


        <!-- berita -->
        <li class="nav-item <?php if ($uri->getSegment(2) == "berita" || $uri->getSegment(2) == "kategori_berita_profile") {
          echo 'menu-open';
        } ?>">
          <a href="#" class="nav-link <?php if ($uri->getSegment(2) == "berita" || $uri->getSegment(2) == "kategori_berita_profile") {
            echo 'active';
          } ?>">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Berita &amp; Profile <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/berita') ?>" class="nav-link <?php if ($uri->getSegment(2) == "berita") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Data Berita &amp; Profile</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('admin/kategori_berita_profile') ?>" class="nav-link <?php if ($uri->getSegment(2) == "kategori_berita_profile") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Kategori Berita &amp; Profile</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- galeri -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/galeri') ?>" class="nav-link <?php if ($uri->getSegment(2) == "galeri") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-image"></i>
            <p>Galeri</p>
          </a>
        </li>

        <!-- unduhan -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/unduhan') ?>" class="nav-link <?php if ($uri->getSegment(2) == "unduhan") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-upload"></i>
            <p>Unduhan</p>
          </a>
        </li>

        <!-- PRESTASI -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/prestasi') ?>" class="nav-link <?php if ($uri->getSegment(2) == "prestasi") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-certificate"></i>
            <p>Prestasi</p>
          </a>
        </li>

        <!-- PORTOFOLIO -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/portofolio') ?>" class="nav-link <?php if ($uri->getSegment(2) == "portofolio") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Portofolio</p>
          </a>
        </li>

        <!-- Fasilitas -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/fasilitas') ?>" class="nav-link <?php if ($uri->getSegment(2) == "fasilitas") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Fasilitas</p>
          </a>
        </li>

        <!-- EKSTRAKULIKULER -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/ekstrakurikuler') ?>" class="nav-link <?php if ($uri->getSegment(2) == "ekstrakurikuler") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-futbol"></i>
            <p>Ekstrakurikuler</p>
          </a>
        </li>

        <!-- jenjang_pendidikan -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/jenjang_pendidikan') ?>" class="nav-link <?php if ($uri->getSegment(2) == "jenjang_pendidikan") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-chair"></i>
            <p>Jenjang Pendidikan</p>
          </a>
        </li>

        <!-- Staff -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/staff') ?>" class="nav-link <?php if ($uri->getSegment(2) == "staff") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Staff</p>
          </a>
        </li>

        <!-- tautan -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/tautan') ?>" class="nav-link <?php if ($uri->getSegment(2) == "tautan") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>Tautan</p>
          </a>
        </li>

        <!-- admin -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/admin') ?>" class="nav-link <?php if ($uri->getSegment(2) == "admin") {
               echo 'active';
             } ?>">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>Admin</p>
          </a>
        </li>

        <!-- konfigurasi -->
        <li class="nav-item <?php if ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) != "pendaftaran") {
          echo 'menu-open';
        } ?>">
          <a href="#" class="nav-link <?php if ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) != "pendaftaran") {
            echo 'active';
          } ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>Setting Aplikasi <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link <?php if ($uri->getSegment(2) == "konfigurasi" && $uri->getSegment(3) == "") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Setting Aplikasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/email') ?>" class="nav-link <?php if ($uri->getSegment(3) == "email") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Setting Email</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/banner') ?>" class="nav-link <?php if ($uri->getSegment(3) == "banner") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>About Us &amp; Banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link <?php if ($uri->getSegment(3) == "logo") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Ganti Logo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link <?php if ($uri->getSegment(3) == "icon") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Ganti Icon</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/konfigurasi/login') ?>" class="nav-link <?php if ($uri->getSegment(3) == "login") {
                   echo 'active';
                 } ?>">
                <i class="fa fa-arrow-right nav-icon"></i>
                <p>Background Login</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <br><br><br>
      <br><br><br>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><?php echo $title ?></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-body pt-4" style="min-height: 400px;">

              <?php
              $validation = \Config\Services::validation();
              $errors = $validation->getErrors();
              if (!empty($errors)) {
                echo '<span class="text-danger">' . $validation->listErrors() . '</span>';
              }
              ?>

              <?= session()->getFlashdata('error') ?>
              <?= validation_list_errors() ?>

              <?php if (session('msg')): ?>
                <div class="alert alert-info alert-dismissible">
                  <?= session('msg') ?>
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                </div>
              <?php endif ?>