<section class="wrapper bg-soft-primary  bg-image" data-image-src="<?php echo $this->website->banner() ?>">
  <div class="container pt-10 pb-12 pt-md-14 pb-md-14 text-center">
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
<section id="snippet-1" class="wrapper bg-light wrapper-border">
  <div class="container pt-12 pt-md-14 pb-13 pb-md-15">

    <!--/.row -->
    <?php if ($galeri->jenis_galeri == "Video") {
      // Extract video ID from Youtube URL
      $url = $galeri->url_video;
      preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
      $video_id = $match[1] ?? '';
      ?>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow-lg mb-10">
            <div class="card-body p-0 overflow-hidden" style="border-radius: 10px;">
              <?php if ($video_id) { ?>
                <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/<?php echo $video_id ?>" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
              <?php } else { ?>
                <div class="p-10 text-center">
                  <p class="text-danger">URL Video tidak valid.</p>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="card shadow-sm">
            <div class="card-body">
              <div class="content mb-6">
                <?php echo $galeri->isi ?>
              </div>

              <hr class="my-5">

              <div class="d-flex text-muted fs-15">
                <div class="me-5"><i class="uil uil-eye"></i> Dilihat <?php echo $galeri->hits ?> kali</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } else { ?>
      <!-- Layout for Photo -->
      <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <img src="<?php echo base_url('assets/upload/image/' . $galeri->gambar) ?>"
                class="img img-fluid img-thumbnail w-100">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="bg-light" width="25%">Keterangan</td>
                      <td><?php echo $galeri->isi ?></td>
                    </tr>
                    <tr>
                      <td class="bg-light">Dibaca</td>
                      <td><?php echo $galeri->hits ?> Kali</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>