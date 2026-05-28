 <!-- /header -->
    <section class="wrapper image-wrapper bg-image" data-image-src="<?php echo $this->website->banner() ?>">
      <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h1 class="display-1 mb-3 text-warning"><?php echo $title ?></h1>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
 <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container pb-11">
        <div class="row mb-14 mb-md-16">
          <div class="col-xl-10 mx-auto mt-n19">
            <div class="card">
              <div class="row gx-0">
                <div class="col-lg-6 align-self-stretch">
                  <div class="map map-full rounded-top rounded-lg-start">
                    <style type="text/css" media="screen">
                        iframe {
                            width:100%; 
                            height: 100%; 
                            border:0;
                        }
                    </style>

                    <?php echo $konfigurasi->google_map ?>
                   
                  </div>
                  <!-- /.map -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                  <div class="p-10 p-md-11 p-lg-14">
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                      </div>
                      <div class="align-self-start justify-content-start">
                        <h5 class="mb-1">Alamat</h5>
                        <address>
                            <?php echo $this->website->alamat() ?>
                        </address>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Telepon</h5>
                        <p><?php echo $konfigurasi->telepon ?> <br /><?php echo $konfigurasi->hp ?></p>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">E-mail</h5>
                        <p class="mb-0"><a href="mailto:<?php echo $konfigurasi->email ?>" class="link-body"><?php echo $konfigurasi->email ?></a></p>
                      </div>
                    </div>
                    <!--/div -->
                  </div>
                  <!--/div -->
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        
        
        <div class="row mb-14 mb-md-16">
          <div class="col-xl-10 mx-auto mt-10">
            <h2 class="display-4 mb-3 text-center">FAQ Pendaftaran PPDB</h2>
            <p class="lead text-center mb-10 text-muted">Pertanyaan yang sering diajukan mengenai pendaftaran calon peserta didik baru.</p>
            <div class="accordion accordion-wrapper" id="accordionFAQ">
              <div class="card accordion-item mb-3">
                <div class="card-header" id="headingOne">
                  <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> 
                    Apakah saya bisa mendaftar lebih dari satu jenjang/program pendidikan? 
                  </button>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                  <div class="card-body">
                    <p>Ya, Anda dapat mendaftar maksimal 2 pilihan program (misalnya SMP dan Pesantren) pada satu gelombang pendaftaran yang sama. Setelah Anda mendaftar program pertama, tombol "Daftar Online" akan berubah warna menjadi merah dengan tulisan <strong>"Daftar Program Kedua"</strong>.</p>
                  </div>
                </div>
              </div>
              <div class="card accordion-item mb-3">
                <div class="card-header" id="headingTwo">
                  <button class="collapsed accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 
                    Kapan pendaftaran gelombang selanjutnya dibuka? 
                  </button>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                  <div class="card-body">
                    <p>Informasi jadwal pembukaan, penutupan, dan pengumuman untuk setiap gelombang dapat Anda lihat secara detail di menu <a href="<?php echo base_url('registrasi') ?>" class="text-primary">Pendaftaran</a>. Pantau terus halaman tersebut agar tidak tertinggal informasi terbaru.</p>
                  </div>
                </div>
              </div>
              <div class="card accordion-item mb-3">
                <div class="card-header" id="headingThree">
                  <button class="collapsed accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 
                    Bagaimana jika saya salah memasukkan biodata atau unggah dokumen? 
                  </button>
                </div>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                  <div class="card-body">
                    <p>Anda dapat mengedit biodata dan memperbarui unggahan dokumen Anda melalui fitur <strong>Dashboard Siswa</strong> selama status pendaftaran Anda masih belum diproses atau dikunci oleh Panitia Admin PPDB.</p>
                  </div>
                </div>
              </div>
              <div class="card accordion-item mb-3">
                <div class="card-header" id="headingFour">
                  <button class="collapsed accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> 
                    Muncul error "The email field must contain a unique value" saat mendaftar akun, apa maksudnya? 
                  </button>
                </div>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFAQ">
                  <div class="card-body">
                    <p>Error ini berarti alamat email tersebut sudah terdaftar di sistem kami. Kemungkinan pendaftaran akun Anda sebenarnya sudah berhasil sebelumnya. Silakan langsung menuju ke halaman <a href="<?php echo base_url('signin') ?>" class="text-primary">Login</a>. Pastikan juga kolom email Anda tidak ter-<em>autofill</em> oleh browser dengan akun yang lama.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.accordion -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->
    </section>

