<section class="wrapper bg-soft-primary bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-15 pt-md-14 pb-md-16 text-center">
    <div class="row">
      <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
        <h1 class="display-1 mb-1 text-warning"><?php echo $title ?></h1>
      </div>
    </div>
  </div>
</section>

<section id="snippet-1" class="wrapper bg-light wrapper-border">
  <div class="container pt-12 pt-md-14 pb-13 pb-md-15">
    <div class="row grid-view gy-10">
      <?php foreach ($galeri as $galeri) { ?>
        <div class="col-12">
          <div class="card shadow-lg border-0 overflow-hidden">
            <div class="row g-0 align-items-center">
              <!-- Content Column -->
              <div class="col-md-6 p-6 p-md-10">
                <h2 class="display-5 mb-4"><?php echo $galeri->judul_galeri ?></h2>
                <div class="mb-6 text-muted">
                  <?php echo word_limiter(strip_tags($galeri->isi), 20) ?>
                </div>
              </div>
              <!-- Image Column -->
              <div class="col-md-6 position-relative">
                <a href="<?php echo base_url('galeri/read/' . $galeri->slug_galeri) ?>" class="d-block h-100">
                  <img class="img-fluid w-100 h-100 object-fit-cover"
                    src="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?>"
                    alt="<?php echo $galeri->judul_galeri ?>" style="min-height: 300px;">
                  <div
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(52, 115, 230, 0.85); color: white; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 10;">
                    <i class="fa fa-play fs-24"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Pagination -->
    <div class="row mt-10">
      <div class="col-12 d-flex justify-content-center">
        <?php if (isset($pagination)) {
          echo str_replace('index.php/', '', $pagination);
        } ?>
      </div>
    </div>
  </div>
</section>