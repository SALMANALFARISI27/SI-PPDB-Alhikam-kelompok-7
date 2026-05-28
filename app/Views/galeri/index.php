<section class="wrapper bg-soft-primary  bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-15 pt-md-14 pb-md-16 text-center">
    <div class="row">
      <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
        <h1 class="display-1 mb-1 text-warning"><?php echo $title ?></h1>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>

<!-- /section -->
<section id="snippet-1" class="wrapper bg-light wrapper-border">
  <div class="container pt-12 pt-md-14 pb-13 pb-md-15">

    <!--/.row -->
    <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
      <?php foreach ($galeri as $galeri) { ?>
        <div class="col-md-4 col-lg-3 mb-8">
          <div class="position-relative">
            <div class="shape rounded bg-soft-blue rellax d-md-block" data-rellax-speed="0"
              style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0">
            </div>
            <div class="card">
              <figure class="card-img-top">
                <a href="<?php echo base_url('galeri/read/' . $galeri->slug_galeri) ?>" class="item-link">
                  <img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?>"
                    srcset="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?> 2x"
                    alt="<?php echo $galeri->judul_galeri ?>" />
                  <?php if ($galeri->jenis_galeri == "Video") { ?>
                    <span class="it-video-icon"
                      style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(255,0,0,0.8); color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 10;">
                      <i class="fa fa-play"></i>
                    </span>
                  <?php } ?>
                </a>
              </figure>
              <div class="card-body px-6 py-5">
                <h4 class="mb-1">
                  <a href="<?php echo base_url('galeri/read/' . $galeri->slug_galeri) ?>">
                    <?php echo $galeri->judul_galeri ?>
                  </a>
                </h4>
                <p class="mb-0 text-small text-muted"><?php echo $galeri->jenis_galeri ?></p>
                <p class="mb-0 text-muted text-small">
                  <i class="uil uil-eye"></i> Dibaca <?php echo $galeri->hits ?> kali
                </p>
              </div>
              <!--/.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /div -->
        </div>
        <!--/column -->
      <?php } ?>
      <div class="clearfix"></div>
    </div>
    <div class="col-xxl-10 col-lg-10 offset-1">
      <div class="as-blog blog-single has-post-thumbnail row justify-content-end">
        <?php if (isset($pagination)) {
          echo str_replace('index.php/', '', $pagination);
        } ?>
      </div>
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->

</section>
<!-- /section -->