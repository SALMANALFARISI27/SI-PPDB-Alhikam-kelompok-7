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
    <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <img src="<?php echo base_url('assets/upload/image/' . $portfolio->gambar) ?>" class="img img-fluid img-thumbnail w-100">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive"><table class="table table-bordered tabelku">
              <thead>
                <tr>
                  <th width="25%">Nama Portofolio</th>
                  <th><?php echo $portfolio->judul_portfolio ?></th>
                </tr>
              </thead>
              <tbody>


                <tr>
                  <td class="bg-light">Deskripsi Portofolio</td>
                  <td><?php echo $portfolio->isi ?></td>
                </tr>
              </tbody>
            </table></div>
          </div>
          <div class="card-footer">
            <ul class="post-meta d-flex flex-wrap gap-2 mb-0">
              <li class="post-date"><i class="uil uil-calendar-alt"></i><span><?php echo $this->website->tanggal_bulan_menit($portfolio->tanggal_post ? $portfolio->tanggal_post : $portfolio->tanggal) ?></span></li>
              <li class="post-comments"><a href="#"><i class="fa fa-eye"></i><span> Dibaca <?php echo $portfolio->hits ?> kali</span></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>


  </div>
</section>