<?php
use App\Models\Nav_model;
use App\Models\Konfigurasi_model;
use App\Libraries\Website;
$this->website = new Website();
$m_nav = new Nav_model();
$m_site = new Konfigurasi_model();
$site_setting = $m_site->listing();
$nav_profil = $m_nav->profil('Profil');

$nav_berita = $m_nav->berita();
$nav_portfolio = $m_nav->portfolio();
$nav_prestasi = $m_nav->prestasi();
$nav_ekstrakurikuler = $m_nav->ekstrakurikuler();
$nav_fasilitas = $m_nav->fasilitas();
$nav_link_website = $m_nav->link_website('Publish');
$nav_download = $m_nav->download();
$nav_jenjang_pendidikan = $m_nav->jenjang_pendidikan();
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
                <a href="<?php echo base_url('pendaftaran') ?>" class="text-white hover">
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
                <a href="<?php echo base_url('pendaftaran') ?>" class="text-white hover">
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
              if (($site_setting->menu_profil ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark">
                    <li class="mega-menu-content">
                      <div class="row gx-0 gx-lg-3">
                        <div class="col-lg-4">
                          <h6 class="dropdown-header text-warning">Profil, Staff</h6>
                          <ul class="list-unstyled pb-lg-1">
                            <?php foreach ($nav_profil as $nav_profil) { ?>
                              <li><a class="dropdown-item"
                                  href="<?php echo base_url('berita/profil/' . $nav_profil->slug_berita) ?>"><?php echo $nav_profil->judul_berita ?></a>
                              </li>
                            <?php } ?>
                            <li><a class="dropdown-item" href="<?php echo base_url('staff') ?>">STAFF
                                <?php echo $this->website->namaweb() ?></a></li>
                          </ul>
                        </div>
                        <!--/column -->

                        <div class="col-lg-4">
                          <h6 class="dropdown-header text-warning">Portofolio</h6>
                          <ul class="list-unstyled">
                            <?php foreach ($nav_portfolio as $nav_portfolio) { ?>
                              <li><a class="dropdown-item"
                                  href="<?php echo base_url('portfolio/kategori/' . $nav_portfolio->slug_kategori_portfolio) ?>"><?php echo $nav_portfolio->nama_kategori_portfolio ?></a>
                              </li>
                            <?php } ?>
                            <li><a class="dropdown-item text-warning" href="<?php echo base_url('portfolio') ?>">Semua
                                Portofolio</a></li>
                          </ul>

                          <h6 class="dropdown-header mt-lg-6 text-warning">Ekstrakurikuler</h6>
                          <ul class="list-unstyled">
                            <?php foreach ($nav_ekstrakurikuler as $nav_ekstrakurikuler) { ?>
                              <li><a class="dropdown-item"
                                  href="<?php echo base_url('ekstrakurikuler/kategori/' . $nav_ekstrakurikuler->slug_kategori_ekstrakurikuler) ?>"><?php echo $nav_ekstrakurikuler->nama_kategori_ekstrakurikuler ?></a>
                              </li>
                            <?php } ?>
                            <li><a class="dropdown-item text-warning"
                                href="<?php echo base_url('ekstrakurikuler') ?>">Semua Ekstrakurikuler</a></li>
                          </ul>
                        </div>
                        <!--/column -->
                        <div class="col-lg-4">
                          <h6 class="dropdown-header text-warning">Fasilitas</h6>
                          <ul class="list-unstyled">
                            <?php foreach ($nav_fasilitas as $nav_fasilitas) { ?>
                              <li><a class="dropdown-item"
                                  href="<?php echo base_url('fasilitas/detail/' . $nav_fasilitas->slug_fasilitas) ?>"><?php echo $nav_fasilitas->judul_fasilitas ?></a>
                              </li>
                            <?php } ?>
                            <li><a class="dropdown-item text-warning" href="<?php echo base_url('fasilitas') ?>">Semua
                                Fasilitas</a></li>
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
              if (($site_setting->menu_prestasi ?? 'Publish') == 'Publish') { ?>

                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Prestasi</a>
                  <ul class="dropdown-menu bg-dark">
                    <?php foreach ($nav_prestasi as $nav_prestasi) { ?>
                      <li><a class="dropdown-item text-white"
                          href="<?php echo base_url('prestasi/kategori/' . $nav_prestasi->slug_kategori_prestasi) ?>"><?php echo $nav_prestasi->nama_kategori_prestasi ?></a>
                      </li>
                    <?php } ?>
                    <li><a class="dropdown-item text-warning" href="<?php echo base_url('prestasi') ?>">Semua Prestasi</a>
                    </li>
                  </ul>
                </li>


              <?php }
              if (($site_setting->menu_galeri ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
                  <ul class="dropdown-menu bg-dark">

                    <li class="nav-item"><a class="dropdown-item text-white"
                        href="<?php echo base_url('galeri') ?>">Galeri Gambar</a></li>
                    <li class="nav-item"><a class="dropdown-item text-white" href="<?php echo base_url('video') ?>">Galeri
                        Video</a></li>

                  </ul>
                </li>
              <?php }
              if (($site_setting->menu_unduhan ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Unduhan</a>
                  <ul class="dropdown-menu bg-dark">

                    <?php foreach ($nav_download as $nav_download) { ?>
                      <li><a class="dropdown-item text-white"
                          href="<?php echo base_url('download/kategori/' . $nav_download->slug_kategori_download) ?>"><?php echo $nav_download->nama_kategori_download ?></a>
                      </li>
                    <?php } ?>
                    <li><a class="dropdown-item text-warning" href="<?php echo base_url('download') ?>">Semua Unduhan</a>
                    </li>

                  </ul>
                </li>
              <?php }
              if (($site_setting->menu_jenjang ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Jenjang</a>
                  <ul class="dropdown-menu bg-dark">

                    <?php foreach ($nav_jenjang_pendidikan as $nav_jenjang_pendidikan) { ?>
                      <li><a class="dropdown-item text-white"
                          href="<?php echo base_url('jenjang_pendidikan/read/' . $nav_jenjang_pendidikan->slug_jenjang_pendidikan) ?>"><?php echo $nav_jenjang_pendidikan->judul_jenjang_pendidikan ?></a>
                      </li>
                    <?php } ?>
                    <li><a class="dropdown-item text-warning" href="<?php echo base_url('jenjang_pendidikan') ?>">Semua
                        Jenjang</a></li>

                  </ul>
                </li>
              <?php }
              if (($site_setting->menu_tautan ?? 'Publish') == 'Publish') { ?>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link text-uppercase dropdown-toggle" href="#" data-bs-toggle="dropdown">Tautan</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark mega-menu-img">
                    <li class="mega-menu-content">
                      <ul class="row row-cols-1 row-cols-lg-6 gx-0 gx-lg-6 gy-lg-4 list-unstyled">
                        <?php foreach ($nav_link_website as $nav_link_website) { ?>
                          <li class="col"><a class="dropdown-item" href="<?php echo $nav_link_website->link_website ?>"
                              target="<?php echo $nav_link_website->metode_link ?>">
                              <div class="rounded img-svg d-none d-lg-block p-0 mb-lg-2">
                                <img class="img img-thumbnail bg-light rounded"
                                  src="<?php echo base_url('assets/upload/image/thumbs/' . $nav_link_website->gambar) ?>"
                                  alt="<?php echo $nav_link_website->nama_link_website ?>">
                              </div>
                              <span><?php echo $nav_link_website->nama_link_website ?>
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