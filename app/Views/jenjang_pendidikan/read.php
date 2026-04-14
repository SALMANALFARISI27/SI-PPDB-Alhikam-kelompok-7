<section class="wrapper bg-soft-primary  bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-15 pt-md-14 pb-md-20 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-10 col-xl-10 mx-auto">
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
      <div class="col-lg-10 mx-auto">
        <div class="blog classic-view mt-n17">

          <article class="post">
            <div class="card shadow-lg">
              <div class="card-body p-4 p-md-10">
                <div class="row gx-lg-10 gy-6 gy-md-10 align-items-center justify-content-center mb-10">
                  <div class="col-10 col-md-5 text-center">
                    <figure class="rounded shadow-sm">
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
                            class="img-fluid rounded mx-auto d-block">
                        <?php }
                      } ?>
                    </figure>
                  </div>
                </div>
                <div class="post-content">
                  <?php echo $jenjang_pendidikan->isi ?>
                </div>
              </div>
              <div class="card-footer bg-white border-0 pt-0 pb-7 px-5 px-md-10">
                <ul class="post-meta d-flex flex-wrap gap-3 gap-md-4 mb-0 text-small">
                  <li class="post-date"><i class="uil uil-calendar-alt text-primary"></i>
                    <span><?php echo $this->website->tanggal_bulan_menit($jenjang_pendidikan->tanggal_publish) ?></span>
                  </li>
                  <li class="post-author"><i class="uil uil-user text-primary"></i>
                    <span><?php echo $jenjang_pendidikan->nama ?></span>
                  </li>
                  <li class="post-comments"><i class="uil uil-eye text-primary"></i> <span>Dibaca
                      <?php echo $jenjang_pendidikan->hits ?> kali</span></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </article>
          <!-- /.post -->



        </div>
      </div>
    </div>
  </div>
</section>