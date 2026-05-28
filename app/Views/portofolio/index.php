<section class="wrapper bg-soft-primary  bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-12 pt-md-14 pb-md-14 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-10 col-xl-10 mx-auto">
        <h1 class="display-1 mb-1 text-warning">
          <?php echo $title ?>
        </h1>
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
      <?php foreach ($portofolio as $portofolio) { ?>

        <div class="col-md-4 col-lg-3 mb-8">
          <div class="position-relative">
            <div class="shape rounded bg-soft-blue rellax d-md-block" data-rellax-speed="0"
              style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0">
            </div>
            <div class="card">
              <figure class="card-img-top">
                <?php
                if ($portofolio->gambar == "") {
                  echo '-';
                } else {

                  $img_dipublic = FCPATH . 'assets/upload/image/' . $portofolio->gambar;
                  $img_diluar = FCPATH . '' . $portofolio->gambar;


                  if (!file_exists($img_dipublic) && file_exists($img_diluar)) {
                    @copy($img_diluar, $img_dipublic);
                  }


                  ?>
                  <a href="<?php echo base_url('portofolio/read/' . $portofolio->slug_portofolio) ?>">
                    <img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $portofolio->gambar) ?>"
                      srcset="<?php echo base_url('assets/upload/image/' . $portofolio->gambar) ?> 2x"
                      alt="<?php echo $portofolio->judul_portofolio ?>" />
                  </a>
                <?php } ?>
              </figure>
              <div class="card-body px-6 py-5">
                <h4 class="mb-1">
                  <a href="<?php echo base_url('portofolio/read/' . $portofolio->slug_portofolio) ?>">
                    <?php echo $portofolio->judul_portofolio ?>
                  </a>
                </h4>
                
                <ul class="post-meta d-flex flex-wrap gap-2 mb-0 mt-3 text-muted" style="font-size: 13px;">
                  <li class="post-date"><i
                      class="uil uil-calendar-alt"></i><span><?php echo $this->website->tanggal_bulan_menit($portofolio->tanggal_post ? $portofolio->tanggal_post : $portofolio->tanggal) ?></span>
                  </li>
                  <li class="post-comments"><i class="fa fa-eye"></i><span> Dibaca <?php echo $portofolio->hits ?>
                      kali</span></li>
                </ul>
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