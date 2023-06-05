<!DOCTYPE HTML>
<html>

<head>
  <title>Sewa - Lokasi | VINS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/icomoon.css">
  <!-- Ion Icon Fonts-->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/ionicons.min.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/bootstrap.min.css">

  <!-- Magnific Popup -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/magnific-popup.css">

  <!-- Flexslider  -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/flexslider.css">

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/owl.theme.default.min.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/bootstrap-datepicker.css">
  <!-- Flaticons  -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/fonts/flaticon/font/flaticon.css">

  <!-- Theme style  -->
  <link rel="stylesheet" href="<?= base_url(); ?>/templateuser/css/style.css">

</head>

<body>

  <div class="colorlib-loader"></div>

  <div id="page">
    <nav class="colorlib-nav" role="navigation">
      <div class="top-menu">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 col-md-9">
              <div id="colorlib-logo"><a href="<?= base_url('Home'); ?>">Sewa-Lokasi</a></div>
            </div>
            <div class="col-sm-5 col-md-3">
              <label for="">Hubungi Admin:</label>
              <h5><a href="#"><i class="icon-whatsapp"></i> 089635789232</a></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-left menu-1">
              <ul>
                <li class="<?= $menu == 'home' ? 'active' : ''; ?>"><a href="<?= base_url('/'); ?>">Beranda</a></li>
                <li class="<?= $menu == 'info' ? 'active' : ''; ?>"><a href="<?= base_url('Home/Info'); ?>">Info Sewa Tempat</a></li>
                <?php if (session('id_member')) { ?>
                  <li class="<?= $menu == 'pesanan' ? 'active' : ''; ?>"><a href="<?= base_url('Home/Pesanan/' . session('id_member')); ?>">Status Sewa</a></li>
                <?php  } ?>
                <?php if (session('id_member')) { ?>
                  <li class="<?= $menu == 'sewa' ? 'active' : ''; ?>"><a href="<?= base_url('Home/Sewa/' . session('id_member')); ?>">Status Pembayaran</a></li>
                <?php  } ?>
                <?php if (session('id_member')) { ?>
                  <li class="has-dropdown">
                    <a href="">Akun</a>
                    <ul class="dropdown">
                      <li class="<?= $menu == 'tambahlokasi' ? 'active' : ''; ?>"><a href="<?= base_url('Home/TambahTempat/' . session('id_member')); ?>">Tambah Tempat</a>
                      </li>
                      <li class="<?= $menu == 'datatempat' ? 'active' : ''; ?>"><a href="<?= base_url('Home/Tempat/' . session('id_member')); ?>">Data Tempat</a>
                      </li>
                    </ul>
                  </li>
                <?php  } ?>
                <li class="<?= $menu == 'contact' ? 'active' : ''; ?>"><a href="<?= base_url('Home/Contact'); ?>">Hubungi Kami</a></li>
                <?php if (!session('id_member')) { ?>
                  <li class="cart"><a href="<?= base_url('Auth'); ?>"><i class="icon-user"></i> LOGIN</a></li>
                <?php  } ?>
                <?php if (session('id_member')) { ?>
                  <li class="cart"><a href="<?= base_url('Auth/LogOutUser'); ?>"><i class="icon-exit"></i> LOGOUT</a></li>
                <?php  } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="sale" style="background-color: #88C8BC;">
      <div class="container">
        <div class="row">
          <?php if ($page) {
            echo view($page);
          } ?>
        </div>
      </div>
    </div>

    <aside id="colorlib-hero">
      <div class="flexslider">
        <ul class="slides">
          <li style="background-image: url(<?= base_url(); ?>/foto/hunian/hunian2.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h1 class="head-1">SEWA</h1>
                      <h2 class="head-2">LOKASI</h2>
                      <h2 class="head-3">TERMURAH</h2>
                      <p><a href="<?= base_url('Home/Info'); ?>" class="btn btn-primary">CARI</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li style="background-image: url(<?= base_url(); ?>/foto/hunian/hunian1.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h1 class="head-1">SEWA</h1>
                      <h2 class="head-2">LOKASI</h2>
                      <h2 class="head-3">TERMURAH</h2>
                      <p><a href="<?= base_url('Home/Info'); ?>" class="btn btn-primary">CARI</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li style="background-image: url(<?= base_url(); ?>/foto/hunian/hunian3.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h1 class="head-1">SEWA</h1>
                      <h2 class="head-2">LOKASI</h2>
                      <h2 class="head-3">TERMURAH</h2>
                      <p><a href="<?= base_url('Home/Info'); ?>" class="btn btn-primary">CARI</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>

    <footer id="colorlib-footer" role="contentinfo">
      <div class="row">
        <div class="col-sm-12 text-center pt-3" style="background-color: #88C8BC;">
          <p>
            <span>
              <b>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> Sewa-Lokasi <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Adravin</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </b>
            </span>
          </p>
        </div>
      </div>
    </footer>
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.min.js"></script>
  <!-- popper -->
  <script src="<?= base_url(); ?>/templateuser/js/popper.min.js"></script>
  <!-- bootstrap 4.1 -->
  <script src="<?= base_url(); ?>/templateuser/js/bootstrap.min.js"></script>
  <!-- jQuery easing -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.easing.1.3.js"></script>
  <!-- Waypoints -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.waypoints.min.js"></script>
  <!-- Flexslider -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.flexslider-min.js"></script>
  <!-- Owl carousel -->
  <script src="<?= base_url(); ?>/templateuser/js/owl.carousel.min.js"></script>
  <!-- Magnific Popup -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url(); ?>/templateuser/js/magnific-popup-options.js"></script>
  <!-- Date Picker -->
  <script src="<?= base_url(); ?>/templateuser/js/bootstrap-datepicker.js"></script>
  <!-- Stellar Parallax -->
  <script src="<?= base_url(); ?>/templateuser/js/jquery.stellar.min.js"></script>
  <!-- Main -->
  <script src="<?= base_url(); ?>/templateuser/js/main.js"></script>

  <script>
    function bacaGambar(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#gambar_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $('#preview_gambar').change(function() {
      bacaGambar(this);
    });
  </script>

</body>

</html>