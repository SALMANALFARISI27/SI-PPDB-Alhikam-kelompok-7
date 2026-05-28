<section class="wrapper bg-light">
  <div class="container-card">
    <div class="card image-wrapper bg-full bg-image mt-2 mb-0" data-image-src="<?php echo $this->website->banner() ?>">
      <div class="card-body py-7 py-md-12 px-0">
        <div class="container">
          <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center text-center text-lg-start">
            <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="900">
              <h1 class="display-4 fs-30 fs-md-40 mb-4 me-xl-5 me-xxl-0"
                style="color: #FFD700; text-shadow: 2px 2px 4px rgba(0,0,0,0.8); font-weight: bold;">
                <?php echo $site->tagline ?>
              </h1>
              <p class="lead fs-18 fs-md-23 lh-sm mb-7 pe-xxl-15 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">
                <?php echo strip_tags($site->deskripsi) ?>
              </p>
            </div>
            <!--/column -->
            <div class="col-lg-6">
              <img class="img-fluid rounded shadow-black"
                src="<?php echo $this->website->logo() ?>"
                data-cue="fadeIn"
                data-delay="300" alt="" />
            </div>
            <!--/column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!--/.card-body -->
    </div>
    <!--/.card -->
  </div>
  <!-- /.container-card -->
</section>

