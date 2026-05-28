<?php
use App\Models\Berita_model;
use App\Models\Konfigurasi_model;
$m_menu = new Berita_model();
$nav_profile = $m_menu->nav_profile('Profile');
$site_setting = $m_site->listing();
?>
<style type="text/css" media="screen">
  /* Add your custom styles here */
  .whatsapp-link {
    position: fixed;
    bottom: 90px;
    right: 20px;
    z-index: 9999;
    transition: transform 0.3s ease-in-out;
  }

  @media (min-width: 768px) {
    .whatsapp-link {
      bottom: 100px;
      right: 30px;
    }
  }

  /* Force display progress-wrap on mobile */
  @media (max-width: 991.98px) {
    .progress-wrap {
      display: block !important;
      right: 20px !important;
      bottom: 20px !important;
      z-index: 9999 !important;
    }

    .progress-wrap.active-progress {
      opacity: 1 !important;
      visibility: visible !important;
      transform: translateY(0) !important;
    }

    /* Force display post-meta list items and texts on mobile */
    .post-meta li,
    .post-meta li.post-author,
    .post-meta li.post-comments {
      display: inline-flex !important;
      align-items: center;
    }

    .post-meta li span {
      display: inline-block !important;
    }
  }

  a.whatsapp-link {
    color: green;
    background-color: #f5f5f5;
    border: solid thin #eee;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .whatsapp-link i {
    font-size: 30px;
  }

  .whatsapp-link:hover {
    transform: scale(1.1);
  }
</style>
<?php
$sek = date('Y');
$awal = $sek - 100;
?>

<script>
  $(".datepicker").datepicker({
    inline: true,
    changeYear: true,
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y') + 2;
       echo $tahundepan; ?>"
  });

  $(".tanggal").datepicker({
    inline: true,
    changeYear: true,
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y') + 2;
       echo $tahundepan; ?>"
  });

  $(".tanggalan").datepicker({
    inline: true,
    changeYear: true,
    changeMonth: true,
    dateFormat: "dd-mm-yy",
    yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y') + 2;
       echo $tahundepan; ?>"
  });

</script>
<?php
$wa_number = preg_replace('/[^0-9]/', '', $site_setting->whatsapp);
if ($wa_number && substr($wa_number, 0, 1) === '0') {
  $wa_number = '62' . substr($wa_number, 1);
}
$wa_text = urlencode($site_setting->pesan_whatsapp);
?>
<a href="https://wa.me/<?php echo $wa_number ?>?text=<?php echo $wa_text ?>" class="whatsapp-link" target="_blank">
  <i class="fab fa-whatsapp fa-3x"></i>
</a>

<!--==============================
Footer Area
==============================-->
<footer class="bg-navy text-inverse">
  <div class="container py-10 py-md-15">
    <div class="row gy-6 gy-lg-0">
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <img class="mb-4 img-fluid" src="<?php echo $this->website->logo() ?>"
            srcset="<?php echo $this->website->logo() ?> 2x" alt="<?php echo $this->website->namaweb() ?>" />
          <p class="mb-4">© <?php echo date('Y') ?> <?php echo $this->website->namaweb() ?>. <br
              class="d-none d-lg-block" />All rights reserved.</p>
          <nav class="nav social ">
            <a href="<?php echo $site_setting->facebook ?>"><i class="uil uil-facebook-f"></i></a>
            <a href="<?php echo $site_setting->tiktok ?? '' ?>"><i class="fab fa-tiktok"></i></a>
            <a href="<?php echo $site_setting->instagram ?>"><i class="uil uil-instagram"></i></a>
            <a href="<?php echo $site_setting->youtube ?>"><i class="uil uil-youtube"></i></a>
          </nav>
          <!-- /.social -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <h4 class="widget-title  mb-3 text-white">Hubungi Kami</h4>
          <address class="pe-xl-15 pe-xxl-17"><?php echo $site_setting->alamat ?></address>
          <a href="mailto:<?php echo $site_setting->email ?>"
            class="link-body"><?php echo $site_setting->email ?></a><br /> <?php echo $site_setting->telepon ?>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <h4 class="widget-title  mb-3 text-white">Tentang Kami</h4>
          <ul class="list-unstyled text-reset mb-0">
            <li><a href="<?php echo base_url('berita') ?>">Berita</a></li>
            <li><a href="<?php echo base_url('portofolio') ?>">Portofolio</a></li>
            <li><a href="<?php echo base_url('galeri') ?>">Galeri</a></li>
          </ul>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->

    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</footer>
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<script src="<?php echo base_url() ?>assets/template/assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>assets/template/assets/js/theme.js"></script>
<script>
  $(document).ready(function () {
    $('input.jam').timepicker({
      timeFormat: 'HH:mm:ss',
      // year, month, day and seconds are not important
      minTime: new Date(0, 0, 0, 8, 0, 0),
      maxTime: new Date(0, 0, 0, 15, 0, 0),
      // time entries start being generated at 6AM but the plugin 
      // shows only those within the [minTime, maxTime] interval
      startHour: 6,
      // the value of the first item in the dropdown, when the input
      // field is empty. This overrides the startHour and startMinute 
      // options
      startTime: new Date(0, 0, 0, 8, 20, 0),
      // items in the dropdown are separated by at interval minutes
      interval: 10
    });
  });

  // Popup Delete
  $(document).on("click", ".delete-link", function (e) {
    e.preventDefault();
    url = $(this).attr("href");
    Swal.fire({
      title: 'Anda yakin?',
      text: "Jika dihapus, data tidak dapat dikembalikan lagi!",
      icon: 'info',
      timer: 5000,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: url,
          success: function (resp) {
            window.location.href = url;
          }
        });
      }
    })
  });



  <?php if (isset($_GET['logout'])) { ?>
    Swal.fire({
      icon: 'success',
      heightAuto: false,
      timer: 3000,
      title: 'Sukses...',
      text: 'Anda berhasil logout.',
    })
  <?php }
  if (Session()->getFlashdata('warning')) { ?>
    // Notifikasi
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      timer: 3000,
      heightAuto: false,
      text: '<?php echo Session()->getFlashdata('warning'); ?>',
    })
  <?php } ?>
  <?php if (Session()->getFlashdata('sukses')) { ?>
    // Notifikasi
    Swal.fire({
      icon: 'success',
      heightAuto: false,
      timer: 3000,
      title: 'Alhamdulillah...',
      text: '<?php echo Session()->getFlashdata('sukses'); ?>',
    })
  <?php } ?>
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });



</script>
</body>

</html>