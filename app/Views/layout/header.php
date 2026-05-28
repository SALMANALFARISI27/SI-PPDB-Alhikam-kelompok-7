<?php
use App\Models\Berita_model;
use App\Models\Jenjang_pendidikan_model;
use App\Models\Fasilitas_model;
use App\Models\Tautan_model;
use App\Models\Konfigurasi_model;
use App\Libraries\Website;
$this->website = new Website();
$m_berita = new Berita_model();
$m_jenjang = new Jenjang_pendidikan_model();
$m_fasilitas = new Fasilitas_model();
$m_tautan = new Tautan_model();
$m_site = new Konfigurasi_model();
$site_setting = $m_site->listing();
$nav_profile = $m_berita->nav_profile('Profile');
$nav_berita = $m_berita->nav_berita();
$nav_portofolio = [];
$nav_prestasi = [];
$nav_ekstrakurikuler = [];
$nav_fasilitas = $m_fasilitas->nav_fasilitas();
$nav_tautan = $m_tautan->nav_tautan('Publish');
$nav_unduhan = [];
$nav_jenjang_pendidikan = $m_jenjang->nav_jenjang();
?>
<div class="content-wrapper">
  <header class="wrapper bg-light">
    <div class="bg-haqi text-white fw-bold fs-14 mb-0">
      <div class="container py-1 d-flex flex-column flex-md-row align-items-start align-items-md-center">
        <div class="d-flex flex-row align-items-center mb-2 mb-md-0">
          <div class="icon text-white fs-14 mt-1 me-2"> <i class="uil uil-check-circle"></i></div>
          <address class="mb-0"><?php echo word_limiter(strip_tags($site_setting->namaweb), 5) ?></address>
        </div>
        <?php if ($site_setting->fitur_pendaftaran == 'On') { ?>
          <div class="d-flex flex-row align-items-center me-md-6 ms-md-auto mb-2 mb-md-0">
            <p class="mb-0">
              <a href="<?php echo base_url('check') ?>" class="text-white hover">
                <i class="fa fa-user-check"></i> Cek Status Pendaftaran
              </a>
            </p>
          </div>

          <?php if (Session()->get('username_calon_peserta_didik') != '') { ?>
            <div class="d-flex flex-row align-items-center me-md-6 mb-2 mb-md-0">
              <p class="mb-0">
                <a href="<?php echo base_url('registrasi') ?>" class="text-white hover">
                  <i class="fa fa-edit"></i> Pendaftaran Online
                </a>
              </p>
            </div>

            <div class="d-flex flex-row align-items-center me-md-6 mb-2 mb-md-0">
              <p class="mb-0">
                <a href="<?php echo base_url('calon_peserta_didik/dasbor') ?>" class="text-white hover">
                  <i class="fa fa-tachometer-alt"></i> Dashboard
                </a>
              </p>
            </div>

            <div class="d-flex flex-row align-items-center me-md-6 mb-2 mb-md-0">
              <p class="mb-0">
                <a href="<?php echo base_url('signin/logout') ?>" class="text-white hover">
                  <i class="fa fa-sign-out-alt"></i>
                </a>
              </p>
            </div>

          <?php } else { ?>

            <div class="d-flex flex-row align-items-center me-md-6 mb-2 mb-md-0">
              <p class="mb-0">
                <a href="<?php echo base_url('registrasi') ?>" class="text-white hover">
                  <i class="fa fa-edit"></i> Pendaftaran Online
                </a>
              </p>
            </div>

            <div class="d-flex flex-row align-items-center mb-2 mb-md-0">
              <p class="mb-0">
                <a href="<?php echo base_url('signin') ?>" class="text-white hover">
                  <i class="fa fa-lock"></i> Login
                </a>
              </p>
            </div>



          <?php } ?>
        <?php } else { ?>
          <div class="d-flex flex-row align-items-center me-md-6 ms-md-auto mb-2 mb-md-0">
            <p class="mb-0">
              <a href="mailto:<?php echo $site_setting->email ?>" class="text-white hover">
                <i class="fa fa-envelope"></i> <?php echo $site_setting->email ?>
              </a>
            </p>
          </div>
        <?php } ?>
      </div>
      <!-- /.container -->
    </div>
    <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
      <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand w-100">
          <a href="<?php echo base_url() ?>">
            <img src="<?php echo $this->website->logo() ?>" srcset="<?php echo $this->website->logo() ?>"
              alt="<?php echo $this->website->namaweb() ?>"
              style="max-width: 100%; max-height: 50px; width: auto; height: auto;" />
          </a>
        </div>
        <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
          <div class="offcanvas-header d-lg-none">
            <h3 class="text-white fs-30 mb-0"><?php echo $this->website->namaweb() ?></h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
            <ul class="navbar-nav">

              <?php if (($site_setting->menu_home ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" href="<?php echo base_url() ?>">Beranda</a>
                </li>
              <?php }
              if (($site_setting->menu_berita ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Berita</a>
                  <ul class="dropdown-menu bg-dark">
                    <?php foreach ($nav_berita as $nav_berita) { ?>
                      <li class="nav-item"><a class="dropdown-item text-white"
                          href="<?php echo base_url('berita/kategori/' . $nav_berita->slug_kategori) ?>"><?php echo $nav_berita->nama_kategori ?></a>
                      </li>
                    <?php } ?>
                    <li class="nav-item"><a class="dropdown-item text-warning"
                        href="<?php echo base_url('berita') ?>">Semua Berita</a></li>

                  </ul>
                </li>
              <?php }
              if (($site_setting->menu_profile ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Profile</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark">
                    <li class="mega-menu-content">
                      <div class="row gx-0 gx-lg-3">
                        <div class="col-lg-6">
                          <h6 class="dropdown-header text-warning text-uppercase">Profile & Staff</h6>
                          <ul class="list-unstyled">
                            <?php foreach ($nav_profile as $nav_profile) { ?>
                              <li>
                                <a class="dropdown-item text-white"
                                  href="<?php echo base_url('berita/profile/' . $nav_profile->slug_berita) ?>">
                                  <?php echo $nav_profile->judul_berita ?>
                                </a>
                              </li>
                            <?php } ?>
                            <li>
                              <a class="dropdown-item text-white" href="<?php echo base_url('staff') ?>">
                                STAFF <?php echo $this->website->namaweb() ?>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!--/column -->
                        <div class="col-lg-6">
                          <h6 class="dropdown-header text-warning text-uppercase">Informasi Lainnya</h6>
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item text-white text-uppercase"
                                href="<?php echo base_url('portofolio') ?>">Portofolio</a></li>
                            <li><a class="dropdown-item text-white text-uppercase"
                                href="<?php echo base_url('ekstrakurikuler') ?>">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item text-white text-uppercase"
                                href="<?php echo base_url('prestasi') ?>">Prestasi</a></li>
                            <li><a class="dropdown-item text-white text-uppercase"
                                href="<?php echo base_url('fasilitas') ?>">Fasilitas</a></li>
                          </ul>
                        </div>
                        <!--/column -->
                      </div>
                      <!--/.row -->
                    </li>
                    <!--/.mega-menu-content-->
                  </ul>
                  <!--/.dropdown-menu -->
                </li>
              <?php }
              if (($site_setting->menu_galeri ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
                  <ul class="dropdown-menu bg-dark">
                    <li class="nav-item"><a class="dropdown-item text-white"
                        href="<?php echo base_url('galeri') ?>">Galeri Foto</a></li>
                    <li class="nav-item"><a class="dropdown-item text-white"
                        href="<?php echo base_url('galeri/video') ?>">Galeri Video</a></li>
                  </ul>
                </li>

              <?php }
              if (($site_setting->menu_unduhan ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" href="<?php echo base_url('unduhan') ?>">Unduhan</a>
                </li>

              <?php }
              if (($site_setting->menu_jenjang ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" href="<?php echo base_url('jenjang_pendidikan') ?>">Jenjang</a>
                </li>

              <?php }
              if (($site_setting->menu_tautan ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Tautan</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark mega-menu-img">
                    <li class="mega-menu-content">
                      <ul class="row row-cols-1 row-cols-lg-6 gx-0 gx-lg-6 gy-lg-4 list-unstyled">
                        <?php foreach ($nav_tautan as $nav_tautan) { ?>
                          <li class="col"><a class="dropdown-item" href="<?php echo $nav_tautan->link_tautan ?>"
                              target="<?php echo $nav_tautan->metode_tautan ?>">
                              <div class="rounded img-svg d-none d-lg-block p-0 mb-lg-2">
                                <img class="img img-thumbnail bg-light rounded"
                                  src="<?php echo base_url('assets/upload/image/thumbs/' . $nav_tautan->gambar) ?>"
                                  alt="<?php echo $nav_tautan->nama_tautan ?>">
                              </div>
                              <span><?php echo $nav_tautan->nama_tautan ?>
                              </span>
                            </a>
                          </li>
                        <?php } ?>

                      </ul>
                      <!--/.row -->
                    </li>
                    <!--/.mega-menu-content-->
                  </ul>
                  <!--/.dropdown-menu -->
                </li>
              <?php } ?>
              <?php if (($site_setting->menu_kontak ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" href="<?php echo base_url('kontak') ?>">Kontak</a>
                </li>
              <?php } ?>
            </ul>
            <!-- /.navbar-nav -->
            <div class="offcanvas-footer d-lg-none mt-auto pt-6">
              <div>
                <a href="mailto:<?php echo $site_setting->email ?>"
                  class="link-inverse"><?php echo $site_setting->email ?></a>
                <br /> <?php echo $site_setting->telepon ?> <br />
                <nav class="nav social social-white mt-4">
                  <a href="<?php echo $site_setting->facebook ?>"><i class="uil uil-facebook-f"></i></a>
                  <a href="<?php echo $site_setting->instagram ?>"><i class="uil uil-instagram"></i></a>
                  <a href="<?php echo $site_setting->youtube ?>"><i class="uil uil-youtube"></i></a>
                </nav>
                <!-- /.social -->
              </div>
            </div>
            <!-- /.offcanvas-footer -->
          </div>
          <!-- /.offcanvas-body -->
        </div>
        <!-- /.navbar-collapse -->

        <div class="navbar-other w-100 d-flex ms-auto">
          <ul class="navbar-nav flex-row align-items-center ms-auto">



            <li class="nav-item d-lg-none">
              <button class="hamburger offcanvas-nav-btn"><span></span></button>
            </li>
          </ul>
          <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->

      </div>
      <!-- /.container -->
    </nav>
    <!-- /.navbar -->
  </header>
  <!-- /header -->