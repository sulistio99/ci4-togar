<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VINS-KOST | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url('Auth/Login'); ?>"><b>LOGIN MEMBER</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"></p>

        <!-- pesan valdasi error login -->
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) {
        ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errors as $key => $error) : ?>
                <li><?= esc($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php } ?>
        <!-- pesan valdasi berhasil login -->
        <?php
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-danger" role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
        ?>

        <?php echo form_open('auth/CekLoginUser') ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email_member" placeholder="Masukkan Email" value="<?= old('email_member'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass_member" placeholder="Masukkan Password" value="<?= old('pass_member'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
              <label for="remember">
                <a href="<?= base_url('auth/registrasi'); ?>">Belum punya akun?Daftar!</a>
              </label>
            </div> -->
          <!-- /.col -->
          <div class="col-sm-6">
            <a href="<?= base_url(); ?>" class="btn btn-primary btn-block">Beranda</a>
          </div>
          <div class="col-sm-6">
            <button type="submit" name="cek_login" class="btn btn-primary btn-block">LOGIN</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="social-auth-links text-center mb-3">
          <p>- Belum Punya Akun? -</p>
          <a href="<?= base_url('Auth/Registrasi'); ?>">
            Buat Akun
          </a>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>

</body>

</html>