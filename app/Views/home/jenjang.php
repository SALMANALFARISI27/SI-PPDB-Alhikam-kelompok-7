<?php if ($jenjang_pendidikan) { ?>
  <section class="wrapper bg-light">
    <div class="container pt-3 pt-md-6">
      <div class="px-lg-5 mb-4 mb-md-6">
        <div class="row gx-0 gx-md-8 gx-xl-12 gy-8 justify-content-center">

          <div class="col-lg-10 mx-auto text-center">
            <h2 class="fs-36 text-uppercase mb-3" style="font-weight: bold; color: #000000;">
              Tentang <?php echo $this->website->namaweb(); ?>
            </h2>
            <h4 class="display-6 text-center px-xl-10 px-xxl-15 mb-10"><?php echo $site->deskripsi ?></h3>

          </div>

          <?php foreach ($jenjang_pendidikan as $jenjang_pendidikan) { ?>

            <div class="col-md-3">
              <div class="card" style="border: 3px solid #00000038; border-width: 1px;">
                <div class="card-body p-8">
                  <div class="px-md-0 px-lg-0 px-xl-1 text-center">
                    <p class="text-center">
                      <img src="<?php echo base_url('assets/upload/image/' . $jenjang_pendidikan->gambar) ?>"
                        class="img-fluid rounded rounded-circle w-50" alt="" />
                    </p>
                    <h4 class="text-uppercase"><?php echo $jenjang_pendidikan->judul_jenjang_pendidikan ?></h4>

                    <a href="<?php echo base_url('jenjang_pendidikan/read/' . $jenjang_pendidikan->slug_jenjang_pendidikan) ?>"
                      class="btn btn-dark btn-sm">Baca Selengkapnya...</a>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>


          <!-- /column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /div -->
    </div>
  </section>
<?php } ?>