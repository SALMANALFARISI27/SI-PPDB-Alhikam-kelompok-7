<section class="wrapper bg-soft-primary bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-12 pb-14 pt-md-18 pb-md-18 text-center">
    <div class="row">
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <h1 class="display-1 fs-30 fs-md-60 mb-1 text-warning"><?php echo $title ?></h1>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>

<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="blog classic-view mt-n10 mt-md-n17">

          <article class="post">
            <div class="card shadow-lg mb-8">
              <div class="card-body p-4 p-md-10">
                
                <!-- Logo/Image Centered Section -->
                <div class="row justify-content-center mb-8">
                  <div class="col-10 col-md-4 text-center">
                    <figure class="rounded shadow-sm">
                      <img src="<?php echo base_url('assets/upload/image/' . $ekstrakurikuler->gambar) ?>"
                        class="img-fluid rounded mx-auto d-block" alt="<?php echo $ekstrakurikuler->judul_ekstrakurikuler ?>">
                    </figure>
                  </div>
                </div>

                <!-- Info Section -->
                <div class="table-responsive mb-6">
                  <table class="table table-bordered tabelku">
                    <tbody>
                      <tr class="bg-soft-primary">
                        <td class="fw-bold text-dark" style="min-width: 150px;">Nama Ekstrakurikuler</td>
                        <td class="fw-bold text-dark"><?php echo $ekstrakurikuler->judul_ekstrakurikuler ?></td>
                      </tr>
                      <tr>
                        <td class="text-dark">Penanggung Jawab</td>
                        <td class="text-dark"><?php echo $ekstrakurikuler->nama_penanggung_jawab ?></td>
                      </tr>
                      <tr>
                        <td class="text-dark">Kategori</td>
                        <td class="text-dark"><?php echo $ekstrakurikuler->nama_kategori_ekstrakurikuler ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Content Area -->
                <div class="post-content text-dark">
                  <?php echo $ekstrakurikuler->isi ?>
                </div>

              </div>

              <div class="card-footer bg-white border-0 pt-0 pb-7 px-5 px-md-10">
                <ul class="post-meta d-flex flex-wrap gap-3 mb-0">
                  <li class="post-comments text-muted"><i class="fa fa-eye text-primary"></i><span> Dibaca
                      <?php echo $ekstrakurikuler->hits ?> kali</span></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </article>
          <!-- /.post -->
        </div>
      </div>
    </div>

    <!--/.row -->
    <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 mt-10 justify-content-center">
      <div class="col-xl-12">
        <h3 class="text-center mb-8">Lihat Ekstrakurikuler Lainnya</h3>
      </div>
      <?php $no = 1;
      foreach ($ekstrakurikuler_list as $ekstrakurikuler) { ?>
        <div class="col-md-6 col-lg-3 mb-8">
          <div class="position-relative">
            <div class="card shadow-lg lift h-100">
              <figure class="card-img-top">
                <a href="<?php echo base_url('ekstrakurikuler/read/' . $ekstrakurikuler->slug_ekstrakurikuler) ?>">
                  <img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $ekstrakurikuler->gambar) ?>"
                    alt="<?php echo $ekstrakurikuler->judul_ekstrakurikuler ?>" />
                </a>
              </figure>
              <div class="card-body px-6 py-5">
                <h5 class="mb-1">
                  <a class="link-dark"
                    href="<?php echo base_url('ekstrakurikuler/read/' . $ekstrakurikuler->slug_ekstrakurikuler) ?>">
                    <?php echo $ekstrakurikuler->judul_ekstrakurikuler ?>
                  </a>
                </h5>
                <p class="mb-0 text-small text-muted"><?php echo $ekstrakurikuler->nama_kategori_ekstrakurikuler ?> |
                  <?php echo $ekstrakurikuler->nama_penanggung_jawab ?>
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

    </div>
    <!--/.row -->
  </div>
</section>