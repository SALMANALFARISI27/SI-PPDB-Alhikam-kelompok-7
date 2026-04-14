<section class="wrapper bg-soft-primary  bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-10 col-xl-5 mx-auto">
        <h1 class="display-1 mb-1 text-warning"><?php echo $title ?></h1>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="blog classic-view mt-n17 row justify-content-center">
          <?php foreach ($jenjang_pendidikan as $jenjang_pendidikan) { ?>
            <div class="col-md-6 col-lg-4 mb-8">
              <article class="post">
                <div class="card shadow-lg h-100 overflow-hidden">
                  <figure class="card-img-top overlay overlay-1 hover-scale">
                    <a
                      href="<?php echo base_url('jenjang_pendidikan/read/' . $jenjang_pendidikan->id_jenjang_pendidikan) ?>">
                      <?php if ($jenjang_pendidikan->gambar != '') {
                        $imgPublic = FCPATH . 'assets/upload/image/' . $jenjang_pendidikan->gambar;
                        $imgRoot = ROOTPATH . 'assets/upload/image/' . $jenjang_pendidikan->gambar;
                        if (file_exists($imgPublic)) {
                          $imgUrl = base_url('assets/upload/image/' . $jenjang_pendidikan->gambar);
                        } elseif (file_exists($imgRoot)) {
                          if (!is_dir(FCPATH . 'assets/upload/image/')) {
                            mkdir(FCPATH . 'assets/upload/image/', 0777, true);
                          }
                          copy($imgRoot, $imgPublic);
                          $imgUrl = base_url('assets/upload/image/' . $jenjang_pendidikan->gambar);
                        } else {
                          $imgUrl = base_url('assets/images/placeholder.jpg');
                        }
                        if ($imgUrl) { ?>
                          <img src="<?php echo $imgUrl ?>" alt="<?php echo $jenjang_pendidikan->judul_jenjang_pendidikan ?>"
                            class="img-fluid" style="height: 220px; width: 100%; object-fit: cover;">
                        <?php }
                      } ?>
                    </a>
                    <figcaption>
                      <h5 class="from-top mb-0">Baca detail...</h5>
                    </figcaption>
                  </figure>
                  <div class="card-body p-5 p-md-6">
                    <div class="post-header mb-3">
                      <h2 class="post-title h3 mt-1 mb-0">
                        <a class="link-dark"
                          href="<?php echo base_url('jenjang_pendidikan/read/' . $jenjang_pendidikan->slug_jenjang_pendidikan) ?>">
                          <?php echo $jenjang_pendidikan->judul_jenjang_pendidikan ?>
                        </a>
                      </h2>
                    </div>
                    <div class="post-content">
                      <p class="mb-0"><?php echo word_limiter($jenjang_pendidikan->ringkasan, 25) ?></p>
                    </div>
                  </div>
                  <div class="card-footer bg-white border-0 pt-0 pb-5 pb-md-6 px-5 px-md-6">
                    <ul class="post-meta d-flex flex-wrap gap-2 mb-0">
                      <li class="post-date text-small"><i class="uil uil-calendar-alt text-primary"></i>
                        <span><?php echo $this->website->tanggal_bulan_menit($jenjang_pendidikan->tanggal_publish) ?></span>
                      </li>
                      <li class="post-author"><i class="uil uil-user text-primary"></i>
                        <span>
                          <?php echo $jenjang_pendidikan->nama ?>
                        </span>
                      </li>
                      <li class="post-comments text-small"><i class="uil uil-eye text-primary"></i> <span>Dibaca
                          <?php echo $jenjang_pendidikan->hits ?> kali
                        </span></li>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
          <div class="col-xxl-10 col-lg-10 offset-1 mt-5">
            <div class="as-blog blog-single has-post-thumbnail row justify-content-center pagination-wrapper">
              <?php if (isset($pagination)) {
                echo str_replace('index.php/', '', $pagination);
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>