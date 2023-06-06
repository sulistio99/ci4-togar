<div class="col-md-12" style="font-weight: bold;">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header text-center">
      <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('Home/UbahDataAkun/' . $member['id_member']) ?>
    <div class="card-body">
      <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '<h5><i class="icon fas fa-check"></i> ';
        echo session()->getFlashdata('pesan');
        echo '</h5> </div>';
      }
      ?>
      <!-- notifikasi validasi data-->
      <?php
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <h4>Periksa entry form</h4>
          <ul>
            <?php
            foreach ($errors as $key => $error) { ?>
              <li><?= esc($error); ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <!-- notifikasi-->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Member</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nama_member" value="<?= $member['nama_member']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Status</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="status" value="<?= $member['status']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>E-Mail</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="email_member" value="<?= $member['email_member']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Password</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="pass_member" value="<?= $member['pass_member']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>No Hp</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nohp" value="<?= $member['nohp']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Alamat</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="alamat_member" value="<?= $member['alamat_member']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-sm-12">
              <label>Foto</label>
              <div class="form-group ">
                <img src="<?= base_url('foto/member/' . $member['foto_member']); ?>" class="img-fluid" width="200px" height="200px" id="gambar_load">
              </div>
              <div class="col-sm-12">
                <div class="form-group ">
                  <input type="file" name="foto_member" accept="image/*" id="preview_gambar">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
    </div>
  </div>
</div>
<!-- /.card-body -->
<?php echo form_close() ?>
<!-- /.card -->