<?php if ($jenjang_pendidikan) { ?>
  <section class="wrapper bg-light">
    <div class="container pt-3 pt-md-6">
      <div class="px-lg-5 mb-4 mb-md-6">
        <div class="row gx-0 gx-md-8 gx-xl-12 gy-8 justify-content-center">

          <div class="col-lg-10 mx-auto text-center">
            <h2 class="fs-36 text-uppercase mb-3" style="font-weight: bold; color: #000000;">
              Tentang <?php echo $this->website->namaweb(); ?>
            </h2>
            <h4 class="display-6 text-center px-xl-10 px-xxl-15 mb-10"><?php echo $site->deskripsi ?></h4>

          </div>

          <?php foreach ($jenjang_pendidikan as $jenjang_pendidikan_item) { ?>
            <div class="col-md-6 col-lg-3 mb-6">
              <div class="card h-100 shadow-sm" style="border: 1px solid #eee;">
                <div class="card-body p-6">
                  <div class="text-center">
                    <p>
                      <img src="<?php echo base_url('assets/upload/image/' . $jenjang_pendidikan_item->gambar) ?>"
                        class="img-fluid rounded-circle w-50 mb-4" alt="" />
                    </p>
                    <h4 class="text-uppercase mb-4"><?php echo $jenjang_pendidikan_item->judul_jenjang_pendidikan ?></h4>
                    <a href="<?php echo base_url('jenjang_pendidikan/read/' . $jenjang_pendidikan_item->slug_jenjang_pendidikan) ?>"
                      class="btn btn-dark btn-sm rounded-pill">Selengkapnya</a>
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